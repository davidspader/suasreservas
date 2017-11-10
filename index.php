<?php
session_start();
if(isset($_SESSION['logado'])){
    header("Location: dashboard.php");
}
include_once './model/Usuario.php';
$pagina = isset($_REQUEST['pagina']) && !empty($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 'home';

$paginas = array(
    'home' => array(
        'titulo' => "Suas Reservas",
        'arquivo' => "home.php"
    ),
    'erro' => array(
        'titulo' => "Erro",
        'arquivo' => "erros.php"
    ),
    'login' => array(
        'titulo' => "Login",
        'arquivo' => "login.php"
    )
);
$selecionada = isset($paginas[$pagina]) ? $paginas[$pagina] : $paginas['home'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $selecionada['titulo']; ?></title>
        <link rel="icon" href="css/imagens/icones/icone-titulo.png" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="bootstrap-jquery/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/home-estilo.css" rel="stylesheet">
        <link href="css/padrao-estilo.css" rel="stylesheet">
        <script src="bootstrap-jquery/jquery/jquery.min.js"></script>
        <script src="bootstrap-jquery/bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap-jquery/jquery/jquery.maskedinput.js"></script>
        <script src="bootstrap-jquery/jquery/jquery.validate.js"></script>
        <script src="js/jquery.validate-metodos.js"></script>
    </head>
    <body>
        <div id="conteudo"><?php include_once($selecionada['arquivo']); ?></div>
    </body>
    <script src="js/js.mascaras.js"></script>    
</html>
