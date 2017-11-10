$(document).ready(function () {
    if ($('#verifica').val() == 1) {
        $("#cadastrar").hide();
        $("#login").show();
    }else{
        $("#login").hide();
        $("#cadastrar").show();
    }
    
    $("#loginHide").click(function () {
        $("#login").hide();
        $("#cadastrar").show();
    });
    $("#loginShow").click(function () {
        $("#login").show();
        $("#cadastrar").hide();
    });
});