<?php

class Validacao {

    public function verificarTamanhoMaximoString($string, $tamanho) {
        if (isset($string[$tamanho])) {
            return false;
        }
        return true;
    }

    public function verificarTamanhoMinimoString($string, $tamanho) {
        if (isset($string[$tamanho])) {
            return true;
        }
        return false;
    }

    static function validarTelefone($telefone) {
        if (preg_match('/^(?:(?:\+|00)?(55)\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/', $telefone) > 0) {
            return true;
        }
        return false;
    }

    static function validarCPF($cpf) {
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }

    function validarEstado($sigla) {
        $url = "../js/estados.json";
        $json = file_get_contents($url);
        $obj = json_decode($json);
        foreach ($obj->UF as $e) {
            if ($sigla == $e->sigla) {
                return true;
            }
        }
        return false;
    }

    function validarCep($cep) {
        if (strlen($cep) != 9) {
            return false;
        }
        $url = "https://viacep.com.br/ws/$cep/json/";
        $json = file_get_contents($url);
        $obj = json_decode($json);
        if (isset($obj->erro)) {
            return false;
        }
        return true;
    }

    static function encontraNumeros($string) {
        return (filter_var($string, FILTER_SANITIZE_NUMBER_INT) === '' ? false : true);
    }

    static function validarCnpj($cnpj) {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    static function validarData($data) {
        $data = explode("/", "$data");
        $d = $data[0];
        $m = $data[1];
        $y = $data[2];

        $res = checkdate($m, $d, $y);
        if ($res == 1) {
            return true;
        }
        return false;
    }

    static function verificarMaiorData($data1, $data2) {
        $data1 = str_replace("/", "-", $data1);
        $data2 = str_replace("/", "-", $data2);

        if (strtotime($data1) > strtotime($data2)) {
            return false;
        }
        return true;
    }

    static function verificarInteiro($inteiro) {
        if (!preg_match('/^[0-9][0-9]*$/', $inteiro)) {
            return false;
        }
        return true;
    }
    
    function transformarEmFloat($get_valor) { 
        $numero = str_replace(".", "", $get_valor);
        $numero = str_replace(",", ".", $numero);
        return $numero;
    }
    
    static function transformaDataEmTimestamp($data, $tipo){
        if($tipo == 0){
            $data = explode("/", $data);
            $data = $data[2]."-".$data[1]."-".$data[0]." 14:00:00";
        }elseif($tipo == 1){
            $data = explode("/", $data);
            $data = $data[2]."-".$data[1]."-".$data[0]." 10:00:00";
        }else{
            $data = explode("/", $data);
            $data = $data[2]."-".$data[1]."-".$data[0];
        }
        return $data;
    }
    
    static function transformaTimestampEmData($data){
        $data = explode(" ", $data);
        $data = $data[0];
        $data = explode("-", $data);
        $data = $data[2]."/".$data[1]."/".$data[0];
        return $data;
    }
    
    static function verificaQuantidadeDias($inicial,$final){
        $inicial = explode(" ", $inicial);
        $final = explode(" ", $final);
        
        $inicial = new DateTime($inicial[0]);
        $final = new DateTime($final[0]);
        
        $qtdDias = $inicial->diff($final);
        
        return $qtdDias->days;
    }
    
}
