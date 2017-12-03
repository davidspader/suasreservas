<?php
session_start();
include_once '../model/Usuario.php';
include_once '../model/Reserva.php';

$_SESSION['erros'] = array();

if (isset($_REQUEST['req'])) {
    if($_REQUEST['req'] == 'cadastrarReserva' || $_REQUEST['req'] == 'editarReserva'){
        if(filter_input(INPUT_POST, 'validacao') == "validacao"){
            
            $usuario = unserialize($_SESSION['logado'])->getId();
            
            if(isset($_POST['id'])){
                $id = $_POST['id'];
            }else{
                $id = null;
            }
            
            $r = new Reserva($id, $usuario, $_POST['dataInicial'], $_POST['dataFinal'], $_POST['imovel'], $_POST['intermediador'], $_POST['porcentagemIntermediador'], $_POST['precoDiaria'], $_POST['taxaLimpeza'], $_POST['desconto'],$_POST['nomeLocatario'],$_POST['totalDepositado']);
            $retorno = $r->validarReserva($r);
            $reserva = unserialize($retorno['obj']);
            $_SESSION['erros'] = $retorno['erros'];
            if(!empty($_SESSION['erros'][0])){
                $_SESSION['tituloErro'] = "Erro de validação!";
                header("Location: ../dashboard.php?pagina=reservas");
                die();
            }
            
        }else{
            $_SESSION['tituloErro'] = "Erros ocorreram no seu formulário!";
            array_push($_SESSION['erros'], "Houve um erro na válidação.");
            header("Location: ../dashboard.php?pagina=reservas");
            die();
        }
    }
    
    $req = $_REQUEST['req'];
    
    switch ($req) {
        case "cadastrarReserva":
            if($r->verificarDataMarcada($r->getUsuario(), $r->getDataInicial(), $r->getDataFinal(), $r->getImovel(),$r->getId())){
                $reserva->cadastrarReserva($reserva);
                $id_imovel = $reserva->getImovel();
                $_SESSION['feedback'] = "Reserva cadastrada com sucesso!";
                header("Location: ../dashboard.php?pagina=reservas&idImovel=$id_imovel");
                break;
            }
            $_SESSION['erros'][0] = "O imóvel já está ocupado nesse período.";
            $_SESSION['tituloErro'] = "Erro de validação!";
            header("Location: ../dashboard.php?pagina=reservas");
            break;
            
        case "excluirReserva":
            $id = filter_input(INPUT_GET, 'id');
            $id_imovel = filter_input(INPUT_GET, 'id_imovel');
            $id_usuario = unserialize($_SESSION['logado'])->getId();
            if (Reserva::excluirReserva($id, $id_usuario)) {
                $_SESSION['feedback'] = "Reserva excluida com sucesso!";
                header("Location: ../dashboard.php?pagina=reservas&idImovel=$id_imovel");
            }
            break;
        
        case "editarReserva":
            if($r->verificarDataMarcada($r->getUsuario(), $r->getDataInicial(), $r->getDataFinal(), $r->getImovel(),$r->getId())){
                $reserva->editarReserva($reserva);
                $id_imovel = $reserva->getImovel();
                $_SESSION['feedback'] = "Reserva editada com sucesso!";
                header("Location: ../dashboard.php?pagina=reservas&idImovel=$id_imovel");
                break;
            }
            $_SESSION['erros'][0] = "O imóvel já está ocupado nesse período.";
            $_SESSION['tituloErro'] = "Erro de validação!";
            header("Location: ../dashboard.php?pagina=reservas");
            break;
    }
}
