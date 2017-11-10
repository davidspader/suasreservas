$(document).ready(function () {    
    $(".formularioLocatario").validate({
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

