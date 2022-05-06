<?php
    require_once '../php/Produtos.php';
    $objproduto = new Produtos();

    $extensoes_validas = array(".jpg", ".jpeg", ".png", ".bmp");
    $guardarFotos = "../fotosProdutos";
    $tamanhoMaxFotos = 5000000;

          //comunicação = view->controle->modelo 
        if(isset($_POST['insert'])){
            $nome = $_POST['txtnome'];
            $valor = $_POST['txtValor'];
            $quantidade = $_POST['txtQuantidade'];
            $descricao = $_POST['txtDescricao'];
            $foto = $_FILES['fileFoto']['name'];
            $extensao = strrchr($foto, '.');
            $tamanhoFoto = $_FILES['fileFoto']['size'];
            $FotoTemporaria = $_FILES['fileFoto']['tmp_name'];
            $fotoNova = $nome . $extensao;
            if($tamanhoFoto > $tamanhoMaxFotos):
                die('Foto muito grande, selecione uma foto ate 5mb');
            
            endif;

            if(!in_array($extensao, $extensoes_validas)):
                die("Foto não suportada");
            endif;
            if(move_uploaded_file($FotoTemporaria,"$guardarFotos/$fotoNova")):
                if($objproduto->inserir($nome, $valor, $quantidade,$fotoNova)):
                    $objproduto->redirect('../Admprodutos.php');
                endif;
            else:
            
            endif;

        }

        if(isset($_POST['editar'])){
            $id = $_POST['editar'];
            $nome = $_POST['txtnome'];
            $valor = $_POST['txtValor'];
            $quantidade = $_POST['txtQuantidade'];
            $descricao = $_POST['txtDescricao'];
            if($objproduto->editar($nome, $valor, $quantidade, $descricao, $id)){
                $objproduto->redirect('../Admprodutos.php');
            }
        }
        if (isset($_POST['deletar'])) {
             $id_Produto = $_POST['deletar'];
            if($objproduto->deletar($id_Produto)){
                $objproduto->redirect('../Admprodutos.php');
            }
        }


        if(isset($_POST['acao']) && $_POST['acao'] == 'comprar'){
            $idprod = $GET['id'];
            $_SESSION['veriPedidos'] = array(
                'produtoId' =>  $idProd,
                'data' => date('y/m/d'),
                'reference' => substr(sha1(rand(10000,99000)),0,100),
            );
        }

        
    ?>  