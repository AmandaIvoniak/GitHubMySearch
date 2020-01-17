const BASE_URL = 'localhost/GitHubMySearch/';
var index = 0;
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
    getTags();
    $('select').formSelect();
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
    if(password != passwordConfirm ? M.toast({html: 'Senhas não coincidem!'}) : '');

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
                M.toast({html: 'Senhas diferentes!'});
            }else if(result === 'true'){
                M.toast({html: 'Salvo com sucesso!'});
            }
        }
    });
})

function getTags(){
    $.ajax({
        method: "POST",
        url: "tags/ajaxTag",
        data: {},
        success: function(result){
            result = JSON.parse(result);
            for (i = 0; i < result.length; i++) {
                createTags(i, result[i].id_user, result[i].id_tag, result[i].name_tag);
            }
        }
    });
}

function createTags(i, id_user, id_tag, name_tag){
    $('#tagList').append('\
        <li class="collection-item" id="li-'+index+'">\
            <div class="row valign-wrapper">\
                <div class="col s6 left">\
                    <input type="text" class="tags" id_user="'+id_user+'" id="'+id_tag+'" value="'+name_tag+'">\
                </div>\
                <div class="col s6">\
                    <a onclick="deleteTags('+id_tag+', '+index+')"; href="javascript:void(0)"><i class="iconColoRed material-icons right">delete</i></a>\
                    <a onclick="editTags('+id_tag+');" href="javascript:void(0)"><i class="iconColor material-icons right ">edit</i></a>\
                </div>\
            </div>\
        </li>'
    );
    index++;
}

function editTags(id_tag) {
    $.ajax({
        method: "POST",
        url: "tags/ajaxUpdate",
        data: {
            id_tag: id_tag,
            name_tag: $('#'+id_tag).val()
        },
        success: resp => {
            if (resp == 'true') {
                var text = 'Tag editada com sucesso!';
            } else {
                var text = 'Não foi possivel editada a tag!'
            }
            M.toast({html: text});
        }
    });
}

function deleteTags(id_tag, num) {
    id_user = $('#'+id_tag).attr('id_user');
    name_tag = $('#'+id_tag).val();

    $.ajax({
        method: "POST",
        url: "tags/ajaxDelete",
        data: {
            id_tag:id_tag,
            id_user:id_user  
        },
        success: function(result){
            if (result == 'true') {
                M.toast({html: 'Tag deletada com sucesso!'});
                $('#li-'+num).remove();
                index--;
            } else {
                M.toast({html: 'Não foi possivel deletar a tag!'});
            }
        }
    });
};

$('#registerTag').click(function(){
    var tag = $('#inputTag').val();
    $('#inputTag').val('');
    if(tag == ""){
        M.toast({html: 'Por favor preencha o campo!'});
    }else{
        $.ajax({
            method: "POST",
            url: "tags/ajaxInsert",
            data: {
                name_tag: tag
            },
            success: function(result){ 
                result = JSON.parse(result);
                for (i = 0; i < result.length; i++) {
                    createTags(i, result[i].id_user, result[i].id_tag, result[i].name_tag);
                }
                M.toast({html: 'Tag cadastrada com sucesso!'});
            }
        });
    }
});