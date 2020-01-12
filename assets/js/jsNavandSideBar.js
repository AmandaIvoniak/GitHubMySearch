$(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
});

$("#logoff").click(function(e) {
    e.preventDefault();    
    $.ajax({
      method: "POST",
      url: "login/logoff",
      success: resp => {
        if(resp == 'true'){
          window.location.href = 'login';
        }
      }
    }); 
});