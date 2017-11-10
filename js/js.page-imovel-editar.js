$(document).ready(function () {
    if ($('#apartamentoEdicao').is(':checked')) {
        $(".formApartamento").show();
    }
    
    $(".radioApartamento").click(function () {
        $('.radioCasa').prop('checked', false);
    });
    $(".radioCasa").click(function () {
        $('.radioApartamento').prop('checked', false);
    });
    
});
