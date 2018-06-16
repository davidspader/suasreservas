$(document).ready(function () {

    $(".formApartamento").hide();
    
    $(".radioApartamento").click(function () {
        $(".formApartamento").show();
    });
    $(".radioCasa").click(function () {
        $(".formApartamento").hide();
    });

    $('[data-toggle="ajuda_identificacaoImovel"]').popover({
        placement: 'right',
        trigger: 'hover'
    });
    
    $(".formularioImovel").validate({
        rules: {
            identificacaoImovel: {
                required: true
            },
            estadoImovel: {
                rangelength: [2, 2]
            },
            cidadeImovel: {
                rangelength: [2, 255]
            },
            bairroImovel: {
                rangelength: [2, 255]
            },
            logradouroImovel: {
                rangelength: [1, 255]
            },
            numeroImovel: {
                number: true
            },
            edificioImovel: {
                rangelength: [2, 255]
            },
            blocoImovel: {
                rangelength: [1, 255]
            },
            numeroApImovel: {
                number: true
            },
            estadoImovel:{
                sigla: true
            }
        },
        messages: {
            identificacaoImovel: {
                required: "O campo é obrigatório"
            },
            estadoImovel: {
                rangelength: "Digite uma sigla válida"
            },
            cidadeImovel: {
                rangelength: "Minimo 2 caracteres"
            },
            bairroImovel: {
                rangelength: "Minimo 2 caracteres"
            },
            logradouroImovel: {
                rangelength: "Minimo 1 caracter"
            },
            numeroImovel: {
                number:"Deve conter apenas números" 
            },
            edificioImovel: {
                rangelength: "Minimo 2 caracteres"
            },
            blocoImovel: {
                rangelength: "Minimo 1 caracter"
            },
            numeroApImovel: {
                number:"Deve conter apenas números"
            },
            estadoImovel:{
                sigla: "Sigla inválida"
            }
        }
    });
    
});


