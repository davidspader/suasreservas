<?php
include_once 'Pessoa.php';
class Usuario extends Pessoa {
    
    private $senha;
    
    function getSenha() {
        return $this->senha;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }
    
    function __construct($id, $nome, $email, $cpf, $telefone,$senha) {
        parent::__construct($id, $nome, $email, $cpf, $telefone);
        $this->setSenha($senha);
    }

    public function cadastrar(Pessoa $usuario) {
        $pdo = new PDO($this->getConexao());
        $sql = "insert into usuario(nome,email,cpf,telefone,senha) values (:nome,:email,:cpf,:telefone,:senha)";
        $consulta=$pdo->prepare($sql);

        $consulta->bindValue(":nome",$usuario->getNome());
        $consulta->bindValue(":email",$usuario->getEmail());
        $consulta->bindValue(":cpf",$usuario->getCpf());
        $consulta->bindValue(":telefone",$usuario->getTelefone());
        $consulta->bindValue(":senha",$usuario->getSenha());
        if($consulta->execute()){
            return true;
        }else{
            $erro = $consulta->errorInfo()[2];
            return $erro;
        }
    }

    
    public function recuperarIdUsuario(Pessoa $usuario){
        $pdo = new PDO($this->getConexao());
        $sql = "select id from usuario where email = :email";
        $consulta=$pdo->prepare($sql);
        $consulta->bindValue(":email",$usuario->getEmail());
        $consulta->execute();
        foreach ($consulta as $id){
            $usuario->setId($id['id']);
        }
        return $usuario;
    }
    
    public function logar($email,$senha){
        $pdo = new PDO($this->getConexao());
        $consulta=$pdo->prepare("SELECT * FROM usuario;");
        $consulta->execute();
        while ($usuario = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($email == $usuario['email'] and $senha == $usuario['senha']){
                $id = $usuario['id'];
                $nome = $usuario['nome'];
                $email = $usuario['email'];
                $cpf = $usuario['cpf'];
                $telefone = $usuario['telefone'];
                $senha = $usuario['senha'];
                return $login = new Usuario($id, $nome, $email, $cpf, $telefone, $senha);
            }
        }
        return false;
    }
    public function verificarEmailCpf($email,$cpf){
        $pdo = new PDO($this->getConexao());
        $sql = "select email,cpf from usuario where email = :email and cpf = :cpf";
        $consulta=$pdo->prepare($sql);
        $consulta->bindValue(":email",$email);
        $consulta->bindValue(":cpf",$cpf);
        $consulta->execute();
        foreach ($consulta as $usuario){
            return true;
        }
        return false;
    }
    public function alterarSenha($senha,$email,$cpf){
        $pdo = new PDO($this->getConexao());
        $sql = "UPDATE usuario set senha = :senha where email = :email and cpf = :cpf;";
        $consulta=$pdo->prepare($sql);
        $consulta->bindValue(":senha",$senha);
        $consulta->bindValue(":email",$email);
        $consulta->bindValue(":cpf",$cpf);
        if($consulta->execute()){
            return true;
        }
        else{
            return false;
        }
    }

}
