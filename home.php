<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="css/imagens/icones/icone-titulo.png">
        <title>Suas Reservas</title>
        <link href="landing-page/css/bootstrap.min.css" rel="stylesheet">
        <link href="landing-page/css/custom.css" rel="stylesheet">
        <link href="landing-page/css/loaders.css" rel="stylesheet">
        <link href="landing-page/css/swiper.min.css" rel="stylesheet">
        <link rel="stylesheet" href="landing-page/css/animate.min.css">
        <link rel="stylesheet" href="landing-page/css/nivo-lightbox.css">
        <link rel="stylesheet" href="landing-page/css/nivo_themes/default/default.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110341458-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-110341458-1');
        </script>
    </head>
    <body>
        <div class="loader loader-bg">
            <div class="loader-inner ball-clip-rotate-pulse">
                <div></div>
                <div></div>
            </div>
        </div>

        <nav class="navbar navbar-toggleable-md mb-4 top-bar navbar-static-top sps sps--abv">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="css/imagens/logo/logo-verde.png"</span></a>
                <div class="collapse navbar-collapse" id="navbarCollapse1">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"> <a class="nav-link" href="index.php?pagina=login">Cadastre-se</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="index.php?pagina=login&login=1">Login</a> </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="swiper-container main-slider" id="myCarousel">
            <div class="swiper-wrapper">
                <div class="swiper-slide slider-bg-position" style="background:url('landing-page/img/1.jpg')" data-hash="slide1">
                    <h2>Tenha total controle sobre suas reservas!</h2>
                </div>
                <div class="swiper-slide slider-bg-position" style="background:url('landing-page/img/2.jpg')" data-hash="slide2">
                    <h2>Cadastre-se agora, e não perca essa oportunidade!</h2>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
            <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
        </div>

        <section class="service-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading text-md-center text-xs-center">
                            <h2>Características do sistema:</h2>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md-3 text-sm-center service-block"> <i class="fa fa-home" aria-hidden="true"></i>
                                <h3>Imóveis</h3>
                                <h3><small>Cadastre seus <br>imóveis!</small></h3>
                                <p>Seus imóveis podem ser casas ou apartamentos, e nós também permitimos que você adicione o endereço de cada imóvel. Todos os imóveis são gerenciados individualmente.</p>
                            </div>
                            <div class="col-md-3 text-sm-center service-block"> <i class="fa fa-user" aria-hidden="true"></i>
                                <h3>Intermediadores</h3>
                                <h3><small>Cadastre seus <br>intermediadores!</small></h3>
                                <p>Seus intermediadores podem ser pessoas físicas ou jurídicas que auxiliam na locação do imóvel e nós também permitimos que você adicione os dados básicos da pessoa.</p>
                            </div>
                            <div class="col-md-3 text-sm-center service-block"> <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                <h3>Reservas</h3>
                                <h3><small>Cadastre suas <br>reservas!</small></h3>
                                <p>Suas reservas serão criadas a partir dos seus imóveis, nós permitimos que você adicione todos os dados relevantes em uma reserva e visualize-a com facilidade.</p>
                            </div>
                            <div class="col-md-3 text-sm-center service-block"> <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                <h3>Contratos</h3>
                                <h3><small>Crie seus <br>contratos!</small></h3>
                                <p>Seus contratos são gerados de forma dinâmica com base nas informações que você adicionou no seu imóvel, intermediador e reserva e informará apenas os dados do locatário.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-sec parallax-section" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h2>Sobre o projeto</h2>
                    </div>
                    <div class="col-md-4">
                        <p>O projeto Suas Reservas consiste em um sistema de gerenciamento de reservas em aluguéis de temporada, com foco no proprietário do imóvel, onde o mesmo poderá ter controle sobre suas reservas.</p>
                        <p>Existem vários sistemas para imobiliárias, hotéis e pousadas, porém eles não se adaptam bem a pequenos empreendedores que alugam suas próprias casas na temporada, pois além de serem formas diferentes de aluguel, os pequenos empreendedores muitas vezes não precisam de sistemas complexos.</p>
                    </div>
                    <div class="col-md-4">
                        <p>A ideia surgiu com a percepção de que muitas pessoas ainda utilizam métodos falhos para controlar suas reservas e também com a falta de sistemas voltados para o aluguel de imóveis com baixa complexidade e fácil aprendizado.</p>
                        <p>O projeto foi desenvolvido por David Spader Ambrózio, na disciplina Projeto integrador, no curso de Sistemas para internet, na Universidade do Vale do Itajaí (Univali), Itajaí, Santa Catarina.</p>
                        <p><a href="index.php?pagina=login" class="btn btn-transparent-white btn-capsul">Cadastre-se agora!</a></p>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row copy-footer">
                    <div class="texto-verde"> &copy;<script type="text/javascript">document.write(new Date().getFullYear());</script> suasreservas.herokuapp.com </div>
                </div>
            </div>
        </footer>

        <script src="landing-page/js/jquery.min.js" ></script>
        <script src="landing-page/js/bootstrap.min.js"></script> 
        <script src="landing-page/js/scrollPosStyler.js"></script> 
        <script src="landing-page/js/swiper.min.js"></script> 
        <script src="landing-page/js/isotope.min.js"></script> 
        <script src="landing-page/js/nivo-lightbox.min.js"></script> 
        <script src="landing-page/js/wow.min.js"></script> 
        <script src="landing-page/js/core.js"></script> 

        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
