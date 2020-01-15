const BASE_URL = 'localhost/GitHubMySearch/';
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
    var tagList = document.getElementById("tagList");
    if(i === 0 ? tagList.innerHTML = '<li class="collection-header"><h5>Suas Tags</h5></li>': '');

    tagList.innerHTML += '<li class="collection-item">'+
                            '<div class="row valign-wrapper">'+
                                '<div class="col s6 left">'+
                                    '<input type="text" class="tags" user_id="'+user_id+'" id="'+tags_id+'" value="'+name_tag+'">'+
                                '</div>'+
                                '<div class="col s6">'+
                                    '<a onclick=deleteTags('+tags_id+'); href="javascript:void(0)"><i class="iconColor material-icons right">delete</i></a>'+
                                '</div>'+
                            '</div>'+
                        '</li>';
}



function deleteTags(tags_id) {
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
            console.log('maaaaaaaaaaaaaaaaaaoe')
        }
    });


};



$('#inputTag').click(function(){    
    var tagList = document.getElementById("tagList");
    tagList.innerHTML += '<li class="collection-item newitem">'+
                            '<div class="row valign-wrapper">'+
                                '<div class="col s6 left">'+
                                    '<input type="text" class="withoutTag">'+
                                '</div>'+
                                '<div class="col s6">'+
                                    '<a onclick="close();" href="javascript:void(0);"><i class="iconColor material-icons right">close</i></a>'+
                                '</div>'+
                            '</div>'+
                        '</li>';

    $('#inputTag').addClass('hide');
    $('#registerTag').removeClass('hide');
});

function close(){
    console.log('oioioioioioioioioioioioioioiooioioioioioioo');
    // var newitem = document.getElementsByClassName('newitem');
    // newitem.innerHTML = '';
};

$('#registerTag').click(function(){
    var tag = $('#tagList').find('.withoutTag').val();

    if(tag === ""){
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
                $('#registerTag').addClass('hide');
                $('#inputTag').removeClass('hide');
            }
        });
    }
});