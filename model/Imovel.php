<?php
include_once 'ConexaoDB.php';
class Imovel extends ConexaoDB{
    private $id;
    private $identificacao;
    private $cep;
    private $siglaEstado;
    private $cidade;
    private $bairro;
    private $logradouro;
    private $numero;
    private $usuario;
    
    function __construct($id, $identificacao, $cep, $siglaEstado, $cidade, $bairro, $logradouro, $numero, $usuario) {
        $this->id = $id;
        $this->identificacao = $identificacao;
        $this->cep = $cep;
        $this->siglaEstado = $siglaEstado;
        $this->cidade = $cidade;
        $this->bairro = $bairro;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->usuario = $usuario;
    }

    function getId() {
        return $this->id;
    }

    function getIdentificacao() {
        return $this->identificacao;
    }

    function getCep() {
        return $this->cep;
    }

    function getSiglaEstado() {
        return $this->siglaEstado;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getNumero() {
        return $this->numero;
    }

    function getUsuario() {
        return $this->usuario;
    }
    
    function getCidade() {
        return $this->cidade;
    }
    
    function getBairro() {
        return $this->bairro;
    }

    public function cadastrarImovel(Imovel $imovel, $tipo) {
        $pdo = new PDO($this->getConexao());
        $sql = "insert into imovel(id_usuario,identificacao,tipo_imovel,cep,sigla_estado,cidade,bairro,rua,numero) values (:id_usuario,:identificacao,:tipo_imovel,:cep,:sigla_estado,:cidade,:bairro,:rua,:numero)";
        $insert=$pdo->prepare($sql);

        $insert->bindValue(":id_usuario",$imovel->getUsuario());
        $insert->bindValue(":identificacao",$imovel->getIdentificacao());
        $insert->bindValue(":tipo_imovel",$tipo);
        $insert->bindValue(":cep",$imovel->getCep());
        $insert->bindValue(":sigla_estado",$imovel->getSiglaEstado());
        $insert->bindValue(":cidade",$imovel->getCidade());
        $insert->bindValue(":bairro",$imovel->getBairro());
        $insert->bindValue(":rua",$imovel->getLogradouro());
        $insert->bindValue(":numero",$imovel->getNumero());
        if($insert->execute()){
            return true;
        }
        return false;
    }
    
    public function excluirImovel($id,$id_usuario){
        $pdo = new PDO($this->getConexao());
        $sql = 'DELETE FROM imovel WHERE id = :id and id_usuario = :id_usuario';
        $delete=$pdo->prepare($sql);
        
        $delete->bindValue(":id", $id);
        $delete->bindValue(":id_usuario", $id_usuario);
        if($delete->execute()){
            return true;
        }
        return false;
        
    }
    
    public function editarImovel($id,$tipo, Imovel $imovel){
        $pdo = new PDO($this->getConexao());
        $sql = "update imovel set identificacao= :identificacao, tipo_imovel= :tipo_imovel, cep= :cep, sigla_estado= :sigla_estado, cidade= :cidade, bairro= :bairro, rua= :rua, numero= :numero where id= :id and id_usuario = :id_usuario;";
        $insert = $pdo->prepare($sql);
        $insert->bindValue(":id",$id);
        $insert->bindValue(":id_usuario",$imovel->getUsuario());
        $insert->bindValue(":identificacao",$imovel->getIdentificacao());
        $insert->bindValue(":tipo_imovel",$tipo);
        $insert->bindValue(":cep",$imovel->getCep());
        $insert->bindValue(":sigla_estado",$imovel->getSiglaEstado());
        $insert->bindValue(":cidade",$imovel->getCidade());
        $insert->bindValue(":bairro",$imovel->getBairro());
        $insert->bindValue(":rua",$imovel->getLogradouro());
        $insert->bindValue(":numero",$imovel->getNumero());
        $insert->execute();
    }
}
