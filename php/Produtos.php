<?php
if(!isset($_SESSION)){
    session_start();
}
        require_once 'conexao.php';
        class Produtos{
            private $conn;

            public function __construct()
            {
                $dataBase = new dataBase();
                $db = $dataBase->dbConecction();       
                $this->conn = $db;
            }

           

            public function inserir($nome, $valor, $quantidade, $fotoNova){
                try{
                    $sql = "INSERT INTO produto(nome, valor, quantidade, imagen) VALUES(:nome, :valor, :quantidade, :imagen)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt-> bindParam(":nome", $nome);
                    $stmt-> bindParam(":valor", $valor);
                    $stmt-> bindParam(":quantidade", $quantidade);
                    $stmt-> bindParam(":imagen", $fotoNova);
                    $stmt-> execute();
                    return $stmt;
                }catch(PDOException $e){
                    echo("ERRO: ".$e-> getMessage());
                }finally{
                    $this->conn = null;
                }
            }


                public function editar($nome, $valor, $quantidade, $descricao, $id){
                    try{
                        $sql = "UPDATE produto SET nome = :nome, valor = :valor, quantidade = :quantidade, descricao = :descricao  WHERE id_Produto = :id ";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(":nome", $nome);
                        $stmt->bindParam(":valor", $valor);
                        $stmt->bindParam(":quantidade", $quantidade);
                        $stmt->bindParam(":descricao", $descricao);
                        $stmt->bindParam(":id", $id);
                        $stmt->execute();
                        
                        return $stmt;

                    }catch(PDOException $e){
                        echo("Error: ".$e->getMessage());
                    }finally{
                        $this->conn = null;
                    }

                }

                public function deletar($id_Produto){
                    try{
                        $sql = "DELETE FROM produto WHERE id_Produto = :id";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(":id", $id_Produto);

                        $stmt->execute();

                        return $stmt;

                    }catch(PDOException $e){
                        echo("Error: ".$e->getMessage());
                    }finally{
                        $this->conn = null;
                    }
                }

                public function runQuery($sql){
                    $stmt = $this->conn->prepare($sql);
                    return $stmt;
                }
            
            public function redirect($url){
                header("Location: $url");
            }
        }   

?>