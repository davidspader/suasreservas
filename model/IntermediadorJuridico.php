<?php

class IntermediadorJuridico extends Pessoa{
    private $telefoneFixo;
    private $cnpj;
    private $usuario;
    
    function getUsuario() {
        return $this->usuario;
    }

        function getTelefoneFixo() {
        return $this->telefoneFixo;
    }

    function getCnpj() {
        return $this->cnpj;
    }

    function __construct($id, $nome, $email, $cpf, $telefone,$telefoneFixo, $cnpj,$usuario) {
        parent::__construct($id, $nome, $email, $cpf, $telefone);
        $this->telefoneFixo = $telefoneFixo;
        $this->cnpj = $cnpj;
        $this->usuario = $usuario;
    }
    
    public function cadastrarIntermediadorJuridico(IntermediadorJuridico $intermediador, $tipo) {
        $pdo = new PDO($this->getConexao());
        $sql = "insert into intermediador(id_usuario,nome,email,cnpj,telefone,telefone_fixo,tipo_intermediador) values (:id_usuario,:nome,:email,:cnpj,:telefone,:telefone_fixo,:tipo_intermediador)";
        $consulta=$pdo->prepare($sql);

        $consulta->bindValue(":tipo_intermediador",$tipo);
        $consulta->bindValue(":nome",$intermediador->getNome());
        $consulta->bindValue(":id_usuario",$intermediador->getUsuario());
        $consulta->bindValue(":email",$intermediador->getEmail());
        $consulta->bindValue(":cnpj",$intermediador->getCnpj());
        $consulta->bindValue(":telefone",$intermediador->getTelefone());
        $consulta->bindValue(":telefone_fixo",$intermediador->getTelefoneFixo());
        if($consulta->execute()){
            return true;
        }else{
            $erro = $consulta->errorInfo()[2];
            return $erro;
        }
    }
    
    public static function listarIntermediador($id){
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = "select * from intermediador where id_usuario = :id";
        $select = $pdo->prepare($sql);
        $select->bindValue(":id", $id);
        $select->execute();
        
        $intermediadores = array();
        
        foreach ($select as $i) {
            $intermediador = new IntermediadorJuridico($i['id'], $i['nome'], $i['email'], $i['cpf'], $i['telefone'], $i['telefone_fixo'], $i['cnpj'], $i['id_usuario']);
            $intermediador->tipo = $i['tipo_intermediador'];
            array_push($intermediadores, $intermediador);
        }
        return $intermediadores;
    }
    
    public static function excluirIntermediador($id,$id_usuario){
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = 'DELETE FROM intermediador WHERE id = :id and id_usuario = :id_usuario';
        $delete=$pdo->prepare($sql);
        
        $delete->bindValue(":id", $id);
        $delete->bindValue(":id_usuario", $id_usuario);
        if($delete->execute()){
            return true;
        }
        return false;
        
    }
    
    public static function intermediadorDetalhe($id,$tipo,$id_usuario){
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = "select * from intermediador where id_usuario = :id_usuario and id = :id and tipo_intermediador = :tipo_intermediador;";
        $select = $pdo->prepare($sql);
        $select->bindValue(':id_usuario', $id_usuario);
        $select->bindValue(':id', $id);
        $select->bindValue(':tipo_intermediador', $tipo);
        $select->execute();
        
        foreach ($select as $i) {
            $intermediador = new IntermediadorJuridico($i['id'], $i['nome'], $i['email'], $i['cpf'], $i['telefone'], $i['telefone_fixo'], $i['cnpj'], $i['id_usuario']);
            $intermediador->tipo = $i['tipo_intermediador'];
            return $intermediador;
        }
    }
    
    public function editarIntermediadorJuridico($id,$tipo, IntermediadorJuridico $i){
        $pdo = new PDO($this->getConexao());
        $sql = "update intermediador set nome= :nome, tipo_intermediador= :tipo_intermediador, email= :email, cnpj= :cnpj, telefone= :telefone, telefone_fixo= :telefone_fixo where id= :id and id_usuario = :id_usuario;";
        $insert = $pdo->prepare($sql);
        $insert->bindValue(":id",$id);
        $insert->bindValue(":id_usuario",$i->getUsuario());
        $insert->bindValue(":nome",$i->getNome());
        $insert->bindValue(":tipo_intermediador",$tipo);
        $insert->bindValue(":email",$i->getEmail());
        $insert->bindValue(":cnpj",$i->getCnpj());
        $insert->bindValue(":telefone",$i->getTelefone());
        $insert->bindValue(":telefone_fixo",$i->getTelefoneFixo());
        $insert->execute();
    }
    
    function ValidarIntermediadorJuridico(IntermediadorJuridico $i){
        $erros = array();
        if($i->getNome() == null){
            array_push($erros, "O campo nome é obrigatório.");
        }
        if($i->getCnpj() != null){
            if(!Validacao::validarCnpj($i->getCnpj())){
                array_push($erros, "CNPJ inválido.");
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
