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
      if(valor.name == 'email' ? email = valor.value : '');
      if(valor.name == 'password' ? password = valor.value : '');
    }
    
 $.ajax({
    method: "POST",
    url: "login/ajaxLogin",
    data: {
      email: email,
      password: password
    },
    success: function(result){
      if(result == 'true'){
        window.location ='home';
      }else{
        M.toast({html: 'E-mail ou senha incorretos'})
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
    url: "user/ajaxInsert",
    data: {
      name_user: name_user,
      email: email,
      password: password,
      passwordConfirm: passwordConfirm
    },
    success: function(result){
      if(result === 'true'){
        window.location.href ='home';
      }else{
        M.toast({html: 'Informações incorretas!!'});

      }
    }
  }); 
});