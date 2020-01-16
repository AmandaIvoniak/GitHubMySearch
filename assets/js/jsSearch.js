var respSearch = 0;
var positionScroll = 0;

$(document).ready(function(){
})

$('#searchForm').submit(function(e){
  e.preventDefault();
  var search;
  var params = 0;

  for(var valor of $(this).serializeArray()){
    if(valor.name == 'search' ? search = 'q='+valor.value : '');
    if(valor.name == 'sort' ? search += '&sort='+ valor.value : '');
    if(valor.name == 'order' ? search += '&order='+valor.value : '');
  }

  $.ajax({
    method: "GET",
    url: "https://api.github.com/search/repositories?"+search,    
    success: function(result){
        respSearch = result.items;
        result = result.items;
         
        if(result.length > 10){
            params = 10;
            $('#addRepository').removeClass('hide');
        }else{
            params = result.length;
        }

        for (i = 0; i < params; i++) {
            createSearchList(i, result[i].full_name, result[i].id, result[i].updated_at, result[i].description, result[i].stargazers_count);
            positionScroll++;
        }
        $('.tooltipped').tooltip();

        positionScroll = result.length === positionScroll ? 0 : positionScroll;
    }
  });
})

$('#addRepository').click(function(){
    var params = respSearch.length > positionScroll ? positionScroll+10 : respSearch.length;

    for (i = positionScroll; i < params; i++) {
        createSearchList(i, respSearch[i].full_name, respSearch[i].id, respSearch[i].updated_at, respSearch[i].description, respSearch[i].stargazers_count);
        positionScroll++;
    }
    $('.tooltipped').tooltip();

    if(respSearch.length = positionScroll){
        positionScroll = 0;
        $('#addRepository').addClass('hide');
    }
})

function createSearchList(i, name, id, update, description, stars){
    var listSearch = document.getElementById("listSearch");
    if(i === 0 ? listSearch.innerHTML = '': '');

    listSearch.innerHTML += '<li class="collection-item avatar">'+
                            '<i class="material-icons circle">folder</i>'+
                            '<!-- <img src="images/yuna.jpg" alt="" class="circle"> -->'+
                            '<div class="row">'+
                                '<div class="col s6 findTag" >'+
                                    '<span class="title">'+name+'</span>'+
                                    '<p class="truncate" >'+description+'</p>'+
                                    '<i class="material-icons">grade</i>'+stars+
                                '</div>'+
                                '<div class="col s6">'+
                                    '<p class="right" >Ultima atualização:'+update+'</p>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col s6 hide">'+
                                '<div class="input-field col s12" >'+
                                    '<select multiple  id="'+id+'">'+
                                    '</select>'+
                                    '<label>Selecione tags</label>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col s6">'+
                                    '<a id="save'+i+'" onclick="saveTag('+id+','+i+');" class="hide btn-floating btn-large waves-effect waves-light green right">'+
                                    '<i class="material-icons">check</i></a>'+
                                    '<a id="select'+i+'" onclick="getSelect('+id+','+i+');" class="btn tooltipped btn-floating btn-large waves-effect waves-light purple right" data-position="left" data-tooltip="Adicione tags!">'+
                                    '<i class="material-icons">add</i></a>'+
                                '</div>'+
                            '</div>'+
                            '</li>';       
    }
    
function getSelect(id, i){
    $('#select'+i).addClass('hide');
    $('#save'+i).removeClass('hide');
    createSelect(id);
    $('select').formSelect();
    $('#'+id).parent().parent().parent().removeClass('hide');

};

function saveTag(id, index){
    if(respSearch[index].id === id){
        var tags = $('#'+id).val();
        if(tags != ''){
            $.ajax({
                method: "POST",
                url: "repository/ajaxInsert",
                data: {
                id_rep: respSearch[index].id,
                name: respSearch[index].full_name,
                description: respSearch[index].description,
                stars: respSearch[index].stargazers_count,
                updateDate:respSearch[index].updated_at,
                id_tag: tags
                },
                success: function(result){
                    if(result == 'true'){
                        M.toast({html: 'Cadastrado com sucesso!!'})
                        $('#select'+index).removeClass('hide');
                        $('#save'+index).addClass('hide');
                        $('#'+id).parent().parent().parent().addClass('hide');
                    }
                }
            });
        }else{
            M.toast({html: 'Por favor selecione uma tag!'});
        }
    }
};

function createSelect(id){
    selectTag = '';
    $.ajax({
        method: "POST",
        url: "tags/ajaxTagSelect",
        data: {id},
        success: function(result){
            result = JSON.parse(result);

            for (i = 0; i < result.length; i++) {            
            check = result[i].selected != 'false' ? result[i].selected : '';
            console.log(check)


                selectTag += '<option value="'+result[i].id_tag+'" '+check+'>'+result[i].name_tag+'</option>';
            }
            var select = document.getElementById(id);
            select.innerHTML = selectTag;
            $('select').formSelect();
        }        
    });
}