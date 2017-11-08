<?php
abstract class ConexaoDB {
    
    public $conexao = "pgsql:host=ec2-50-19-83-146.compute-1.amazonaws.com dbname=d2pb59slfl7kkf user=pbvvhdfcfisibq password=e0389bcdfd1e86caad8d75092d6934e69b93c57ad61d3e3117089c3d4a3284d9";
    
    public function getConexao() {
        return $this->conexao;
    }
    
    public static function getConexaoStatic(){
        return $conexao = "pgsql:host=ec2-50-19-83-146.compute-1.amazonaws.com dbname=d2pb59slfl7kkf user=pbvvhdfcfisibq password=e0389bcdfd1e86caad8d75092d6934e69b93c57ad61d3e3117089c3d4a3284d9";
    }
}
