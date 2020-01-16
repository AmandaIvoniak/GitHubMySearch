var respSearch = 0;
var positionScroll = 0;
var que = 0;
$(document).ready(function(){
    $.ajax({
        method: "POST",
        url: "tags/ajaxTag",
        data: {},
        success: function(result){
            que = JSON.parse(result);
        }
    });

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
        $('select').formSelect();
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
    $('select').formSelect();

    if(respSearch.length = positionScroll){
        positionScroll = 0;
        $('#addRepository').addClass('hide');
    }
})

function createSearchList(i, name, id, update, description, stars){
    var listSearch = document.getElementById("listSearch");
    if(i === 0 ? listSearch.innerHTML = '': '');

    var resultSelect = createSelect();

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
                                '<div class="col s6">'+
                                '<div class="input-field col s12">'+
                                    '<select multiple id="'+id+'">'+resultSelect+
                                    '</select>'+
                                    '<label>Selecione tags</label>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col s6">'+
                                    '<a onclick="saveTag('+id+','+i+');" class="saveTagBtn btn-floating btn-large waves-effect waves-light purple right">'+
                                    '<i class="material-icons">check</i></a>'+
                                '</div>'+
                            '</div>'+
                            '</li>';       
    }

function saveTag(id, index){
    if(respSearch[index].id === id){
      var tags = $('#'+id).val();
      console.log(tags)
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
                alert('Cadastrado com sucesso')
              }
            }
          }); 
      }else{
        alert("por favor preencha uma tag")
      }
    }
 
};

function createSelect(){
    selectTag = "";
    for (i = 0; i < que.length; i++) {
        selectTag += '<option value="'+que[i].id_tag+'">'+que[i].name_tag+'</option>';
    }
    return selectTag;
}