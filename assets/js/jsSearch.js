const BASE_URL = 'localhost/GitHubMySearch/';
var globalOi = 0;
$(document).ready(function(){
    $('select').formSelect();

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

    // var chip = {
    //     tag: 'chip content',
    //     image: '', //optional
    //   };

    // curl https://api.github.com/search/repositories?q=karan/joe&sort=stars&order=desc

    // $.ajax({
    //   method: "GET",
    //   url: "https://api.github.com/search/repositories?q=karan/joe&sort=stars&order=asc",    
    //   success: function(result){
    //     globalOi = result;
    //     console.log(globalOi);
    //     for (i = 0; i < result.items.length; i++) {
    //       createSearchList(result.items[i].full_name,result.items[i].id,result.items[i].updated_at,result.items[i].description);
    //   }
        

    //   }
    // });
})

// function createSearchList(name, id, update, description){
//   var listSearch = document.getElementById("listSearch");
//   listSearch.innerHTML += '<li class="collection-item avatar">'+
//                             '<i class="material-icons circle">folder</i>'+
//                             '<!-- <img src="images/yuna.jpg" alt="" class="circle"> -->'+
//                             '<div class="row">'+
//                                 '<div class="col s6" id="'+id+'">'+
//                                     '<span class="title">'+name+'</span>'+
//                                     '<p>'+description+'</p>'+
//                                     '<i class="material-icons">grade</i>'+
//                                 '</div>'+
//                                 '<div class="col s6">'+
//                                     '<p class="right" >Ultima atualização:'+update+'</p>'+
//                                 '</div>'+
//                             '</div>'+
//                             '<div class="row">'+
//                                 '<div class="col s6">'+
//                                     '<div class="chips chips-autocomplete"></div>'+
//                                 '</div>'+
//                                 '<div class="col s6">'+
//                                     '<a class="btn-floating btn-large waves-effect waves-light purple right">'+
//                                     '<i class="material-icons">check</i></a>'+
//                                 '</div>'+
//                             '</div>'+
//                           '</li>';
//}

$('#searchBtn').submit(function(e){
    e.preventDefault(e);
    console.log($(this).serializeArray())

    for(var valor of $(this).serializeArray()){
        console.log(valor)
        //if(valor.name == 'name_user' ? name_user = valor.value : '');

      }
})