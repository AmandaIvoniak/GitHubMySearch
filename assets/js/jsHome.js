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
                createTags(result[i].user_id, result[i].tags_id, result[i].name_tag)
            }
        }
    });
}

function createTags(user_id, tags_id, name_tag){
    var tagList = document.getElementById("tagList");
    tagList.innerHTML += '<li class="collection-item">'+
                            '<div class="row valign-wrapper">'+
                                '<div class="col s6 left">'+
                                    '<input type="text" class="tags" user_id="'+user_id+'" id="'+tags_id+'" value="'+name_tag+'">'+
                                '</div>'+
                                '<div class="col s6">'+
                                    '<a id="delete" href="javascript:void(0)"><i class="iconColor material-icons right">delete</i></a>'+
                                '</div>'+
                            '</div>'+
                        '</li>';
}