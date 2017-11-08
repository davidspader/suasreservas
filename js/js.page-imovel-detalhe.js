$(document).ready(function () {
    $("#cepImovel").mask("99999-999");
    $("#estadoImovel").mask("aa",{placeholder:" "});
    
    $("#casaEdicao").prop('disabled', true);
    $("#casaEdicao").prop('checked', true);
    $("#formApartamentoEdicao").hide();
    
    if ($('#apartamentoEdicao').is(':checked')) {
        $("#formApartamentoEdicao").show();
        $("#casaEdicao").prop('disabled', false);
        $("#casaEdicao").prop('checked', false);
        $("#apartamentoEdicao").prop('disabled', true);
    }
    
    $("#apartamentoEdicao").click(function () {
        $("#apartamentoEdicao").prop('disabled', true);
        $("#casaEdicao").prop('disabled', false);
        $("#casaEdicao").prop('checked', false);
        $("#formApartamentoEdicao").toggle();
        $("#tipoImovelEdicao").val("2");
    });
    $("#casaEdicao").click(function () {
        $("#apartamentoEdicao").prop('disabled', false);
        $("#casaEdicao").prop('disabled', true);
        $("#apartamentoEdicao").prop('checked', false);
        $("#formApartamentoEdicao").hide();
        $("#tipoImovelEdicao").val("1");
    });

    $("#formularioEdicaoImovel").validate({
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
