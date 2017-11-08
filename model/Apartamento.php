<?php
include_once 'Imovel.php';
class Apartamento extends Imovel{
    private $edificio;
    private $bloco;
    private $numeroAp;
    
    function __construct($id, $identificacao, $cep, $siglaEstado, $cidade, $bairro, $logradouro, $numero, $usuario,$edificio, $bloco, $numeroAp) {
        parent::__construct($id, $identificacao, $cep, $siglaEstado, $cidade, $bairro, $logradouro, $numero, $usuario);
        $this->edificio = $edificio;
        $this->bloco = $bloco;
        $this->numeroAp = $numeroAp;
    }

    
    function getEdificio() {
        return $this->edificio;
    }

    function getBloco() {
        return $this->bloco;
    }

    function getNumeroAp() {
        return $this->numeroAp;
    }
    
    public function cadastrarApartamento(Apartamento $imovel, $tipo) {
        $pdo = new PDO($this->getConexao());
        $sql = "insert into imovel(id_usuario,identificacao,tipo_imovel,cep,sigla_estado,cidade,bairro,rua,numero,edificio,bloco,numero_ap) values (:id_usuario,:identificacao,:tipo_imovel,:cep,:sigla_estado,:cidade,:bairro,:rua,:numero,:edificio,:bloco,:numero_ap)";
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
        $insert->bindValue(":edificio",$imovel->getEdificio());
        $insert->bindValue(":bloco",$imovel->getBloco());
        $insert->bindValue(":numero_ap",$imovel->getNumeroAp());
        if($insert->execute()){
            return true;
        }else{
            return $erro = $insert->errorInfo()[2];
        }
    }
    
    public static function listarImovel($id){
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = "select * from imovel where id_usuario = :id";
        $select = $pdo->prepare($sql);
        $select->bindValue(":id", $id);
        $select->execute();
        
        $imoveis = array();
        foreach ($select as $i) {
            $imovel = new Apartamento($i['id'], $i['identificacao'], $i['cep'], $i['sigla_estado'], $i['cidade'], $i['bairro'], $i['rua'], $i['numero'], $i['id_usuario'], $i['edificio'], $i['bloco'], $i['numero_ap']);
            $imovel->tipo = $i['tipo_imovel'];
            array_push($imoveis, $imovel);
        }
        return $imoveis;
    }
    
    public static function imovelDetalhe($id,$tipo,$id_usuario){
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = "select * from imovel where id_usuario = :id_usuario and id = :id and tipo_imovel = :tipo_imovel;";
        $select = $pdo->prepare($sql);
        $select->bindValue(':id_usuario', $id_usuario);
        $select->bindValue(':id', $id);
        $select->bindValue(':tipo_imovel', $tipo);
        $select->execute();
        
        foreach ($select as $i) {
            $imovel = new Apartamento($i['id'], $i['identificacao'], $i['cep'], $i['sigla_estado'], $i['cidade'], $i['bairro'], $i['rua'], $i['numero'], $i['id_usuario'], $i['edificio'], $i['bloco'], $i['numero_ap']);
            $imovel->tipo = $i['tipo_imovel'];
            return $imovel;
        }
    }
    
    public function editarApartamento($id,$tipo,Apartamento $imovel){
        $pdo = new PDO($this->getConexao());
        $sql = "update imovel set identificacao= :identificacao, tipo_imovel= :tipo_imovel, cep= :cep, sigla_estado= :sigla_estado, cidade= :cidade, bairro= :bairro, rua= :rua, numero= :numero, edificio= :edificio, bloco= :bloco, numero_ap=:numero_ap where id= :id and id_usuario = :id_usuario;";
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
        $insert->bindValue(":edificio",$imovel->getEdificio());
        $insert->bindValue(":bloco",$imovel->getBloco());
        $insert->bindValue(":numero_ap",$imovel->getNumeroAp());
        $insert->execute();
    }
}
