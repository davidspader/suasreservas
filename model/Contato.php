<?php
include_once 'ConexaoDB.php';
class Contato extends ConexaoDB{

    protected $nome;
    protected $email;
    protected $assunto;
    protected $mensagem;

    public function __construct($nome, $email, $assunto, $mensagem)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->assunto = $assunto;
        $this->mensagem = $mensagem;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->email;
    }
    public function getAssunto(){
        return $this->assunto;
    }

    public function getMensagem(){
        return $this->mensagem;
    }



    public function salvarContato(Contato $contato){
        $pdo = new PDO($this->getConexao());
        //$sql = "insert into contato(nome,email,assunto,mensagem) values (:nome,:email,:assunto,:mensagem)";
        $insert=$pdo->prepare("insert into contato(nome,email,assunto,mensagem) values (:nome,:email,:assunto,:mensagem)");

        $insert->bindValue(":nome",$contato->getNome());
        $insert->bindValue(":email",$contato->getEmail());
        $insert->bindValue(":assunto",$contato->getAssunto());
        $insert->bindValue(":mensagem",$contato->getMensagem());
        if($insert->execute()){
            return true;
        }else{
            $erro = $insert->errorInfo()[2];
            echo $erro;
        }
    }
}