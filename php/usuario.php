<?php
if(!isset($_SESSION)){
    session_start();
}
    require_once 'conexao.php';
        class Usuario{
            private $conn;

            public function __construct()
            {
                $dataBase = new dataBase();
                $db = $dataBase -> dbConecction();
                $this->conn = $db;
            }

            //função para inserir novos usuario na tabela
            public function inserir($email ,$senha, $nome, $sobrenome, $nascimento){ 
                try{
                    $sql = "INSERT INTO  tb_cliente(email, senha, nome, sobrenome, nascimento, tipo_user, data_cadastro) 
                    VALUES (:email, md5(:senha), :nome, :sobrenome,:nascimento,'cliente', NOW())";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":senha", $senha);
                    $stmt->bindParam(":nome", $nome);
                    $stmt->bindParam(":sobrenome", $sobrenome);
                    $stmt->bindParam(":nascimento", $nascimento);
                    $stmt->execute();
                    return $stmt;
                }catch(PDOException $e){
                    echo("Error: ".$e->getMessage());
                }finally{
                    $this->conn = null;
                }
            }

            //função para verificar o login e senha no BD
            public function validar($email, $senha) 
            {
                try{
                    $sql = "SELECT * FROM tb_cliente WHERE email = :email AND senha = md5(:senha) LIMIT 1";
                    $stmt = $this -> conn -> prepare($sql);
                    $stmt -> bindParam(":email", $email);
                    $stmt -> bindParam(":senha", $senha);
                    $stmt -> execute();

                    $row_usuario = $stmt -> fetch(PDO::FETCH_ASSOC);

                    if($stmt->rowCount() > 0)
                    {
                        $_SESSION['id'] = $row_usuario['id'];
                        $_SESSION['nome'] = $row_usuario['nome'];
                        $_SESSION['nivel'] = $row_usuario['tipo_user'];
                        return true;
                        
                    }else{
                        
                        return false;
                    }
                }catch(PDOException $e){
                    echo("Error: ".$e->getMessage());
                }finally{
                    $this->conn = null;
                }
                
            }

             //função para editar os funcionarios
            public function editar($email, $senha, $nome, $sobrenome, $nascimento, $nivel, $id){
                try{
                    $sql = "UPDATE tb_cliente SET email = :email, senha = md5(:senha), nome = :nome, 
                            sobrenome = :sobrenome, nascimento = :nascimento, tipo_user = :tipo_user WHERE id = :id";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":senha", $senha);
                    $stmt->bindParam(":nome", $nome);
                    $stmt->bindParam(":sobrenome", $sobrenome);
                    $stmt->bindParam(":nascimento", $nascimento);
                    $stmt->bindParam(":tipo_user", $nivel);
                    $stmt->bindParam(":id", $id);
                    $stmt->execute();
                    return $stmt;
                }catch(PDOException $e){
                    echo("Error: ".$e->getMessage());
                }finally{
                    $this->conn = null;
                }
            }

            public function deletar($id){
                try{
                    $sql = "DELETE FROM tb_cliente WHERE id = :id";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(":id", $id);
                    $stmt->execute();
                    return $stmt;
                }catch(PDOException $e){
                    echo("Error: ".$e->getMessage());
                }finally{
                    $this->conn = null;
                }
            }

            public function runQuery($sql){
                $stmt =  $this -> conn -> prepare($sql);
                return $stmt;

            }

            public function redirect($url){
                header("Location: $url");
            }
        }
?>
         