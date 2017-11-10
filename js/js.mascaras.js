$(document).ready(function () {
    
    $(".cpf").mask("999.999.999-99");
    $(".celular").mask("(99) 99999-9999");
    $(".fixo").mask("(99) 9999-9999");
    $(".data").mask("99/99/9999");
    $(".valorReal").maskMoney({thousands:'.',decimal:','});
    $(".cep").mask("99999-999");
    $(".siglaEstado").mask("aa",{placeholder:" "});
    $(".cnpj").mask("99.999.999/9999-99");
    
});


