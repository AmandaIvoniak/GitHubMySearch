$(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
});

$("#logoff").click(function(e) {
    $.ajax({
      method: "POST",
      url: "login/ajax_logoff",
      success: function(result){
        if(result == 'true'){
          window.location.href = 'login';
        }
      }
    }); 
});