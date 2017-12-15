$(document).ready(function () {
    
    
    $(".campoCnpj").hide();
    
    if ($('.radioJuridica').is(':checked')) {
        $(".campoCnpj").show();
        $(".campoCnpj").val("");
        $(".campoCpf").hide();
        $(".nomeIntermediador").attr("placeholder", "Nome da empresa");
    }else{
        $(".campoCnpj").hide();
        $(".campoCpf").show();
        $(".campoCpf").val("");
        $(".nomeIntermediador").attr("placeholder", "Nome");
    }
    
    $(".radioJuridica").click(function () {
        $(".campoCnpj").show();
        $(".campoCnpj").val("");
        $(".campoCpf").hide();
        $(".nomeIntermediador").attr("placeholder", "Nome da empresa");
    });
    $(".radioFisica").click(function () {
        $(".campoCnpj").hide();
        $(".campoCpf").show();
        $(".campoCpf").val("");
        $(".nomeIntermediador").attr("placeholder", "Nome");
    });
    
    $(".formularioIntermediador").validate({
        rules: {
            nomeIntermediador: {
                required: true
            },
            cpfIntermediador: {
                cpf: true
            },
            emailIntermediador: {
                email: true
            },
            telefoneCelularIntermediador: {
                telefone: true
            },
            telefoneFixoIntermediador: {
                telefone: true
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
            },
            telefoneCelularIntermediador: {
                telefone: "Digite um telefone celular válido"
            },
            telefoneFixoIntermediador: {
                telefone: "Digite um telefone fixo válido"
            }
        }
    });
});



