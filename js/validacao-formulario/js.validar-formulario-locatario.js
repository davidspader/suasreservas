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
            },
            telefoneCelularLocatario: {
                telefone: true
            },
            telefoneFixoLocatario: {
                telefone: true
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
            },
            telefoneCelularLocatario: {
                telefone: "Digite um telefone celular válido"
            },
            telefoneFixoLocatario: {
                telefone: "Digite um telefone fixo válido"
            }
        }
    });
});

