$(document).ready(function () {

    $("#valorTotal").prop('disabled', true);

    $(".data").mask("99/99/9999");

    $(".valorReal").maskMoney({thousands:'.',decimal:','});
    
    
    $(".selectImovel").change(function(){
        var idImovel = $("option:selected", this).val();
        if(idImovel != 0){
            var url = "dashboard.php?pagina=reservas&idImovel="+idImovel;
            window.location.assign(url);
        }
    });
    
    $("#cadastroReserva").validate({
        rules: {
            dataInicial: {
                required: true, dataBR: true, compararData: true
            },
            dataFinal: {
                required: true, dataBR: true, compararData: true
            },
            precoDiaria: {
                required: true
            },
            porcentagemIntermediador: {
                apenasNumero: true
            }
        },
        messages: {
            dataInicial: {
                required: "A data inicial é obrigatória", compararData: "A data inicial deve ser menor que a final"
            },
            dataFinal: {
                required: "A data final é obrigatória", compararData: "A data final deve ser maior que a inicial"
            },
            precoDiaria: {
                required: "O preço da diária é obrigatório"
            },
            porcentagemIntermediador: {
                apenasNumero: "A porcentagem deve conter apenas números"
            }
        }
    });
});


