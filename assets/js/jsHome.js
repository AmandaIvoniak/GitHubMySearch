const BASE_URL = 'localhost/GitHubMySearch/';
$(document).ready(function(){    
    createSelect();
    $('select').formSelect();

});

function searchTag() {
    id_tag = $( "#selectTag" ).val();
    $.ajax({
        method:'POST',
        url:'tags/reportByTag',
        data:{
            id_tag: id_tag
        },
        success: function(result){
            var report = '';
            result = JSON.parse(result);

            result.forEach(element => {                          
                for (i = 0; i < element.length; i++){
                    report += '<li class="collection-item truncate"><div>'+element[i].name+'<a href="#!" class="secondary-content">'+element[i].name_tag+'</a></div></li>';
                }
                header();
                var reportByTag = document.getElementById('reportByTag');
                reportByTag.innerHTML += report;
            });
        }
    });
};

function header(){
    var reportByTag = document.getElementById('reportByTag');
    reportByTag.innerHTML = '\
        <li class="collection-header">\
            <h5>Suas Tags</h5>\
            <div class="row">\
                <div class="input-field col s11" >\
                    <select multiple id="selectTag" style="width: calc(100% - 66px); margin: 0 10px 0 0;">\
                    </select>\
                    <label>Selecione as tags desejadas</label>\
                </div>\
                <div class="input-field col s1">\
                    <a onclick="searchTag();" class="waves-effect waves-light btn purple">\
                        <i class="material-icons">search</i>\
                    </a>\
                </div>\
            </div>\
        </li>';
    createSelect();
}

function createSelect(){
    selectTag = '';
    $.ajax({
        method: "POST",
        url: "tags/ajaxTag",
        data: {},
        success: function(result){
            result = JSON.parse(result);
            for (i = 0; i < result.length; i++) {            
                selectTag += '<option value="'+result[i].id_tag+'">'+result[i].name_tag+'</option>';
            }

            $('#selectTag').html('');
            $('#selectTag').append(selectTag);
            $('select').formSelect();
        }
    });
}