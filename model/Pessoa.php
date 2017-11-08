<?php
include_once 'ConexaoDB.php';
abstract class Pessoa extends ConexaoDB{
    
    protected $id;
    protected $nome;
    protected $email;
    protected $cpf;
    protected $telefone;
    
    public function __construct($id, $nome, $email, $cpf, $telefone) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getTelefone() {
        return $this->telefone;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function ValidarPessoaFisica(Pessoa $i){
        $erros = array();
        if($i->getNome() == null){
            array_push($erros, "O campo nome é obrigatório.");
        }
        if($i->getCpf() != null){
            if(!Validacao::validarCPF($i->getCpf())){
                array_push($erros, "CPF inválido.");
            }
        }
        if($i->getEmail() != null){
            if(!filter_var($i->getEmail(), FILTER_VALIDATE_EMAIL)){
                array_push($erros, "E-mail inválido.");
            }
        }
        if($i->getTelefone() != null){
            if(!Validacao::validarTelefone($i->getTelefone())){
                array_push($erros, "Telefone celular inválido.");
            }
        }
        if($i->getTelefoneFixo() != null){
            if(!Validacao::validarTelefone($i->getTelefoneFixo())){
                array_push($erros, "Telefone fixo inválido.");
            }
        }
        return $erros;
    }
}
