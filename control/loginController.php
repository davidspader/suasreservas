<?php
session_start();
include_once '../model/Usuario.php';
include_once '../model/Validacao.php';
if ($_REQUEST['req']) {
    $req = $_REQUEST['req'];
    $validador = new Validacao();
    switch ($req) {
        case "sair":
            unset($_SESSION['logado']);
            header("Location: ../index.php");
            break;
        case "entrar":

            $_SESSION['erros'] = array();

            $email = filter_input(INPUT_POST, 'emailLogin', FILTER_VALIDATE_EMAIL);
            $senha = (hash('sha512', filter_input(INPUT_POST, 'senhaLogin')));

            //Validando email:
            if ($email == null) {
                array_push($_SESSION['erros'], "E-mail inválido.");
            }
            
            if (!empty($_SESSION['erros'][0])) {
                $_SESSION['tituloErro'] = "Por favor, ative o JavaScript";
                header("Location: ../index.php?pagina=erro");
                break;
            }

            $login = new Usuario(null, null, null, null, null, null);
            if (!$login = $login->logar($email, $senha)) {
                array_push($_SESSION['erros'], "E-mail ou senha inválido.");
                $_SESSION['tituloErro'] = "Desculpe, ocorreu um erro:";
                header("Location: ../index.php?pagina=login&login=1");
                break;
            }
            $_SESSION['logado'] = serialize($login);
            header("Location: ../dashboard.php");
            break;
    }
}
