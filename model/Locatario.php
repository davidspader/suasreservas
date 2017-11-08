<?php
include_once 'Pessoa.php';
class Locatario extends Pessoa{
    private $telefoneFixo;
    
    function getTelefoneFixo() {
        return $this->telefoneFixo;
    }

    function setTelefoneFixo($telefoneFixo) {
        $this->telefoneFixo = $telefoneFixo;
    }

    function __construct($id, $nome, $email, $cpf, $telefone,$telefoneFixo) {
        parent::__construct($id, $nome, $email, $cpf, $telefone);
        $this->telefoneFixo = $telefoneFixo;
    }

}
