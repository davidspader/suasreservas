<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="css/imagens/logo/logo-verde.png"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="cadastro"><strong>Cadastre-se</strong></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form formularioCadastro" role="form" method="post" action="control/cadastroController.php">
                                        <div class="form-group">
                                            <label class="sr-only" for="nomeCadastro">Nome Completo</label>
                                            <input type="text" class="form-control" id="nomeCadastro" name="nomeCadastro" placeholder="Nome completo" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="emailCadastro">E-mail</label>
                                            <input type="text" class="form-control" id="emailCadastro" name="emailCadastro" placeholder="E-mail" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="cpfCadastro">CPF</label>
                                            <input type="text" class="form-control cpf" id="cpfCadastro" name="cpfCadastro" placeholder="CPF" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="senhaCadastro">Senha</label>
                                            <input type="password" class="form-control" id="senhaCadastro" name="senhaCadastro" placeholder="Senha" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="telefoneCadastro">Telefone celular</label>
                                            <input type="text" class="form-control celular" id="telefoneCadastro" name="telefoneCadastro" placeholder="Telefone celular" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn botao-padrao btn-block" id="botaoCadastro">Cadastrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>Login</strong></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form formularioLogin" role="form" method="post" action="control/loginController.php" id="formularioLogin">
                                        <input type="hidden" name="req" value="entrar">
                                        <div class="form-group">
                                            <label class="sr-only" for="emailLogin">E-mail</label>
                                            <input type="text" class="form-control" id="emailLogin" name="emailLogin" placeholder="E-mail" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="senhaLogin">Senha</label>
                                            <input type="password" class="form-control" id="senhaLogin" name="senhaLogin" placeholder="Senha" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn botao-padrao btn-block" id="botaoLogin">Entrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<header class="masthead">
    <div class="overlay">
        <div class="container">
            <h1 id="bannerTitle">Total controle sobre suas reservas!</h1>
        </div>
    </div>
</header>

<div class="geral">
    
<section id="iconesDescricao">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-4">
                <div>
                    <img class="img-fluid" src="css/imagens/icones/icone-casa.png" alt="">
                </div>
                <div>
                    <h2><strong>Imóveis</strong></h2>
                    <p class="p-10">Adicione e gerencie a quantidade de imóveis que você desejar, o gerenciamento das reservas é feito de forma individual baseado em cada imóvel.</p>
                </div>
            </div>
            <div class="col-md-4 p-5">
                <div>
                    <img class="img-fluid" src="css/imagens/icones/icone-intermediador.png">
                </div>
                <div>
                    <h2><strong>Intermediadores</strong></h2>
                    <p class="p-10">Cadastre intermediadores. Intermediadores são pessoas (físicas ou jurídicas) que auxiliam a locação do imóvel, uma imobiliária por exemplo.</p>
                </div>
            </div>
            <div class="col-md-4 p-5">
                <div>
                    <img class="img-fluid" src="css/imagens/icones/icone-contrato.png" alt="">
                </div>
                <div>
                    <h2><strong>Contratos</strong></h2>
                    <p class="p-10">Crie contratos. Utilizando uma reserva é possível gerar um contrato dinâmico com todos os dados sobre a reserva.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-fluid mb-15">
        <div class="text-center">
            <h2 id="title">Você precisa gerenciar suas reservas? Nós te ajudamos!</h2>
            <p class="sub">O Suas reservas ajudará a fazer o controle de todas as suas reservas, de forma totalmente online.</p>
            <div class="col-md-6 centered">
                <a href="index.php?pagina=login" class="btn btn-lg botao-home btn-block mb-15">Cadastre-se agora! É totalmente grátis</a>
            </div>
        </div>
    </div>
</section>

<footer class="bg-padrao text-center">
    <div>
        <p>Todos os diretos reservados &copy;</p>
    </div>
</footer>
</div>
<script src="js/validacao-formulario/js.validar-formulario-cadastro.js"></script>    
<script src="js/validacao-formulario/js.validar-formulario-login.js"></script>    
    