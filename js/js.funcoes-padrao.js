$(document).ready(function () {
    $(".painel-formulario").hide();

    $(document).on('click', '.botaoCadastrar', function () {
        $(".painel-formulario").show();
        $(".botaoCadastrar").prop("disabled", true);
        $(".selectImovel").attr('disabled', 'disabled');
    });
    $(document).on('click', '.botaoCancelar', function () {
        $(".painel-formulario").hide();
        $(".botaoCadastrar").prop("disabled", false);
        $(".selectImovel").attr('disabled', 'disabled');
        $(".selectImovel").removeAttr('disabled');
    });
    
    $(".btn-apagar").click(function(evento) {
        if (!confirm("tem certeza que deseja excluir?"))
          evento.preventDefault();
    });

    $('#txt_consulta').quicksearch('.lista');
});
