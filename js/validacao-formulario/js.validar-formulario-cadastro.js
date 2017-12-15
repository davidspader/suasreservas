$(document).ready(function () {
    $(".formularioCadastro").validate({
        rules: {
            nomeCadastro: {
                required: true, rangelength: [2, 255]
            },
            emailCadastro: {
                required: true, email: true, maxlength: 255
            },
            cpfCadastro: {
                required: true, cpf: true
            },
            senhaCadastro: {
                required: true, rangelength: [6, 255]
            },
            telefoneCadastro: {
                required: true, rangelength: [14, 15], telefone: true
            }
        },
        messages: {
            nomeCadastro: {
                required: "O campo nome é obrigatório", rangelength: "Digite um nome válido"
            },
            emailCadastro: {
                required: "O campo e-mail é obrigatório", email: "Digite um e-mail válido", maxlength: "O campo email deve ser menor"
            },
            cpfCadastro: {
                required: "O campo CPF é obrigatório", cpf: "Digite um CPF válido"
            },
            senhaCadastro: {
                required: "O campo senha é obrigatório", rangelength: "A senha deve conter mais de 6 digitos"
            },
            telefoneCadastro: {
                required: "O campo telefone é obrigatório", rangelength: "Digite um telefone válido", telefone: "Digite um telefone válido"
            }
        }
    });
});
