<?php
session_start();
include_once '../model/Usuario.php';
include_once '../model/Validacao.php';

$_SESSION['erros'] = array();

$nome = filter_input(INPUT_POST, 'nomeCadastro');
$email = filter_input(INPUT_POST, 'emailCadastro', FILTER_VALIDATE_EMAIL);
$cpf = filter_input(INPUT_POST, 'cpfCadastro');
$senha = (hash('sha512', filter_input(INPUT_POST, "senhaCadastro")));
$telefone = filter_input(INPUT_POST, 'telefoneCadastro');

$cadastro = new Usuario(null, $nome, $email, $cpf, $telefone, $senha);
$validador = new Validacao();

//Validando nome:
if(!$validador->verificarTamanhoMinimoString($cadastro->getNome(), 1)){
    array_push($_SESSION['erros'], "Nome inválido.");
}
if(!$validador->verificarTamanhoMaximoString($cadastro->getNome(), 254)){
    array_push($_SESSION['erros'], "Nome inválido.");
}

//Validando email:
if($cadastro->getEmail() == null){
    array_push($_SESSION['erros'], "E-mail inválido.");
}

//Validando CPF:
if(!Validacao::validarCPF($cadastro->getCpf())){
    array_push($_SESSION['erros'], "CPF inválido.");
}

//Validando celular:
if(!$validador->validarTelefone($cadastro->getTelefone())){
    array_push($_SESSION['erros'], "Telefone inválido.");
}
//Tela de erro
if (!empty($_SESSION['erros'][0])) {
    $_SESSION['tituloErro'] = "Por favor, ative o JavaScript";
    header("Location: ../index.php?pagina=erro");
    die();
}

if(is_string($cadastro->cadastrar($cadastro))){
    $erro = $cadastro->cadastrar($cadastro);
    echo $erro;
    if(strpos($erro,"(email)")){
        array_push($_SESSION['erros'], "Este e-mail já está cadastrado.");
    }else{
        array_push($_SESSION['erros'], "Este CPF já está cadastrado.");
    }
    $_SESSION['tituloErro'] = "Desculpe, ocorreu um erro:";
    header("Location: ../index.php?pagina=login&login=1");
    die();
}
echo "<pre>";
$cadastro = $cadastro->recuperarIdUsuario($cadastro);
$_SESSION['logado'] = serialize($cadastro);
header("location: ../dashboard.php");
