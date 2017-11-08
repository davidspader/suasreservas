<?php
session_start();
if (!isset($_SESSION['logado']) || !isset($_SESSION['contrato'])) {
    header("Location: index.php");
}
$locador = $_SESSION['contrato'][0];
$locatario = $_SESSION['contrato'][1];
$intermediador = $_SESSION['contrato'][2];
$imovel = $_SESSION['contrato'][3];
$reserva = $_SESSION['contrato'][4];
unset($_SESSION['contrato']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contrato</title>
        <link rel="icon" href="css/imagens/icones/icone-titulo.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="bootstrap-jquery/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="bootstrap-jquery/jquery/jquery.min.js"></script>
        <script src="bootstrap-jquery/bootstrap/js/bootstrap.min.js"></script>
        <link href="css/a4-estilo.css" rel="stylesheet">
    </head>
    <body>
        <div class="page">
            <div class="text-justify">
                <div class="row">
                    <h1 class="text-center">Contrato de locação</h1>
                </div>
                <div class="row m-20">
                    <?php echo $locador; ?>
                </div>
                <div class="row m-20">
                    <?php echo $locatario; ?>
                </div>
                <div class="row m-20">
                    <?php echo $intermediador; ?>
                </div>
                <div class="row m-20">
                    <?php echo $imovel; ?>
                </div>
                <div class="row m-20">
                    <?php echo $reserva; ?>
                </div>
            </div>
            <div class="centered text-center m-20">
                <div class="col-md-4">
                    <div class="row">
                        <strong>______________________</strong>
                    </div>
                    <div class="row">
                        <strong>Assinatura locador</strong>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <strong>______________________</strong>
                    </div>
                    <div class="row">
                        <strong>Assinatura locatário</strong>
                    </div>
                </div>
                <?php if($intermediador != ""){ ?>
                <div class="col-md-4">
                    <div class="row">
                        <strong>______________________</strong>
                    </div>
                    <div class="row">
                        <strong>Assinatura intermediador</strong>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="row m-20">
                <div class="centered text-center col-md-4">
                    <img src="css/imagens/logo/logo-verde.png" alt="logo">
                </div>
            </div>
        </div>
    </body>
</html>
