$(document).ready(function () {

    $(".selectImovel").change(function(){
        var idImovel = $("option:selected", this).val();
        if(idImovel != 0){
            var url = "dashboard.php?pagina=reservas&idImovel="+idImovel;
            window.location.assign(url);
        }
    });
});


