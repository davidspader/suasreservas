$(document).ready(function () {
    $(".telefoneCelular").mask("(99) 99999-9999");
    $(".telefoneFixo").mask("(99) 9999-9999");
    $("#cpfLocatario").mask("999.999.999-99");
    
    $("#formularioLocatario").validate({
        rules: {
            nomeLocatario: {
                required: true
            },
            cpfLocatario: {
                cpf: true
            },
            emailLocatario: {
                email: true
            }
        },
        messages: {
            nomeLocatario: {
                required: "O campo é obrigatório"
            },
            cpfLocatario: {
                cpf: "Digite um CPF Inválido"
            },
            emailLocatario: {
                email: "Digite um e-mail válido"
            }
        }
    });
});

