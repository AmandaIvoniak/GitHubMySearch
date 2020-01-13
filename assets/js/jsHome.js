const BASE_URL = 'localhost/GitHubMySearch/';
$(document).ready(function(){
    getTags();

});
function getTags(){
    $.ajax({
        method: "POST",
        url: "tags/ajax_getTags",
        data: {},
        success: function(result){
            console.log(result['name_tag']);
            var tagList = document.getElementsByClassName("tagList");
            tagList.innerHTML += '<li class="collection-item">'+
                        '<div class="row valign-wrapper">'+
                            '<div class="col s6 left">'+
                                '<input type="text" class="tags" name="tag" id="tag" value="'+result.name_tag+'">'+
                            '</div>'+
                            '<div class="col s6">'+
                                '<i class="material-icons right">send</i>'+
                                '<i class=" material-icons right">delete</i>'+
                            '</div>'+
                        '</div>'+
                    '</li>';             
        }
    });    
}