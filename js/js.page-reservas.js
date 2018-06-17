$(document).ready(function () {

    $(".selectImovel").change(function(){
        var idImovel = $("option:selected", this).val();
        if(idImovel != 0){
            var url = "dashboard.php?pagina=reservas&idImovel="+idImovel;
            window.location.assign(url);
        }
    });

    function converteMoedaFloat(valor){

        if(valor === ""){
            valor =  0;
        }else{
            valor = valor.replace(".","");
            valor = valor.replace(",",".");
            valor = parseFloat(valor);
        }
        return valor;

    }

    function converteFloatMoeda(valor){
        var inteiro = null, decimal = null, c = null, j = null;
        var aux = new Array();
        valor = ""+valor;
        c = valor.indexOf(".",0);
        //encontrou o ponto na string
        if(c > 0){
            //separa as partes em inteiro e decimal
            inteiro = valor.substring(0,c);
            decimal = valor.substring(c+1,valor.length);
        }else{
            inteiro = valor;
        }

        //pega a parte inteiro de 3 em 3 partes
        for (j = inteiro.length, c = 0; j > 0; j-=3, c++){
            aux[c]=inteiro.substring(j-3,j);
        }

        //percorre a string acrescentando os pontos
        inteiro = "";
        for(c = aux.length-1; c >= 0; c--){
            inteiro += aux[c]+'.';
        }
        //retirando o ultimo ponto e finalizando a parte inteiro

        inteiro = inteiro.substring(0,inteiro.length-1);

        decimal = parseInt(decimal);
        if(isNaN(decimal)){
            decimal = "00";
        }else{
            decimal = ""+decimal;
            if(decimal.length === 1){
                decimal = decimal+"0";
            }
        }


        valor = "R$ "+inteiro+","+decimal;


        return valor;

    }

    function qtdDiarias() {
        DAY = 1000 * 60 * 60  * 24

        data1 = $("#dataInicial").val() + " 00:00";
        data2 = $("#dataFinal").val() + " 00:00";

        var nova1 = data1.toString().split('/');
        Nova1 = nova1[1]+"/"+nova1[0]+"/"+nova1[2];

        var nova2 = data2.toString().split('/');
        Nova2 = nova2[1]+"/"+nova2[0]+"/"+nova2[2];

        var d1 = new Date(Nova1);
        var d2 = new Date(Nova2);

        return  Math.round((d2.getTime() - d1.getTime()) / DAY);
    }

    $(".data").blur(function(){
        if(!isNaN(qtdDiarias())){
            $("#qtdDiarias").attr("placeholder", qtdDiarias());
        }
    });

    $(".total").blur(function(){
        var qtdDiaria = qtdDiarias();
        var precoDiario = converteMoedaFloat($("#precoDiaria").val());
        var taxaLimpeza = converteMoedaFloat($("#taxaLimpeza").val());
        var desconto = converteMoedaFloat($("#desconto").val());
        var depositado = converteMoedaFloat($("#totalDepositado").val());
        var porcentagem = $("#porcentagemIntermediador").val();

        valorTotal = qtdDiaria*precoDiario-desconto;

        valorIntermediador = (valorTotal / 100) * porcentagem;

        valorParaReceber = valorTotal+taxaLimpeza-depositado-desconto-valorIntermediador;

        valorTotal = valorTotal+taxaLimpeza-valorIntermediador;
        if(!isNaN(qtdDiaria)){
            $("#TotalReceber").attr("placeholder",converteFloatMoeda(valorParaReceber));
            $("#valorIntermediador").attr("placeholder", converteFloatMoeda(valorIntermediador));
            $("#total").attr("placeholder", converteFloatMoeda(valorTotal));
        }
    });
});


