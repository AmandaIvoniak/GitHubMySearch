var respSearch = 0;
var positionScroll = 0;

$('#searchForm').submit(function(e){
  e.preventDefault();
  var search = 0;
  var params = 0;
  var asc = 0;

  for(var valor of $(this).serializeArray()){
    if(valor.name == 'search' ? search = 'q='+valor.value : '');
    search += (valor.name == 'sort' && valor.value != 'ASC' ? '&sort='+ valor.value : '&sort=updated');
    if(valor.value == 'ASC'? asc = true : '');
  }

  $.ajax({
    method: "GET",
    url: "https://api.github.com/search/repositories?"+search,    
    success: function(result){
        respSearch = result.items;
        result = result.items;

        if(asc === true){
          newResult = [];
          for (x = result.length-1; x > 0; x--) {
            newResult.push(result[x]);            
          }
          result = newResult;
        }

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

  listSearch.innerHTML += '\
  <li class="collection-item avatar">\
    <i class="material-icons circle">folder</i>\
    <!-- <img src="images/yuna.jpg" alt="" class="circle"> -->\
    <div class="row">\
      <div class="col s6 findTag" >\
        <span class="title">'+name+'</span>\
        <p class="truncate" >'+(description ? description : '-')+'</p>\
        <i class="material-icons">grade</i> <span style="vertical-align: super;">'+stars+'</span>\
      </div>\
      <div class="col s6">\
        <p class="right" >Ultima atualização: '+formataData(update)+'</p>\
      </div>\
    </div>\
    <div class="row">\
      <div class="col s6">\
        <div class="input-field col s12 hide" style="margin: 0;">\
          <select multiple  id="'+id+'"></select>\
        </div>\
        <div id="badges-'+id+'" class="col s12" style="margin-top: 10px;padding-left: 0;"></div>\
      </div>\
      <div class="col s6">\
        <a id="save'+i+'" onclick="saveTag('+id+','+i+');" class="hide btn-floating btn-large waves-effect waves-light green right">\
          <i class="material-icons">check</i>\
        </a>\
        <a id="select'+i+'" onclick="getSelect('+id+','+i+');" class="btn tooltipped btn-floating btn-large waves-effect waves-light purple right" data-position="left" data-tooltip="Adicione tags!">\
          <i class="material-icons">add</i>\
        </a>\
      </div>\
    </div>\
  </li>';
  printBadges(id); 
}

function printBadges(id) {
  $.ajax({
    method: "POST",
    url: "tags/ajaxTagSelect",
    data: {id},
    success: function(result){
      var badges = '';
      result = JSON.parse(result);
      var m0 = ' style="margin: 0;"';
      result.forEach(item => {
        if (item.selected == 'selected') {
          badges += '<span class="new badge blue left"'+m0+'>'+item.name_tag+'</span>';
          m0 = '';
        }
      });
      $('#badges-'+id).html(badges);
    }        
  });
}
    
function getSelect(id, i){
    $('#select'+i).addClass('hide');
    $('#save'+i).removeClass('hide');
    createSelect(id);
    $('select').formSelect();
    $('#badges-'+id).addClass('hide');
    $('#'+id).parent().parent().removeClass('hide');
};

function saveTag(id, index){
    if(respSearch[index].id === id){
        var tags = $('#'+id).val();
        $.ajax({
            method: "POST",
            url: "repository/ajaxInsert",
            data: {
            id_rep: respSearch[index].id,
            name: respSearch[index].name,
            description: respSearch[index].description,
            stars: respSearch[index].stargazers_count,
            updateDate:formataData(respSearch[index].updated_at),
            id_tag: tags
            },
            success: function(result){
                if(result == 'true'){
                    M.toast({html: 'Cadastrado com sucesso!!'})
                    $('#select'+index).removeClass('hide');
                    $('#save'+index).addClass('hide');
                    $('#'+id).parent().parent().addClass('hide');
                    printBadges(id);
                    $('#badges-'+id).removeClass('hide');
                }
            }
        });
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
              selectTag += '<option value="'+result[i].id_tag+'" '+check+'>'+result[i].name_tag+'</option>';
            }
            var select = document.getElementById(id);
            select.innerHTML = selectTag;
            $('select').formSelect();
        }        
    });
}

function formataData(data) {
    var cursor = data.split('-');
    var ano = cursor[0];
    var mes = cursor[1];
    cursor = cursor[2].split('T');
    var dia = cursor[0];
    var hora = cursor[1].replace('Z', '');
    return dia+'/'+mes+'/'+ano+' '+hora;
}