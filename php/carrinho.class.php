<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'Produtos.php';
class Carrinho {
    
    public function __construct() {
        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'] = array();
        }
    }
    public function adicionarProduto($id, $quantidade = 1, $form_id = null) {
        if(is_null($form_id)){
            $indice = sprintf("%s:%s", (int) $id, 0);
        }else{
            $indice = sprintf("%s:%s", (int) $id, (int)$form_id);
        }
        if(!isset($_SESSION['carrinho'][$indice])){
            $_SESSION['carrinho'][$indice] = (int)$quantidade;
        }
    }

    public function alterarquantidade($indice, $quantidade){
        if(isset($_SESSION['carrinho'][$indice])){
            if($quantidade > 0){
                $_SESSION['carrinho'][$indice] = (int)$quantidade;
            }
        }
    }

    public function excluirProduto($indice){
        unset($_SESSION['carrinho'][$indice]);
    }

    public function listarProtudo(){
        $objproduto = new Produtos();

        $retorno = array();
        foreach($_SESSION['carrinho'] as $indice => $quantidade){
            list($id, $form_id) = explode(":", $indice);

            $query = ("SELECT * FROM produto WHERE id_Produto = ?");
            $query = $objproduto -> runQuery($query);
            $query->execute(array($id));
            $resultado = $query->fetchObject();

            $retorno[$indice]['nome'] = $resultado->nome;
            $retorno[$indice]['valor'] = $resultado->valor;
            $retorno[$indice]['quantidade'] = $quantidade;
            $retorno[$indice]['subtotal'] = $resultado->valor * $quantidade;
            $retorno[$indice]['forma'] = '';
            $_SESSION['idProd'] = $resultado->id_Produto;
            
            if($form_id > 0) {
                $query_form = ("SELECT * FROM produto WHERE id_Produto = ?");
                $query_form = $objproduto -> runQuery($query_form);
                $query_form->execute(array($form_id));
                $fetchForm = $query_form->fetchObject();

                $retorno[$indice]['forma'] = $fetchForm -> forma;
                
            }

        }
        return $retorno;
    }

    public function valorTotal(){
        $produtos=$this->listarProtudo();
        $total = 0;
        foreach($produtos as $indice => $linha) {
            $total += $linha['subtotal'];
            $_SESSION['valor'] = $total;
        }
        return $total;
    }
}
?>