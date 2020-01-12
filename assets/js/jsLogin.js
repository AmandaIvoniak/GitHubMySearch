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
    var senha;

    for(var valor of $(this).serializeArray()){
        if(valor.name ==='email' ? email = valor.value : '');        
        senha = (valor.name == 'senha') && valor.value;
    }
    
 $.ajax({
    method: "POST",
    url: "login/ajax_login",
    data: {
      email: email,
      senha: senha
    },
    success: function(result){
      if(result != 'false'){
        window.location = BASE_URL + 'login';
      }else{
          alert("Senha incorreta!");
      }
    }
  }); 
});

$("#register").submit(function(e) {
    e.preventDefault();
    var name;
    var email;
    var password;
    var password;

    for(var valor of $(this).serializeArray()){
        if(valor.name ==='email' ? email = valor.value : '');        
        senha = (valor.name == 'senha') && valor.value;
    }

    for(var valor of $(this).serializeArray()){
      if(valor.name == 'name' ? name = valor.value : '');
      if(valor.name == 'email' ? email = valor.value : '');
      if(valor.name == 'password' ? password = valor.value : '');
      if(valor.name == 'passwordConfirm' ? passwordConfirm = valor.value : '');
    }
    
 $.ajax({
    method: "POST",
    url: "login/ajax_insert",
    data: {
      name: name,
      email: email,
      password: password,
      passwordConfirm: passwordConfirm
    },
    success: function(result){
      if(result != 'false'){
        // window.location = BASE_URL + 'home';
      }else{
          alert("Senha incorreta!");
      }
    }
  }); 
});