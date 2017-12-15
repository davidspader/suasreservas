$(document).ready(function () {

    $.validator.addMethod('cpf', function (value, element, param) {

        $return = true;
        if (value === "") {
            return true;
        }
        var invalidos = [
            '111.111.111-11',
            '222.222.222-22',
            '333.333.333-33',
            '444.444.444-44',
            '555.555.555-55',
            '666.666.666-66',
            '777.777.777-77',
            '888.888.888-88',
            '999.999.999-99',
            '000.000.000-00'
        ];
        for (i = 0; i < invalidos.length; i++) {
            if (invalidos[i] == value) {
                $return = false;
            }
        }

        value = value.replace("-", "");
        value = value.replace(/\./g, "");
        add = 0;
        for (i = 0; i < 9; i++) {
            add += parseInt(value.charAt(i), 10) * (10 - i);
        }
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11) {
            rev = 0;
        }
        if (rev != parseInt(value.charAt(9), 10)) {
            $return = false;
        }

        add = 0;
        for (i = 0; i < 10; i++) {
            add += parseInt(value.charAt(i), 10) * (11 - i);
        }
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11) {
            rev = 0;
        }
        if (rev != parseInt(value.charAt(10), 10)) {
            $return = false;
        }

        return $return;
    });

    jQuery.validator.addMethod("cnpj", function (cnpj, element) {
        cnpj = jQuery.trim(cnpj);

        // DEIXA APENAS OS NÚMEROS
        cnpj = cnpj.replace('/', '');
        cnpj = cnpj.replace('.', '');
        cnpj = cnpj.replace('.', '');
        cnpj = cnpj.replace('-', '');

        var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
        digitos_iguais = 1;

        if (cnpj.length < 14 && cnpj.length < 15) {
            return this.optional(element) || false;
        }
        for (i = 0; i < cnpj.length - 1; i++) {
            if (cnpj.charAt(i) != cnpj.charAt(i + 1)) {
                digitos_iguais = 0;
                break;
            }
        }

        if (!digitos_iguais) {
            tamanho = cnpj.length - 2
            numeros = cnpj.substring(0, tamanho);
            digitos = cnpj.substring(tamanho);
            soma = 0;
            pos = tamanho - 7;

            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2) {
                    pos = 9;
                }
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0)) {
                return this.optional(element) || false;
            }
            tamanho = tamanho + 1;
            numeros = cnpj.substring(0, tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2) {
                    pos = 9;
                }
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(1)) {
                return this.optional(element) || false;
            }
            return this.optional(element) || true;
        } else {
            return this.optional(element) || false;
        }
    }, "Informe um CNPJ válido.");

    $.validator.addMethod("dataBR", function (value, element) {
        if (value.length != 10)
            return false;
        // verificando data
        var data = value;
        var dia = data.substr(0, 2);
        var barra1 = data.substr(2, 1);
        var mes = data.substr(3, 2);
        var barra2 = data.substr(5, 1);
        var ano = data.substr(6, 4);
        if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12)
            return false;
        if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31)
            return false;
        if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0)))
            return false;
        if (ano < 1900)
            return false;
        return true;
    }, "Informe uma data válida");

    $.validator.addMethod("verificaFalse", function (value) {
        if (value === "false") {
            return false;
        }
        return true;
    });

    $.validator.addMethod("compararData", function () {
        var data_1 = new Date($("#dataInicial").val());
        var data_2 = new Date($("#dataFinal").val());
        if (data_1 > data_2) {
            return false;
        }
        return true;
    });

    $.validator.addMethod("apenasNumero", function (value) {
        if (isNaN(value)) {
            return false;
        }
        return true;
    });

    $.validator.addMethod("telefone", function (value) {
        var regex = "^\\([1-9]{2}\\) [2-9][0-9]{3,4}\\-[0-9]{4}$";
        var regexp = new RegExp(regex);
        var teste = regexp.exec(value);

        if(teste != null) {
            return true;
        }

        return false;

    });
});
