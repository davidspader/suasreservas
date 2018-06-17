<?php

include_once 'ConexaoDB.php';
include_once 'Apartamento.php';
include_once 'Reserva.php';
include_once 'Pessoa.php';
include_once 'IntermediadorJuridico.php';

class Contrato {

    public static function selecionarReservaImovel($id, $id_usuario) {
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = "SELECT *
                FROM reserva 
                INNER JOIN imovel ON(reserva.id_imovel = imovel.id)
                where reserva.id_usuario = :id_usuario and reserva.id = :id";
        $select = $pdo->prepare($sql);
        $select->bindValue(":id", $id);
        $select->bindValue(":id_usuario", $id_usuario);
        $select->execute();

        foreach ($select as $r) {
            $imovel = new Apartamento($r['id'], $r['identificacao'], $r['cep'], $r['sigla_estado'], $r['cidade'], $r['bairro'], $r['rua'], $r['numero'], $r['id_usuario'], $r['edificio'], $r['bloco'], $r['numero_ap']);
            $imovel->tipo = $r['tipo_imovel'];
            $reserva = new Reserva($r['id'], $id_usuario, $r['data_inicial'], $r['data_final'], $imovel, $r['id_intermediador'], $r['porcentagem_intermediador'], $r['preco_diaria'], $r['taxa_limpeza'], $r['desconto'], $r['locatario'], $r['total_depositado']);
        }
        return $reserva;
    }

    public static function selecionarIntermediador($id, $id_usuario) {
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = "select * from intermediador where id_usuario = :id_usuario and id = :id;";
        $select = $pdo->prepare($sql);
        $select->bindValue(':id_usuario', $id_usuario);
        $select->bindValue(':id', $id);
        $select->execute();

        foreach ($select as $i) {
            $intermediador = new IntermediadorJuridico($i['id'], $i['nome'], $i['email'], $i['cpf'], $i['telefone'], $i['telefone_fixo'], $i['cnpj'], $i['id_usuario']);
            $intermediador->tipo = $i['tipo_intermediador'];
            return $intermediador;
        }
    }

    public static function montarStringIntermediador(Reserva $r) {
        $intermediador = "<p><strong>INTERMEDIADOR:</strong> " . $r->intermediador->getNome();
        if (Validacao::encontraNumeros($r->intermediador->getCpf())) {
            $intermediador = $intermediador . ", portador do CPF nº " . $r->intermediador->getCpf();
        }
        if (Validacao::encontraNumeros($r->intermediador->getCnpj())) {
            $intermediador = $intermediador . ", portador do CNPJ nº " . $r->intermediador->getCnpj();
        }
        if (filter_var($r->intermediador->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $intermediador = $intermediador . ", email: " . $r->intermediador->getEmail();
        }
        if (Validacao::encontraNumeros($r->intermediador->getTelefone())) {
            $intermediador = $intermediador . ", telefone celular " . $r->intermediador->getTelefone();
        }
        if (Validacao::encontraNumeros($r->intermediador->getTelefoneFixo())) {
            $intermediador = $intermediador . ", telefone fixo " . $r->intermediador->getTelefoneFixo();
        }
        if (Validacao::encontraNumeros($r->getPorcentagemIntermediador())) {
            $intermediador = $intermediador . " e porcentagem de " . $r->getPorcentagemIntermediador() . "% na locação";
        }
        return $intermediador = $intermediador . ".</p>";
    }
    
    public static function montarStringPessoaFisica(Pessoa $r,$tipo) {
        $intermediador = "<p><strong>$tipo:</strong> " . $r->getNome();
        if ($r->getCpf() != null) {
            $intermediador = $intermediador . ", portador do CPF nº " . $r->getCpf();
        }
        if ($r->getEmail() != null) {
            $intermediador = $intermediador . ", email: " . $r->getEmail();
        }
        if ($r->getTelefone() != null) {
            $intermediador = $intermediador . ", telefone celular " . $r->getTelefone();
        }
        if ($tipo == "LOCATÁRIO" && $r->getTelefoneFixo() != null) {
            $intermediador = $intermediador . ", telefone fixo " . $r->getTelefoneFixo();
        }
        return $intermediador = $intermediador . ".</p>";
    }
    
    public static function montarStringImovel(Reserva $r) {
        $c = 0;
        $imovel = "<p>O objeto deste contrato de locação é o imóvel residencial, situado à ";
        if ($r->imovel->getLogradouro() != null) {
            $imovel = $imovel . "rua " . $r->imovel->getLogradouro(); $c++;
        }
        if ($r->imovel->getNumero() != null) {
            $imovel = $imovel . ", número " . $r->imovel->getNumero();$c++;
        }
        if ($r->imovel->getBairro() != null) {
            $imovel = $imovel . ", bairro " . $r->imovel->getBairro();$c++;
        }
        if (Validacao::encontraNumeros($r->imovel->getCep())) {
            $imovel = $imovel . ", CEP " . $r->imovel->getCep();$c++;
        }
        if ($r->imovel->getCidade() != null) {
            $imovel = $imovel . ", cidade " . $r->imovel->getCidade();$c++;
        }
        if ($r->imovel->getSiglaEstado() != "  ") {
            $imovel = $imovel . ", " . $r->imovel->getSiglaEstado();$c++;
        }
        if ($r->imovel->getEdificio() != null) {
            $imovel = $imovel . ", edificio" . $r->imovel->getEdificio();$c++;
        }
        if ($r->imovel->getBloco() != null) {
            $imovel = $imovel . ", bloco" . $r->imovel->getBloco();$c++;
        }
        if ($r->imovel->getNumeroAp() != null) {
            $imovel = $imovel . ", número do apartamento" . $r->imovel->getNumeroAp();$c++;
        }
        if($c == 0){
            return $imovel = "<p>Imóvel não está devidamente identificado.</p>";
        }
        return $imovel = $imovel . ".</p>";
    }

    public static function montarStringReserva(Reserva $r,$valorTotal,$qtdDias) {
        $reserva = "<p>A locação inicia em ".Validacao::transformaTimestampEmData($r->getDataInicial())." as 14:00 horas com término em ".Validacao::transformaTimestampEmData($r->getDataFinal())." as 10:00 horas,com o total de $qtdDias diárias, pelo preço diário de R$ ".number_format($r->getPrecoDiaria(), 2, ',', '.').", taxa limpeza de
                R$ ".number_format($r->getTaxaLimpeza(), 2, ',', '.')." e com desconto de R$ ".number_format($r->getDesconto(), 2, ',', '.').".<br><strong>Formando o valor total de R$ $valorTotal.</strong></p>";
    
        return $reserva;
    }

}
