<?php
include_once 'Pessoa.php';
include_once 'Validacao.php';
class IntermediadorFisico extends Pessoa{
    private $telefoneFixo;
    private $usuario;
    
    function getUsuario() {
        return $this->usuario;
    }

        function getTelefoneFixo() {
        return $this->telefoneFixo;
    }

    function __construct($id, $nome, $email, $cpf, $telefone,$telefoneFixo,$usuario) {
        parent::__construct($id, $nome, $email, $cpf, $telefone);
        $this->telefoneFixo = $telefoneFixo;
        $this->usuario = $usuario;
    }
    
    public function cadastrarIntermediadorFisico(IntermediadorFisico $intermediador, $tipo) {
        $pdo = new PDO($this->getConexao());
        $sql = "insert into intermediador(id_usuario,nome,email,cpf,telefone,telefone_fixo,tipo_intermediador) values (:id_usuario,:nome,:email,:cpf,:telefone,:telefone_fixo,:tipo_intermediador)";
        $consulta=$pdo->prepare($sql);

        $consulta->bindValue(":tipo_intermediador",$tipo);
        $consulta->bindValue(":nome",$intermediador->getNome());
        $consulta->bindValue(":id_usuario",$intermediador->getUsuario());
        $consulta->bindValue(":email",$intermediador->getEmail());
        $consulta->bindValue(":cpf",$intermediador->getCpf());
        $consulta->bindValue(":telefone",$intermediador->getTelefone());
        $consulta->bindValue(":telefone_fixo",$intermediador->getTelefoneFixo());
        if($consulta->execute()){
            return true;
        }else{
            $erro = $consulta->errorInfo()[2];
            return $erro;
        }
    }
    
    public function editarIntermediadorFisico($id,$tipo, IntermediadorFisico $i){
        $pdo = new PDO($this->getConexao());
        $sql = "update intermediador set nome= :nome, tipo_intermediador= :tipo_intermediador, email= :email, cpf= :cpf, telefone= :telefone, telefone_fixo= :telefone_fixo where id= :id and id_usuario = :id_usuario;";
        $insert = $pdo->prepare($sql);
        $insert->bindValue(":id",$id);
        $insert->bindValue(":id_usuario",$i->getUsuario());
        $insert->bindValue(":nome",$i->getNome());
        $insert->bindValue(":tipo_intermediador",$tipo);
        $insert->bindValue(":email",$i->getEmail());
        $insert->bindValue(":cpf",$i->getCpf());
        $insert->bindValue(":telefone",$i->getTelefone());
        $insert->bindValue(":telefone_fixo",$i->getTelefoneFixo());
        $insert->execute();
    }
    
    
}
