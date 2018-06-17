<?php
session_start();
if (isset($_SESSION['logado'])) {
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

if ($selecionada['arquivo'] != "home.php") {
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
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110341458-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());

                gtag('config', 'UA-110341458-1');
            </script>

            <!-- Hotjar Tracking Code for suasreservas.herokuapp.com -->
            <script>
                (function(h,o,t,j,a,r){
                    h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                    h._hjSettings={hjid:918879,hjsv:6};
                    a=o.getElementsByTagName('head')[0];
                    r=o.createElement('script');r.async=1;
                    r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                    a.appendChild(r);
                })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
            </script>
        </head>
        <body>
            <div id="conteudo"><?php include_once($selecionada['arquivo']); ?></div>
        </body>
        <script src="js/js.mascaras.js"></script>    
    </html>

    <?php
} else {
    include_once($selecionada['arquivo']);
}