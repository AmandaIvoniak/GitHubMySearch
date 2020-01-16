$(document).ready(function(){
    $.ajax({
        method: "POST",
        url: "user/ajaxUser",    
        success: function(result){
            result = JSON.parse(result);
            $('#name_user').val(result.name_user);
            $('#email').val(result.email);
            $('.editBtn').attr('id', result.id_user);
        }
      });
});


$('#formEdit').submit(function(e){
    e.preventDefault();

    var name_user;
    var id;
    var email;
    var password;
    var passwordConfirm;

    for(var valor of $(this).serializeArray()){
      if(valor.name == 'name_user' ? name_user = valor.value : '');
      if(valor.name == 'email' ? email = valor.value : '');
      if(valor.name == 'password' ? password = valor.value : '');
      if(valor.name == 'passwordConfirm' ? passwordConfirm = valor.value : '');
    }
        
    id = $('.editBtn').attr('id');
    
    if(password != passwordConfirm){
        alert('Senhas não coencidem!');
    }

    $.ajax({
        method: "POST",
        url: "user/ajaxUpdate",
        data: {
          id_user:id,
          name_user: name_user,
          email: email,
          password: password,
          passwordConfirm: passwordConfirm
        },
        success: function(result){
          if(result == 'false'){
            alert("Senha incorreta!");
          }else if(result === 'true'){
           alert('Salvo!')
          }
        }
      }); 


})
