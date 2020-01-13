const BASE_URL = 'localhost/GitHubMySearch/';

$(document).ready(function(){
    $('.tabs').tabs();
    setTimeout(function(){
        loginWrapper.classList.toggle('open'); 
    },800);
});
    
var openLoginRight = document.querySelector('.h1');
var loginWrapper = document.querySelector('.login-wrapper');

openLoginRight.addEventListener('click', function(){
    loginWrapper.classList.toggle('open'); 
});

$("#login").submit(function(e) {
    e.preventDefault();
    var email;
    var password;

    for(var valor of $(this).serializeArray()){
      if(valor.name == 'name_user' ? name_user = valor.value : '');
      if(valor.name == 'email' ? email = valor.value : '');
    }
    
 $.ajax({
    method: "POST",
    url: "login/ajax_login",
    data: {
      email: email,
      password: password
    },
    success: function(result){
      if(result == 'true'){
        window.location ='home';
      }
    }
  }); 
});

$("#register").submit(function(e) {
    e.preventDefault();
    var name_user;
    var email;
    var password;
    var passwordConfirm;

    for(var valor of $(this).serializeArray()){
      if(valor.name == 'name_user' ? name_user = valor.value : '');
      if(valor.name == 'email' ? email = valor.value : '');
      if(valor.name == 'password' ? password = valor.value : '');
      if(valor.name == 'passwordConfirm' ? passwordConfirm = valor.value : '');
    }
    
 $.ajax({
    method: "POST",
    url: "login/ajax_insert",
    data: {
      name_user: name_user,
      email: email,
      password: password,
      passwordConfirm: passwordConfirm
    },
    success: function(result){
      if(result == 'false'){
        alert("Senha incorreta!");
      }else if(result === 'true'){
        window.location ='home';
      }
    }
  }); 
});