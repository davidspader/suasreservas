$(document).ready(function () {
    $(".formularioLogin").validate({
        rules: {
            emailLogin: {
                required: true, email: true
            },
            senhaLogin: {
                required: true, rangelength: [6, 50]
            }
        },
        messages: {
            emailLogin: {
                required: "O campo e-mail é obrigatório", email: "Digite um e-mail válido"
            },
            senhaLogin: {
                required: "O campo senha é obrigatório", rangelength: "Digite uma senha válida"
            }
        }
    });
});