<?php

include_once 'Validacao.php';
include_once 'ConexaoDB.php';

class Reserva extends ConexaoDB{

    private $id;
    private $usuario;
    private $dataInicial;
    private $dataFinal;
    public $imovel;
    public $intermediador;
    private $porcentagemIntermediador;
    private $precoDiaria;
    private $taxaLimpeza;
    private $desconto;
    private $locatario;
    private $totalDepositado;

    public function __construct($id, $usuario, $dataInicial, $dataFinal, $imovel, $intermediador, $porcentagemIntermediador, $precoDiaria, $taxaLimpeza, $desconto, $locatario, $totalDepositado)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->dataInicial = $dataInicial;
        $this->dataFinal = $dataFinal;
        $this->imovel = $imovel;
        $this->intermediador = $intermediador;
        $this->porcentagemIntermediador = $porcentagemIntermediador;
        $this->precoDiaria = $precoDiaria;
        $this->taxaLimpeza = $taxaLimpeza;
        $this->desconto = $desconto;
        $this->locatario = $locatario;
        $this->totalDepositado = $totalDepositado;
    }

    function getId() {
        return $this->id;
    }

    function getDataInicial() {
        return $this->dataInicial;
    }

    function getDataFinal() {
        return $this->dataFinal;
    }

    function getImovel() {
        return $this->imovel;
    }

    function getIntermediador() {
        return $this->intermediador;
    }

    function getPorcentagemIntermediador() {
        return $this->porcentagemIntermediador;
    }

    function getPrecoDiaria() {
        return $this->precoDiaria;
    }

    function getTaxaLimpeza(){
        return $this->taxaLimpeza;
    }

    function getDesconto() {
        return $this->desconto;
    }

    function setPrecoDiaria($precoDiaria) {
        $this->precoDiaria = $precoDiaria;
    }

    function setTaxaLimpeza($taxaLimpeza) {
        $this->taxaLimpeza = $taxaLimpeza;
    }

    function setDesconto($desconto) {
        $this->desconto = $desconto;
    }

    function setPorcentagemIntermediador($porcentagemIntermediador) {
        $this->porcentagemIntermediador = $porcentagemIntermediador;
    }
    
    function setDataInicial($dataInicial) {
        $this->dataInicial = $dataInicial;
    }

    function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;
    }
    
    function getUsuario() {
        return $this->usuario;
    }

    public function getLocatario()
    {
        return $this->locatario;
    }

    public function getTotalDepositado()
    {
        return $this->totalDepositado;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @param mixed $imovel
     */
    public function setImovel($imovel)
    {
        $this->imovel = $imovel;
    }

    /**
     * @param mixed $locatario
     */
    public function setLocatario($locatario)
    {
        $this->locatario = $locatario;
    }

    /**
     * @param mixed $totalDepositado
     */
    public function setTotalDepositado($totalDepositado)
    {
        $this->totalDepositado = $totalDepositado;
    }


    function setIntermediador($intermediador) {
        $this->intermediador = $intermediador;
    }

    public function cadastrarReserva(Reserva $reserva) {
        $pdo = new PDO($this->getConexao());
        $sql = "insert into reserva(id_usuario,id_imovel,id_intermediador,data_inicial,data_final,porcentagem_intermediador,preco_diaria,taxa_limpeza,desconto,locatario,total_depositado) values (:id_usuario,:id_imovel,:id_intermediador,:data_inicial,:data_final,:porcentagem_intermediador,:preco_diaria,:taxa_limpeza,:desconto,:locatario,:total_depositado)";
        $insert=$pdo->prepare($sql);

        $insert->bindValue(":id_usuario",$reserva->getUsuario());
        $insert->bindValue(":id_imovel",$reserva->getImovel());
        $insert->bindValue(":id_intermediador",$reserva->getIntermediador());
        $insert->bindValue(":data_inicial",$reserva->getDataInicial());
        $insert->bindValue(":data_final",$reserva->getDataFinal());
        $insert->bindValue(":porcentagem_intermediador",$reserva->getPorcentagemIntermediador());
        $insert->bindValue(":preco_diaria",$reserva->getPrecoDiaria());
        $insert->bindValue(":taxa_limpeza",$reserva->getTaxaLimpeza());
        $insert->bindValue(":desconto",$reserva->getDesconto());
        $insert->bindValue(":locatario",$reserva->getLocatario());
        $insert->bindValue(":total_depositado",$reserva->getTotalDepositado());
        if($insert->execute()){
            return true;
        }else{
            return $erro = $insert->errorInfo()[2];
        }
    }
    
    public static function excluirReserva($id,$id_usuario){
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = 'DELETE FROM reserva WHERE id = :id and id_usuario = :id_usuario';
        $delete=$pdo->prepare($sql);
        
        $delete->bindValue(":id", $id);
        $delete->bindValue(":id_usuario", $id_usuario);
        if($delete->execute()){
            return true;
        }
        return false;
        
    }
    
    public static function listarReservas($idUsuario,$idImovel){
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = "SELECT imovel.identificacao,reserva.id_intermediador,reserva.id, reserva.data_inicial, reserva.data_final,reserva.porcentagem_intermediador,reserva.preco_diaria,reserva.taxa_limpeza,reserva.desconto,reserva.locatario,reserva.total_depositado
                FROM reserva 
                INNER JOIN imovel ON(reserva.id_imovel = imovel.id)
                where reserva.id_usuario = :id_usuario and imovel.id = :id_imovel and reserva.data_final > now()
                order by reserva.data_inicial;";
        $select = $pdo->prepare($sql);
        $select->bindValue(":id_usuario", $idUsuario);
        $select->bindValue(":id_imovel", $idImovel);
        $select->execute();

        $reservas = array();
        foreach ($select as $r) {
            $reserva = new Reserva($r['id'], $idUsuario, $r['data_inicial'], $r['data_final'], $idImovel, $r['id_intermediador'], $r['porcentagem_intermediador'], $r['preco_diaria'], $r['taxa_limpeza'], $r['desconto'], $r['locatario'], $r['total_depositado']);
            $reserva->identificacao = $r['identificacao'];
            if($r['id_intermediador'] == null){
                $reserva->nome = "-";
            }
            array_push($reservas, $reserva);
        }
        return $reservas;
    }
    public static function listarReserva($idUsuario,$id){
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = "select * from reserva where id_usuario = :id_usuario and id = :id;";
        $select = $pdo->prepare($sql);
        $select->bindValue(":id_usuario", $idUsuario);
        $select->bindValue(":id", $id);
        $select->execute();

        foreach ($select as $r) {
            $reserva = new Reserva($r['id'], $idUsuario, $r['data_inicial'], $r['data_final'], $r['id_imovel'], $r['id_intermediador'], $r['porcentagem_intermediador'], $r['preco_diaria'], $r['taxa_limpeza'], $r['desconto'],$r['locatario'],$r['total_depositado']);
            return $reserva;
        }
    }
    
    public static function buscarIntermediadorNome($id_intermediador){
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = "select nome from intermediador where id = :id";
        $select = $pdo->prepare($sql);
        $select->bindValue(":id", $id_intermediador);
        $select->execute();
        
        foreach ($select as $i) {
            return $i['nome'];
        }
    }
            
    function verificarDataMarcada($id_usuario,$dataI,$dataF,$id_imovel,$id) {
        $pdo = new PDO(ConexaoDB::getConexaoStatic());
        $sql = "select * from reserva where (:dataInicial, :dataFinal) OVERLAPS (data_inicial, data_final) and id_usuario = :id_usuario and id_imovel = :id_imovel;";
        $select = $pdo->prepare($sql);
        $select->bindValue(":id_usuario", $id_usuario);
        $select->bindValue(":id_imovel", $id_imovel);
        $select->bindValue(":dataInicial", $dataI);
        $select->bindValue(":dataFinal", $dataF);
        $select->execute();
        
        $teste = array();

        foreach ($select as $i) {
            $t['id'] = $i['id'];
            $t['data1'] = $i['data_inicial'];
            $t['data2'] = $i['data_final'];

            array_push($teste, $t);
        }
        if($teste == null){
            return true;
        }
        
        foreach ($teste as $t) {
            if($t['id'] == $id){
                return true;
            }
        }
        return false;
    }
    
    public function editarReserva(Reserva $reserva){
        $pdo = new PDO($this->getConexao());
        $sql = "update reserva set id_imovel= :id_imovel, id_intermediador= :id_intermediador, data_inicial= :data_inicial, data_final= :data_final, porcentagem_intermediador= :porcentagem_intermediador, preco_diaria= :preco_diaria, taxa_limpeza= :taxa_limpeza, desconto= :desconto, locatario= :locatario, total_depositado= :total_depositado where id= :id and id_usuario = :id_usuario;";
        $insert = $pdo->prepare($sql);
        $insert->bindValue(":id",$reserva->getId());
        $insert->bindValue(":id_usuario",$reserva->getUsuario());
        $insert->bindValue(":id_imovel",$reserva->getImovel());
        $insert->bindValue(":id_intermediador",$reserva->getIntermediador());
        $insert->bindValue(":data_inicial",$reserva->getDataInicial());
        $insert->bindValue(":data_final",$reserva->getDataFinal());
        $insert->bindValue(":data_final",$reserva->getDataFinal());
        $insert->bindValue(":porcentagem_intermediador",$reserva->getPorcentagemIntermediador());
        $insert->bindValue(":preco_diaria",$reserva->getPrecoDiaria());
        $insert->bindValue(":taxa_limpeza",$reserva->getTaxaLimpeza());
        $insert->bindValue(":desconto",$reserva->getDesconto());
        $insert->bindValue(":locatario",$reserva->getLocatario());
        $insert->bindValue(":total_depositado",$reserva->getTotalDepositado());
        $insert->execute();
    }

    function validarReserva(Reserva $r) {
        $erros = array();
        $retorno = array();

        if (!Validacao::validarData($r->getDataInicial())) {
            array_push($erros, "O campo data inicial está inválido.");
        }

        if (!Validacao::validarData($r->getDataFinal())) {
            array_push($erros, "O campo data final está inválido.");
        }

        if (!Validacao::verificarMaiorData($r->getDataInicial(), $r->getDataFinal())) {
            array_push($erros, "A data inicial deve ser menor que a data final.");
        }
        $r->setDataInicial(Validacao::transformaDataEmTimestamp($r->getDataInicial(), 0));
        $r->setDataFinal(Validacao::transformaDataEmTimestamp($r->getDataFinal(), 1));
        
        if (!Validacao::verificarInteiro($r->getImovel()) || $r->getImovel() <= 0 || !Validacao::verificarInteiro($r->getImovel())) {
            array_push($erros, "Imóvel inválido.");
        }

        if (!Validacao::verificarInteiro($r->getIntermediador())) {
            array_push($erros, "Intermediador inválido.");
        }
        if($r->getIntermediador() == 0){
            $r->setIntermediador(null);
        }

        if ($r->porcentagemIntermediador == "") {
            $r->setPorcentagemIntermediador(0.0);
        } else {
            if (!Validacao::verificarInteiro($r->getPorcentagemIntermediador())) {
                array_push($erros, "Porcentagem do intermediador inválida.");
            }
        }

        $r->setPrecoDiaria(Validacao::transformarEmFloat($r->getPrecoDiaria()));
        if (!is_numeric($r->getPrecoDiaria())) {
            array_push($erros, "Preço da diária inválida.");
        }

        if ($r->getTaxaLimpeza() == "") {
            $r->setTaxaLimpeza(0.0);
        } else {
            $r->setTaxaLimpeza(Validacao::transformarEmFloat($r->getTaxaLimpeza()));
            if (!is_numeric($r->getTaxaLimpeza())) {
                array_push($erros, "Taxa de limpeza inválida.");
            }
        }

        if ($r->getTotalDepositado() == "") {
            $r->setTotalDepositado(0.0);
        } else {
            $r->setTotalDepositado(Validacao::transformarEmFloat($r->getTotalDepositado()));
            if (!is_numeric($r->getTotalDepositado())) {
                array_push($erros, "Total depositado inválido.");
            }
        }

        if ($r->getDesconto() == "") {
            $r->setDesconto(0.0);
        } else {
            $r->setDesconto(Validacao::transformarEmFloat($r->getDesconto()));
            if (!is_numeric($r->getDesconto())) {
                array_push($erros, "Desconto inválido.");
            }
        }

        $retorno['obj'] = serialize($r);
        $retorno['erros'] = $erros;
        
        return $retorno;
    }

}
