<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}

if (isset($_SESSION['contrato'])) {
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
        'arquivo' => "imoveis.php",
        'icon' => "home"
    ),
    'imovel-editar' => array(
        'titulo' => "Editar imóvel",
        'arquivo' => "imovel-editar.php",
        'icon' => "home"
    ),
    'intermediadores' => array(
        'titulo' => "Intermediadores",
        'arquivo' => "intermediadores.php",
        'icon' => "users"
    ),
    'intermediador-editar' => array(
        'titulo' => "Editar intermediador",
        'arquivo' => "intermediador-editar.php",
        'icon' => "users"
    ),
    'reservas' => array(
        'titulo' => "Reservas",
        'arquivo' => "reservas.php",
        'icon' => "calendar"
    ),
    'reserva-editar' => array(
        'titulo' => "Editar reserva",
        'arquivo' => "reserva-editar.php",
        'icon' => "calendar"
    ),
    'criar-contrato' => array(
        'titulo' => "Criar contrato",
        'arquivo' => "criar-contrato.php",
        'icon' => "calendar"
    )
);

$selecionada = isset($paginas[$pagina]) ? $paginas[$pagina] : $paginas['reservas'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">

    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Suas reservas">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">


    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- title-->
    <title><?php echo $selecionada['titulo']; ?></title>
    <link rel="icon" href="css/imagens/icones/icone-titulo.png" type="image/x-icon">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110341458-1"></script>

    <!-- Google analytics script-->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-110341458-1');
    </script>

    <script src="js/jquery-3.2.1.min.js"></script>

</head>
<body class="app sidebar-mini">
<!-- Navbar-->
<header class="app-header">
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar"></a>

    <!-- Navbar Right Menu-->
    <ul class="app-nav">

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"><i
                        class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="control/loginController.php?req=sair"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    <ul class="app-menu">

        <li>
            <a class="app-menu__item" href="dashboard.php">
                <i class="app-menu__icon fa fa-calendar"></i>
                <span class="app-menu__label">Reservas</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="dashboard.php?pagina=imoveis">
                <i class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">Imóveis</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="dashboard.php?pagina=intermediadores">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Intermediadores</span>
            </a>
        </li>

    </ul>
</aside>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-<?php echo $selecionada['icon']; ?>"></i> <?php echo $selecionada['titulo']; ?></h1>
            <p>Gerencie suas reservas</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div>
                <?php if (isset($_SESSION['feedback'])) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $_SESSION['feedback']; ?></strong>
                    </div>
                <?php }
                unset($_SESSION['feedback']); ?>

                <?php if (isset($_SESSION['tituloErro'])) { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php foreach ($_SESSION['erros'] as $erro) { ?>
                            <strong><?php echo $erro . "<br>"; ?></strong>
                        <?php } ?>
                    </div>
                <?php }
                unset($_SESSION['erros']);
                unset($_SESSION['tituloErro']); ?>
                <div id="conteudo"><?php include_once($selecionada['arquivo']); ?></div>
                <hr>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->

<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<script src="js/plugins/bootstrap-datepicker.min.js"></script>

<!-- Scripts-->
<script src="js/js.funcoes-padrao.js"></script>
<script src="bootstrap-jquery/jquery/jquery.maskedinput.js"></script>
<script src="bootstrap-jquery/jquery/jquery.quicksearch.js"></script>
<script src="bootstrap-jquery/jquery/jquery.validate.js"></script>
<script src="bootstrap-jquery/jquery/jquery.maskMoney.js" type="text/javascript"></script>
<script src="js/jquery.validate-metodos.js"></script>
<script src="js/js.mascaras.js"></script>
</body>
</html>