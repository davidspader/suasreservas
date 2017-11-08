$(document).ready(function () {
    
    if ($('#verifica').val() == 1) {
        $("#cadastrar").hide();
        $("#login").show();
    }else{
        $("#login").hide();
        $("#cadastrar").show();
    }
    
    $("#loginHide").click(function () {
        $("#login").hide();
        $("#cadastrar").show();
    });
    $("#loginShow").click(function () {
        $("#login").show();
        $("#cadastrar").hide();
    });
    
    
    
    $("#formularioLogin2").validate({
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
    
    $("#cpfCadastro").mask("999.999.999-99");
    $("#telefoneCadastro").mask("(99) 99999-9999");

    $("#formularioCadastro2").validate({
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
                required: true, rangelength: [14, 15]
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
                required: "O campo telefone é obrigatório", rangelength: "Digite um telefone válido"
            }
        }
    });
});