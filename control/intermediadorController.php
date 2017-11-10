<?php
session_start();
include_once '../model/IntermediadorFisico.php';
include_once '../model/IntermediadorJuridico.php';
include_once '../model/Usuario.php';


$_SESSION['erros'] = array();

if (isset($_REQUEST['req'])) {
    if($_REQUEST['req'] == 'cadastrarIntermediador' || $_REQUEST['req'] == 'editarIntermediador'){
        if(filter_input(INPUT_POST, 'validacao') == "validacao"){
            if($_POST['tipoIntermediador'] != 1 && $_POST['tipoIntermediador'] != 2){
                $_SESSION['tituloErro'] = "Erros ocorreram no seu formulário!";
                array_push($_SESSION['erros'], "Houve um erro na válidação.");
                header("Location: ../dashboard.php?pagina=intermediadores");
                die();
            }
            
            $usuario = unserialize($_SESSION['logado'])->getId();

            if($_POST['tipoIntermediador'] == 1){
                $intermediador = new IntermediadorFisico(null, $_POST['nomeIntermediador'],$_POST['emailIntermediador'],$_POST['cpfIntermediador'],$_POST['telefoneCelularIntermediador'],$_POST['telefoneFixoIntermediador'],$usuario);

                $_SESSION['erros'] = $intermediador->ValidarPessoaFisica($intermediador);
                
            }else{
                $intermediador = new IntermediadorJuridico(0, $_POST['nomeIntermediador'], $_POST['emailIntermediador'], null, $_POST['telefoneCelularIntermediador'], $_POST['telefoneFixoIntermediador'], $_POST['cnpjIntermediador'], $usuario);
                $_SESSION['erros'] = $intermediador->ValidarIntermediadorJuridico($intermediador);
            }
            
            if(!empty($_SESSION['erros'][0])){
                $_SESSION['tituloErro'] = "Erro de validação!";
                header("Location: ../dashboard.php?pagina=intermediadores");
                die();
            }
        }else{
            $_SESSION['tituloErro'] = "Erros ocorreram no seu formulário!";
            array_push($_SESSION['erros'], "Houve um erro na válidação.");
            header("Location: ../dashboard.php?pagina=intermediadores");
            die();
        }
    }
    
    $req = $_REQUEST['req'];

    switch ($req) {
        case "cadastrarIntermediador":
            $tipo = $_POST['tipoIntermediador'];
            if($tipo == 1){
                $intermediador->cadastrarIntermediadorFisico($intermediador, $tipo);
            }else{
                $intermediador->cadastrarIntermediadorJuridico($intermediador, $tipo);
            }
            $_SESSION['feedback'] = "Intermediador cadastrado com sucesso!";
            header("Location: ../dashboard.php?pagina=intermediadores");
            break;
        case "excluir":
            $id = filter_input(INPUT_GET, 'id');
            $id_usuario = unserialize($_SESSION['logado'])->getId();
            if (IntermediadorJuridico::excluirIntermediador($id, $id_usuario)) {
                $_SESSION['feedback'] = "Intermediador excluido com sucesso!";
                header("Location: ../dashboard.php?pagina=intermediadores");
                break;
            }
            $_SESSION['tituloErro'] = "Erro de banco!";
            array_push($_SESSION['erros'], "Este intermediador tem reservas cadastradas.");
            header("Location: ../dashboard.php?pagina=intermediadores");
            break;
        case "editarIntermediador":
            $tipo = $_POST['tipoIntermediador'];
            $id = filter_input(INPUT_POST, 'idIntermediador');
            if ($tipo == 1) {
                $intermediador->editarIntermediadorFisico($id, $tipo, $intermediador);
            } else {
                $intermediador->editarIntermediadorJuridico($id, $tipo, $intermediador);
            }
            $_SESSION['feedback'] = "Intermediador editado com sucesso!";
            header("Location: ../dashboard.php?pagina=intermediadores");
            break;
    }
}