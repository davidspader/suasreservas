<?php
session_start();
if(!isset($_SESSION['logado'])){
    header("Location: index.php");
}

if(isset($_SESSION['contrato'])){
    echo "<script language='javascript'> window.open('contrato.php', '_blank'); </script>";
}
include_once './model/Usuario.php';
include_once './model/Reserva.php';
include_once './model/Apartamento.php';
include_once './model/Validacao.php';
include_once './model/IntermediadorJuridico.php';
$pagina = isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 'reservas';

$paginas = array(
    'imoveis' => array(
        'titulo' => "Imóveis",
        'arquivo' => "imoveis.php"
    ),
    'imovel-editar' => array(
        'titulo' => "Editar imóvel",
        'arquivo' => "imovel-editar.php"
    ),
    'intermediadores' => array(
        'titulo' => "Intermediadores",
        'arquivo' => "intermediadores.php"
    ),
    'intermediador-editar' => array(
        'titulo' => "Editar intermediador",
        'arquivo' => "intermediador-editar.php"
    ),
    'reservas' => array(
        'titulo' => "Reservas",
        'arquivo' => "reservas.php"
    ),
    'reserva-editar' => array(
        'titulo' => "Editar reserva",
        'arquivo' => "reserva-editar.php"
    ),
    'criar-contrato' => array(
        'titulo' => "Criar contrato",
        'arquivo' => "criar-contrato.php"
    )
);

$selecionada = isset($paginas[$pagina]) ? $paginas[$pagina] : $paginas['reservas'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $selecionada['titulo']; ?></title>
        <link rel="icon" href="css/imagens/icones/icone-titulo.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="bootstrap-jquery/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dashboard-estilo.css" rel="stylesheet">
        <link href="css/padrao-estilo.css" rel="stylesheet">
        <script src="bootstrap-jquery/jquery/jquery.min.js"></script>
        <script src="bootstrap-jquery/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/js.formulario-hide.js"></script>
        <script src="bootstrap-jquery/jquery/jquery.maskedinput.js"></script>
        <script src="bootstrap-jquery/jquery/jquery.validate.js"></script>
        <script src="bootstrap-jquery/jquery/jquery.maskMoney.js" type="text/javascript"></script>
        <script src="js/jquery.validate-metodos.js"></script>
    </head>
    <body>
        <div id="top-nav" class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php"><img src="css/imagens/logo/logo-verde.png"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="control/loginController.php?req=sair"><strong><i class="glyphicon glyphicon-log-out"></i> Sair</strong></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-default">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="dashboard.php?pagina=reservas"><i class="glyphicon glyphicon-calendar"></i> Reservas</a></li>
                <li><a href="dashboard.php?pagina=imoveis"><i class="glyphicon glyphicon-home"></i> Imóveis</a></li>
                <li><a href="dashboard.php?pagina=intermediadores"><i class="glyphicon glyphicon-user"></i> Intermediadores</a></li>
            </ul>
            </div>

        </div>
        <div class="col-md-10">
            <?php if (isset($_SESSION['feedback'])) { ?>
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $_SESSION['feedback']; ?></strong>
            </div>
            <?php } unset($_SESSION['feedback']); ?>
            
            <?php if (isset($_SESSION['tituloErro'])) { ?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach ($_SESSION['erros'] as $erro) { ?>
                    <span><?php echo $erro."<br>"; ?></span>
                <?php } ?>
            </div>
            <?php } unset($_SESSION['erros']);unset($_SESSION['tituloErro']); ?>
            <div id="conteudo"><?php include_once($selecionada['arquivo']); ?></div>
            <hr>
        </div>
    </body>
</html>
