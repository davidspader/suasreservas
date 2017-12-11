<?php
    if(isset($_SESSION['logado'])){
        header("Location: index.php");
    }
    if(isset($_GET['login'])){
        $login = $_GET['login'];
        echo "<input type='hidden' id='verifica' value='$login'>";
    }else{
        echo "<input type='hidden' id='verifica' value='0'>";
    }
?>
<div class="container" style="margin-top:40px">
    <div class="row" id="login">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php if(isset($_SESSION['feedback'])){ ?>
                        <strong> <?php echo $_SESSION['feedback'] ?></strong>
                    <?php }else{ ?>
                        <strong> Entre agora!</strong>
                    <?php } unset($_SESSION['feedback']); ?>
                </div>
                <div class="panel-body">
                    <?php if (isset($_SESSION['tituloErro'])) { ?>
                        <div>
                            <p>O seu formulário contem os seguintes erros:</p>

                            <ul class="list-group">
                                <?php
                                foreach ($_SESSION['erros'] as $mensagem) {
                                    echo "<li class='list-group-item error2'>" . $mensagem . "</li>";
                                }
                                unset($_SESSION['erros']);
                                unset($_SESSION['tituloErro']);
                                ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <form class="form formularioLogin" role="form" method="post" action="control/loginController.php" id="formularioLogin2">
                        <input type="hidden" name="req" value="entrar">
                        <fieldset>

                            <div class="row">
                                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span> 
                                            <input class="form-control" placeholder="*E-mail" name="emailLogin" type="text" autofocus required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-lock"></i>
                                            </span>
                                            <input class="form-control" placeholder="*Senha" name="senhaLogin" type="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-lg botao-padrao btn-block" value="Entrar">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer ">
                    Ainda não está cadastrado? <a href="#" id="loginHide"> Clique aqui! </a>
                </div>
                <div class="panel-footer ">
                    <p>Volte para a <a href="index.php">página inical</a>.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="cadastrar">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong> Cadastre-se!</strong>
                </div>
                <div class="panel-body">
                    <form class="form formularioCadastro" role="form" method="post" action="control/cadastroController.php" id="formularioCadastro2">
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span> 
                                            <input class="form-control" placeholder="*Nome" name="nomeCadastro" type="text" autofocus required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span> 
                                            <input class="form-control" placeholder="*E-mail" name="emailCadastro" id="emailCadastro" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span> 
                                            <input class="form-control cpf" placeholder="*CPF" name="cpfCadastro" id="cpfCadastro" type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-lock"></i>
                                            </span>
                                            <input class="form-control" placeholder="*Senha" name="senhaCadastro" type="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-phone"></i>
                                            </span>
                                            <input class="form-control celular" placeholder="*Telefone celular" name="telefoneCadastro" type="text" id="telefoneCadastro" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-lg botao-padrao btn-block" value="Cadastrar">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer ">
                    Deseja logar? <a href="#" id="loginShow"> Clique aqui! </a>
                </div>
                <div class="panel-footer ">
                    <p>Volte para a <a href="index.php">página inical</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/js.page-login.js"></script>
<script src="js/validacao-formulario/js.validar-formulario-cadastro.js"></script>
<script src="js/validacao-formulario/js.validar-formulario-login.js"></script>