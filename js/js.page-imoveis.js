$(document).ready(function () {
    $("#cepImovel").mask("99999-999");
    $("#estadoImovel").mask("aa",{placeholder:" "});
    
    $("#casa").prop('disabled', true);

    $("#formApartamento").hide();
    $("#apartamento").click(function () {
        $("#apartamento").prop('disabled', true);
        $("#casa").prop('disabled', false);
        $("#casa").prop('checked', false);
        $("#formApartamento").toggle();
        $("#tipoImovel").val("2");
    });
    $("#casa").click(function () {
        $("#apartamento").prop('disabled', false);
        $("#casa").prop('disabled', true);
        $("#apartamento").prop('checked', false);
        $("#formApartamento").hide();
        $("#tipoImovel").val("1");
    });

    $('[data-toggle="ajuda_identificacaoImovel"]').popover({
        placement: 'right',
        trigger: 'hover'
    });
    
    $("#formularioCadastroImovel").validate({
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
            }
        }
    });
    
});
