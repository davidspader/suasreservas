<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="author" content="David Spader">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Suas Reservas</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="landing-page/images/icones/favicon.png">
    <link rel="shortcut icon" type="image/ico" href="landing-page/images/icones/favicon.png" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="landing-page/css/bootstrap.min.css">
    <link rel="stylesheet" href="landing-page/css/owl.carousel.min.css">
    <link rel="stylesheet" href="landing-page/css/themify-icons.css">
    <link rel="stylesheet" href="landing-page/css/magnific-popup.css">
    <link rel="stylesheet" href="landing-page/css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="landing-page/css/normalize.css">
    <link rel="stylesheet" href="landing-page/css/style.css">
    <link rel="stylesheet" href="landing-page/css/responsive.css">
    <script src="landing-page/js/vendor/modernizr-2.8.3.min.js"></script>

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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

<body data-spy="scroll" data-target="#primary-menu">

    <div class="preloader">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
    </div>
    <!--Mainmenu-area-->
    <div class="mainmenu-area" data-spy="affix" data-offset-top="100">
        <div class="container">
            <!--Logo-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-menu">
                    <span class="icon-bar hamburger"></span>
                    <span class="icon-bar hamburger"></span>
                    <span class="icon-bar hamburger"></span>
                </button>
                <a href="#" class="navbar-brand logo">
                    <img src="landing-page/images/logo.png">
                </a>
            </div>
            <!--Logo/-->
            <nav class="collapse navbar-collapse" id="primary-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" class="link-menu">Cadastre-se</a></li>
                    <li><a href="#" class="link-menu">Acesse o sistema</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!--Mainmenu-area/-->



    <!--Header-area-->
    <header class="header-area overlay full-height relative v-center" id="home-page">
        <div class="absolute anlge-bg"></div>
        <div class="container">
            <div class="row v-center">
                <div class="col-xs-12 col-md-7 header-text">
                    <h2>CONTROLE SUAS RESERVAS!</h2>
                    <p>O Suas Reservas é um sistema de gerenciamento de reservas em aluguéis de temporada onde você terá todo o controle sobre suas locações.</p>
                    <a href="#" class="button white">CADASTRE-SE AGORA</a>
                </div>
                <div class="hidden-xs hidden-sm col-md-5 text-right">
                    <div class="screen-box screen-slider">
                        <div class="item">
                            <img src="landing-page/images/telas/tela-1.png" alt="">
                        </div>
                        <div class="item">
                            <img src="landing-page/images/telas/tela-2.png" alt="">
                        </div>
                        <div class="item">
                            <img src="landing-page/images/telas/tela-3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Header-area/-->

    <section class="gray-bg section-padding" id="feature-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2 class="text-green">Características Do Sistema</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="box">
                        <div class="box-icon">
                            <img src="landing-page/images/icones/icon-imovel.png" alt="">
                        </div>
                        <h3 class="text-green">Cadastre seus imóveis!</h3>
                        <p>Seus imóveis podem ser casas ou apartamentos, e nós também permitimos que você adicione o endereço de cada imóvel. Todos os imóveis são gerenciados individualmente.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="box">
                        <div class="box-icon">
                            <img src="landing-page/images/icones/icon-intermediador.png" alt="">
                        </div>
                        <h3 class="text-green">Cadastre seus intermediadores!</h3>
                        <p>Seus intermediadores podem ser pessoas físicas ou jurídicas que auxiliam na locação do imóvel e nós também permitimos que você adicione os dados básicos da pessoa.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="box">
                        <div class="box-icon">
                            <img src="landing-page/images/icones/icon-calendario.png" alt="">
                        </div>
                        <h3 class="text-green">Cadastre suas reservas!</h3>
                        <p>Suas reservas serão criadas a partir dos seus imóveis. Nós permitimos que você adicione todos os dados relevantes em uma reserva e visualize-a com facilidade.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="box">
                        <div class="box-icon">
                            <img src="landing-page/images/icones/icon-contrato.png" alt="">
                        </div>
                        <h3 class="text-green">Crie seus contratos!</h3>
                        <p>Seus contratos são gerados de forma dinâmica com base nas informações que você adicionou no seu imóvel, intermediador e reserva e informará apenas os dados do locatário.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="price-area overlay section-padding" id="price-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2>CONFIRA OS NOSSOS PLANOS</h2>
                        <p><strong>ATENÇÃO: Todos os planos estarão gratuitos durante um curto periodo de tempo. Não perca está oportunidade.</strong></p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="price-table">
                        <h3 class="text-uppercase price-title">GRATUITO</h3>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong class="amount"><span class="big">Versão gratuita</span></strong></li>
                            <li>1 Imóvel</li>
                            <li>3 Intermediadores</li>
                            <li>Reservas ilimitadas</li>
                            <li>Contratos ilimitados</li>
                        </ul>
                        <hr>
                        <a href="#" class="button">Cadastre-se agora</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="price-table">
                        <h3 class="text-uppercase price-title">BÁSICO</h3>
                        <hr>
                        <ul class="list-unstyled">
                            <li class="text-through"><strong class="amount">R$ <span class="big">14,99</span></strong>/Mês</li>
                            <li>5 Imóveis</li>
                            <li>7 Intermediadores</li>
                            <li>Reservas ilimitadas</li>
                            <li>Contratos ilimitados</li>
                        </ul>
                        <hr>
                        <a href="#" class="button">Cadastre-se agora</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="price-table">
                        <h3 class="text-uppercase price-title">ILIMITADO</h3>
                        <hr>
                        <ul class="list-unstyled">
                            <li class="text-through"><strong class="amount">R$ <span class="big">19,90</span></strong>/Mês</li>
                            <li>Imóveis ilimitados</li>
                            <li>Intermediadores ilimitados</li>
                            <li>Reservas ilimitadas</li>
                            <li>Contratos ilimitados</li>
                        </ul>
                        <hr>
                        <a href="#" class="button">Cadastre-se agora</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Feature-area-->
    <section class="gray-bg section-padding" id="service-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2 class="text-green">POR QUE ESCOLHER NOS ESCOLHER?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="landing-page/images/icones/icon-facil-de-utilizar.png" alt="">
                        </div>
                        <h4 class="text-green">FÁCIL DE UTILIZAR</h4>
                        <p>Nosso sistema foi estruturado para que você aprenda a utilizá-lo, de forma simples e prática. </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="landing-page/images/icones/icon-design-responsivo.png" alt="">
                        </div>
                        <h4 class="text-green">EM QUALQUER DISPOSITIVO</h4>
                        <p>Você pode acessar o sistema do celular e também do computador, sem nenhuma perda de informações!</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="box">
                        <div class="box-icon">
                            <img src="landing-page/images/icones/icon-suporte.png" alt="">
                        </div>
                        <h4 class="text-green">suporte online</h4>
                        <p>Nosso suporte online estará a sua disposição para te auxiliar com qualquer coisa que você precisar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-area relative sky-bg" id="contact-page">
        <div class="absolute footer-bg"></div>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-7 col-sm-offset-3 text-center">
                        <div class="page-title">
                            <h2>Alguma dúvida? Entre em contato!</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <address class="side-icon-boxes">
                            <div class="side-icon-box">
                                <div class="side-icon">
                                    <img src="landing-page/images/mail-arrow.png" alt="">
                                </div>
                                <p><strong>E-mail: </strong>
                                    suasreservas@gmail.com<br />
                                </p>
                            </div>
                        </address>
                    </div>
                    <div class="col-xs-12 col-md-8">
                        <form action="process.php" id="contact-form" method="post" class="contact-form">
                            <div class="form-double">
                                <input type="text" id="form-name" name="form-name" placeholder="Digite seu nome" class="form-control" required="required">
                                <input type="email" id="form-email" name="form-email" class="form-control" placeholder="Digite seu e-mail" required="required">
                            </div>
                            <input type="text" id="form-subject" name="form-subject" class="form-control" placeholder="Digite o assunto do contato">
                            <textarea name="message" id="form-message" name="form-message" rows="5" class="form-control" placeholder="Digite a sua mensagem" required="required"></textarea>
                            <button type="sibmit" class="button">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 pull-right">
                        <ul class="social-menu text-right x-left">
                            <li><a href="https://www.facebook.com/suasreservas" target="_blank"><i class="ti-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/suasreservas/" target="_blank"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <p>© Suas Reservas - 2018</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>





    <!--Vendor-JS-->
    <script src="landing-page/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="landing-page/js/vendor/bootstrap.min.js"></script>
    <!--Plugin-JS-->
    <script src="landing-page/js/owl.carousel.min.js"></script>
    <script src="landing-page/js/contact-form.js"></script>
    <script src="landing-page/js/jquery.parallax-1.1.3.js"></script>
    <script src="landing-page/js/scrollUp.min.js"></script>
    <script src="landing-page/js/magnific-popup.min.js"></script>
    <script src="landing-page/js/wow.min.js"></script>
    <!--Main-active-JS-->
    <script src="landing-page/js/main.js"></script>

</body>

</html>
