$(document).ready(function () {

    function limpa_formulário_cep() {
        $("#logradouroImovel").val("");
        $("#bairroImovel").val("");
        $("#cidadeImovel").val("");
        $("#estadoImovel").val("");
    }

    $("#cepImovel").blur(function () {

        var cep = $(this).val().replace(/\D/g, '');

        if (cep !== "") {

            var validacep = /^[0-9]{8}$/;

            if (validacep.test(cep)) {

                $("#logradouroImovel").val("...");
                $("#bairroImovel").val("...");
                $("#cidadeImovel").val("...");
                $("#estadoImovel").val("...");

                $.getJSON("//viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        $("#logradouroImovel").val(dados.logradouro);
                        $("#bairroImovel").val(dados.bairro);
                        $("#cidadeImovel").val(dados.localidade);
                        $("#estadoImovel").val(dados.uf);
                        
                    } 
                    else {
                        limpa_formulário_cep();
                    }
                });
            } 
        } 
    });
});