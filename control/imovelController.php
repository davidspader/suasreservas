<?php

session_start();
include_once '../model/Apartamento.php';
include_once '../model/Usuario.php';
include_once '../model/Validacao.php';

$_SESSION['erros'] = array();

if (isset($_REQUEST['req'])) {
    if ($_REQUEST['req'] == 'cadastrarImovel' || $_REQUEST['req'] == 'editarImovel') {
        if (filter_input(INPUT_POST, 'validacao') == "validacao") {
            $validador = new Validacao();
            $id_usuario = unserialize($_SESSION['logado'])->getId();
            $identificacao = filter_input(INPUT_POST, 'identificacaoImovel');
            $cep = filter_input(INPUT_POST, 'cepImovel');
            $siglaEstado = filter_input(INPUT_POST, 'estadoImovel');
            $logradouro = filter_input(INPUT_POST, 'logradouroImovel');
            $cidade = filter_input(INPUT_POST, 'cidadeImovel');
            $bairro = filter_input(INPUT_POST, 'bairroImovel');
            $numero = filter_input(INPUT_POST, 'numeroImovel');

            $tipo = filter_input(INPUT_POST, 'tipoImovel');

            if ($identificacao == null) {
                array_push($_SESSION['erros'], "O campo identificação é obrigatório.");
            }

            if ($cep != null) {
                if (!$validador->validarCep($cep)) {
                    array_push($_SESSION['erros'], "CEP inválido.");
                }
            }

            if ($siglaEstado != null) {
                if (!$validador->validarEstado($siglaEstado)) {
                    array_push($_SESSION['erros'], "Sigla inválida.");
                }
            }
            if ($logradouro != null) {
                if (!$validador->verificarTamanhoMinimoString($logradouro, 1)) {
                    array_push($_SESSION['erros'], "Rua inválida.");
                }
            }
            if ($bairro != null) {
                if (!$validador->verificarTamanhoMinimoString($bairro, 1)) {
                    array_push($_SESSION['erros'], "Bairro inválida.");
                }
            }
            if ($cidade != null) {
                if (!$validador->verificarTamanhoMinimoString($cidade, 1)) {
                    array_push($_SESSION['erros'], "Cidade inválida.");
                }
            }
            if ($numero != null) {
                if (!is_numeric($numero)) {
                    array_push($_SESSION['erros'], "Número inválido.");
                }
            } else {
                $numero = null;
            }

            if ($tipo == 2) {
                $edificio = filter_input(INPUT_POST, 'edificioImovel');
                $bloco = filter_input(INPUT_POST, 'blocoImovel');
                $numeroAp = filter_input(INPUT_POST, 'numeroApImovel');

                if ($edificio != null) {
                    if (!$validador->verificarTamanhoMinimoString($edificio, 1)) {
                        array_push($_SESSION['erros'], "Edificio inválido.");
                    }
                }

                if ($bloco != null) {
                    if (!$validador->verificarTamanhoMinimoString($bloco, 0)) {
                        array_push($_SESSION['erros'], "Bloco inválido.");
                    }
                }

                if ($numeroAp != null) {
                    if (!is_numeric($numeroAp)) {
                        array_push($_SESSION['erros'], "Número do apartamento inválido.");
                    }
                } else {
                    $numeroAp = null;
                }

                $imovel = new Apartamento(0, $identificacao, $cep, $siglaEstado, $cidade, $bairro, $logradouro, $numero, $id_usuario, $edificio, $bloco, $numeroAp);
            } elseif ($tipo == 1) {
                $imovel = new Imovel(0, $identificacao, $cep, $siglaEstado, $cidade, $bairro, $logradouro, $numero, $id_usuario);
            } else {
                array_push($_SESSION['erros'], "Tipo de imóvel inválido.");
            }

            if (!empty($_SESSION['erros'][0])) {
                $_SESSION['tituloErro'] = "Erros ocorreram no seu formulário!";
                header("Location: ../dashboard.php?pagina=imoveis");
                die();
            }
        } else {
            $_SESSION['tituloErro'] = "Erros ocorreram no seu formulário!";
            array_push($_SESSION['erros'], "Houve um erro na válidação.");
            header("Location: ../dashboard.php?pagina=imoveis");
            die();
        }
    }

    $req = $_REQUEST['req'];

    switch ($req) {
        case "cadastrarImovel":
            if ($tipo == 1) {
                $imovel->cadastrarImovel($imovel, $tipo);
            } else {
                $imovel->cadastrarApartamento($imovel, $tipo);
            }
            $_SESSION['feedback'] = "Imóvel cadastrado com sucesso!";
            header("Location: ../dashboard.php?pagina=imoveis");
            break;

        case "excluir":
            $id = filter_input(INPUT_GET, 'id');
            $id_usuario = unserialize($_SESSION['logado'])->getId();
            $imovel = new Imovel(null, null, null, null, null, null, null, null, null);
            if ($imovel->excluirImovel($id, $id_usuario)) {
                $_SESSION['feedback'] = "Imóvel excluido com sucesso!";
                header("Location: ../dashboard.php?pagina=imoveis");
                break;
            }
            $_SESSION['tituloErro'] = "Erro de banco!";
            array_push($_SESSION['erros'], "Este imóvel tem reservas cadastradas.");
            header("Location: ../dashboard.php?pagina=imoveis");
            break;
        case "editarImovel":
            $id = filter_input(INPUT_POST, 'idImovel');
            if ($tipo == 1) {
                $imovel->editarImovel($id,$tipo,$imovel);
            } else {
                $imovel->editarApartamento($id,$tipo,$imovel);
            }
            $_SESSION['feedback'] = "Imóvel editado com sucesso!";
            header("Location: ../dashboard.php?pagina=imoveis");
            break;
    }
} else {
    header("Location: ../dashboard.php");
}