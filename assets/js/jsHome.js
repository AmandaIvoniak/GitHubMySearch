const BASE_URL = 'localhost/GitHubMySearch/';
var index = 0;
$(document).ready(function(){
    getTags();
});
function getTags(){
    $.ajax({
        method: "POST",
        url: "tags/ajax_tag_data",
        data: {},
        success: function(result){
            result = JSON.parse(result);
            for (i = 0; i < result.length; i++) {
                createTags(i, result[i].user_id, result[i].tags_id, result[i].name_tag)
            }
        }
    });
}

function createTags(i, user_id, tags_id, name_tag){
    $('#tagList').append(
        '<li class="collection-item" id="li-'+index+'">'+
            '<div class="row valign-wrapper">'+
                '<div class="col s6 left">'+
                    '<input type="text" class="tags" user_id="'+user_id+'" id="'+tags_id+'" value="'+name_tag+'">'+
                '</div>'+
                '<div class="col s6">'+
                    '<a onclick="deleteTags('+tags_id+', '+index+')"; href="javascript:void(0)"><i class="iconColor material-icons right">delete</i></a>'+
                    '<a onclick="editTags('+tags_id+');" href="javascript:void(0)"><i class="iconColor material-icons right">edit</i></a>'+
                '</div>'+
            '</div>'+
        '</li>'
    );
    index++;
}

function editTags(tags_id) {
    $.ajax({
        method: "POST",
        url: "tags/ajax_update",
        data: {
            tags_id: tags_id,
            name_tag: $('#'+tags_id).val()
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

function deleteTags(tags_id, num) {
    user_id = $('#'+tags_id).attr('user_id');
    name_tag = $('#'+tags_id).val();

    $.ajax({
        method: "POST",
        url: "tags/ajax_delete",
        data: {
            tags_id:tags_id,
            user_id:user_id  
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
        alert('preencha o campo');
    }else{
        $.ajax({
            method: "POST",
            url: "tags/ajax_insert",
            data: {
                name_tag: tag
            },
            success: function(result){  
                result = JSON.parse(result);
                for (i = 0; i < result.length; i++) {
                    createTags(i, result[i].user_id, result[i].tags_id, result[i].name_tag);
                }
                M.toast({html: 'Tag cadastrada com sucesso!'});
            }
        });
    }
});