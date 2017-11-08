$(document).ready(function () {
    
    $(".telefoneCelular").mask("(99) 99999-9999");
    $(".telefoneFixo").mask("(99) 9999-9999");
    $("#cpfIntermediador").mask("999.999.999-99");
    $("#cnpjIntermediador").mask("99.999.999/9999-99");
    
    $("#fisica").prop('disabled', true);
    $("#cnpjIntermediador").hide();
    
    $("#cnpjIntermediador").val("false");
    
    $("#juridica").click(function () {
        $("#juridica").prop('disabled', true);
        $("#fisica").prop('disabled', false);
        $("#fisica").prop('checked', false);
        $("#cnpjIntermediador").show();
        $("#cnpjIntermediador").val("");
        $("#cpfIntermediador").hide();
        $("#cpfIntermediador").val("false");
        $("#tipoIntermediador").val("2");
        $("#nomeIntermediador").attr("placeholder", "Nome da empresa");
    });
    $("#fisica").click(function () {
        $("#juridica").prop('disabled', false);
        $("#fisica").prop('disabled', true);
        $("#juridica").prop('checked', false);
        $("#cnpjIntermediador").hide();
        $("#cnpjIntermediador").val("false");
        $("#cpfIntermediador").show();
        $("#cpfIntermediador").val("");
        $("#tipoIntermediador").val("1");
        $("#nomeIntermediador").attr("placeholder", "Nome");
    });
    
    $('[data-toggle="ajuda_nomeJuridico"]').popover({
        placement: 'right',
        trigger: 'hover'
    });
    $('[data-toggle="ajuda_nomeFisico"]').popover({
        placement: 'right',
        trigger: 'hover'
    });
    
    $("#formularioCadastroIntermediador").validate({
        rules: {
            nomeIntermediador: {
                required: true
            },
            cpfIntermediador: {
                cpf: true
            },
            emailIntermediador: {
                email: true
            }
        },
        messages: {
            nomeIntermediador: {
                required: "O campo é obrigatório"
            },
            cpfIntermediador: {
                cpf: "Digite um CPF Inválido"
            },
            emailIntermediador: {
                email: "Digite um e-mail válido"
            }
        }
    });
});


