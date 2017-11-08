<?php

session_start();
include_once '../model/Usuario.php';
include_once '../model/Reserva.php';
include_once '../model/Contrato.php';
include_once '../model/Locatario.php';
include_once '../model/Validacao.php';

$_SESSION['erros'] = array();

if (isset($_REQUEST['req'])) {
    if ($_REQUEST['req'] == "criarContrato") {

        $id = $_POST['id'];
        $id_usuario = unserialize($_SESSION['logado'])->getId();

        $l = new Locatario(null, $_POST['nomeLocatario'], $_POST['emailLocatario'], $_POST['cpfLocatario'], $_POST['telefoneCelularLocatario'], $_POST['telefoneFixoLocatario']);
        $_SESSION['erros'] = $l->ValidarPessoaFisica($l);

        if (!empty($_SESSION['erros'][0])) {
            $_SESSION['tituloErro'] = "Erro de validação!";
            header("Location: ../dashboard.php");
            die();
        }

        $_SESSION['contrato'] = array();

        $locador = Contrato::montarStringPessoaFisica(unserialize($_SESSION['logado']), "LOCADOR");
        array_push($_SESSION['contrato'], $locador);
        
        $locatario = Contrato::montarStringPessoaFisica($l, "LOCATÁRIO");
        array_push($_SESSION['contrato'], $locatario);

        $r = Contrato::selecionarReservaImovel($id, $id_usuario);

        if ($r->getIntermediador() != null) {
            $r->setIntermediador(Contrato::selecionarIntermediador($r->getIntermediador(), $id_usuario));
            $intermediador = Contrato::montarStringIntermediador($r);
        } else {
            $intermediador = "";
        }
        array_push($_SESSION['contrato'], $intermediador);

        $imovel = Contrato::montarStringImovel($r);
        array_push($_SESSION['contrato'], $imovel);

        $qtdDias = Validacao::verificaQuantidadeDias($r->getDataInicial(), $r->getDataFinal());
        $valorTotal = number_format($qtdDias*$r->getPrecoDiaria()+$r->getTaxaLimpeza()-$r->getDesconto(), 2, ',', '.');
        $reserva = Contrato::montarStringReserva($r,$valorTotal,$qtdDias);
        array_push($_SESSION['contrato'], $reserva);
        
        $_SESSION['feedback'] = "Contrato criado com sucesso!<br>O seu navegador irá abrir uma nova guia.";
        header("Location: ../dashboard.php");
    }
}
