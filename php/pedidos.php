<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'conexao.php';
    class Pedidos{
        private $conn;

        public function __construct()
        {
            $dataBase = new dataBase();
            $db = $dataBase->dbConecction();       
            $this->conn = $db;
        }

        public function inserir($pedido){
            try{
                $sql = "INSERT INTO pedido(iduser, idproduto, valor, reference, status, data) 
                VALUES(:iduser, :idproduto, :valor, :reference, :status, :data)";
                $stmt = $this->conn->prepare($sql);
                if($stmt-> execute($pedido)){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                echo("ERRO: ".$e-> getMessage());
            }finally{
                $this->conn = null;
            }
        }
}
?>