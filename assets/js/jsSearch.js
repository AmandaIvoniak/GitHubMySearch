const BASE_URL = 'localhost/GitHubMySearch/';
var respSearch = 0;
$(document).ready(function(){

})

$('[name="tag"]').click(function(){
    console.log('oi')
    console.log(this)

  //$('.saveTagBtn').removeClass('hide');
})
// $('#tag').focusout(function(){
//   if($('#tag').val() === ''){
//   $('#saveTag').addClass('hide');
//   $('#tag').chip('data');
// }
// })

$('#searchForm').submit(function(e){
  e.preventDefault();
  var search;

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
    for (i = 0; i < result.length; i++) {
        createSearchList(i, result[i].full_name,result[i].id,result[i].updated_at,result[i].description,result[i].stargazers_count);
    }
        $('select').formSelect();
        $('.chips').chips();
        $('.chips-autocomplete').chips({
            autocompleteOptions: {
            data: {
                'Apple': null,
                'Microsoft': null,
                'Google': null
            },
            limit: Infinity,
            minLength: 1
            }
        });
    }
  });
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
                                    '<p>'+description+'</p>'+
                                    '<i class="material-icons">grade</i>'+stars+
                                '</div>'+
                                '<div class="col s6">'+
                                    '<p class="right" >Ultima atualização:'+update+'</p>'+
                                '</div>'+
                            '</div>'+
                            '<div class="row">'+
                                '<div class="col s6">'+
                                    '<div name="tag" id="'+id+'" class=" chips chips-autocomplete"></div>'+
                                '</div>'+
                                '<div class="col s6">'+
                                    '<a onclick=saveTag('+id+','+i+'); class="saveTagBtn btn-floating btn-large waves-effect waves-light purple right">'+
                                    '<i class="material-icons">check</i></a>'+
                                '</div>'+
                            '</div>'+
                            '</li>';
}

function saveTag(id, index){
    if(respSearch[index].id === id){
      var tagsArray = M.Chips.getInstance($('#'+id)).chipsData;
      if(tagsArray.length > 0){
        var tags = [];
        tagsArray.forEach(element => {
            tags.push(element.tag);        
        });

        $.ajax({
            method: "POST",
            url: "repository/ajax_insert",
            data: {
              rep_id: respSearch[index].id,
              name: respSearch[index].full_name,
              description: respSearch[index].description,
              stars: respSearch[index].stargazers_count,
              updateDate:respSearch[index].updated_at,
              tags: JSON.stringify(tags)
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