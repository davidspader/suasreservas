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
        event.preventDefault();
        swal({
            title: "Você tem certeza?",
            text: "Ao deletar, você não terá mais acesso a esse item!",
            icon: "warning",
            buttons: ["Cancelar!", "Confirmar!"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.replace(this.href);
                }
            });
    });

    $('#txt_consulta').quicksearch('.lista');

    $(".informacoes").hide();
    $(".menos-detalhes").hide();


    $( ".detalhes" ).click(function() {
        var id = "#toggle-" + $(this).parent().data('id');
        $(id).toggle();
        if($(this).text() === "Mostrar mais"){
            $(this).text("Mostrar menos");
        }else{
            $(this).text("Mostrar mais");
        }
    });

    if (!window.matchMedia("(min-width: 980px)").matches) {
        $("body").addClass("sidenav-closed");
    }
});
