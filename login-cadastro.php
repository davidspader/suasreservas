<?php
if(isset($_SESSION['logado'])){
    header("Location: index.php");
}
if(isset($_GET['type'])){
    $cadastro = "flipped";
    echo "<input type='hidden' id='verifica' value='$cadastro'>";
}else{
    echo "<input type='hidden' id='verifica' value=''>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="css/imagens/icones/icone-titulo.png" type="image/x-icon">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login e Cadastro</title>
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
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="login-box" id="login-box">
        <form class="form formularioLogin login-form" role="form" method="post" action="control/loginController.php" id="formularioLogin2">
            <input type="hidden" name="req" value="entrar">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Acesse o sistema</h3>
            <div class="form-group">
                <label class="control-label">E-mail</label>
                <input class="form-control" type="text" placeholder="E-mail" name="emailLogin" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">Senha</label>
                <input class="form-control" type="password" placeholder="Senha" name="senhaLogin">
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox"><span class="label-text">Manter conectado</span>
                        </label>
                    </div>
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Cadastre-se</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>ACESSAR O SISTEMA</button>
            </div>
        </form>
        <form class="forget-form form formularioCadastro" role="form" method="post" action="control/cadastroController.php" id="formularioCadastro2">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Cadastre-se</h3>
            <div class="form-group">
                <label class="control-label">*Nome</label>
                <input class="form-control" placeholder="Nome" name="nomeCadastro" type="text" autofocus required>
            </div>
            <div class="form-group">
                <label class="control-label">*E-mail</label>
                <input class="form-control" placeholder="E-mail" name="emailCadastro" id="emailCadastro" type="text" required>
            </div>
            <div class="form-group">
                <label class="control-label">*CPF</label>
                <input class="form-control cpf" placeholder="CPF" name="cpfCadastro" id="cpfCadastro" type="text" required>
            </div>
            <div class="form-group">
                <label class="control-label">*Senha</label>
                <input class="form-control" placeholder="*Senha" name="senhaCadastro" type="password" required>
            </div>
            <div class="form-group">
                <label class="control-label">*Telefone celular</label>
                <input class="form-control celular" placeholder="*Telefone celular" name="telefoneCadastro" type="text" id="telefoneCadastro" required>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>CADASTRAR</button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i>Acessar o sistema</a></p>
            </div>
        </form>
    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="js/plugins/pace.min.js"></script>
<script src="bootstrap-jquery/jquery/jquery.maskedinput.js"></script>
<script src="bootstrap-jquery/jquery/jquery.validate.js"></script>
<script src="js/jquery.validate-metodos.js"></script>
<script src="js/validacao-formulario/js.validar-formulario-login.js"></script>
<script src="js/validacao-formulario/js.validar-formulario-cadastro.js"></script>
<script src="js/js.page-login.js"></script>
<script src="js/js.mascaras.js"></script>
<script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
    });
</script>
</body>
</html>