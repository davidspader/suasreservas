$(document).ready(function () {
    $(".formularioReserva").validate({
        rules: {
            imovel:{
                required: true
            },
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
            imovel:{
                required: "Você deve selecionar um imóvel"
            },
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

