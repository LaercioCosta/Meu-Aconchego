<?php 
if(!isset($_SESSION)){
    session_start();
}
require_once './ctr-produtos.php';
require_once '../php/pedidos.php';
include      '../php/carrinho.class.php';

$carrinho = new Carrinho();
$pedidos = new Pedidos();

if(isset($_SESSION['id'])){

    $total = $carrinho->valorTotal();

    $pedido = new stdClass();
    $pedido->iduser    = $_SESSION['id'];
    $pedido->idproduto = $_SESSION['idProd'];
    $pedido->valor     = $_SESSION['valor'];
    $pedido->reference = $_SESSION['veriPedidos']['reference'];
    $pedido->status    = ("Pendente");
    $pedido->data      = $_SESSION['veriPedidos']['data'];


    $insertPedido = $pedidos->inserir((array)$pedido);
    if($insertPedido){
        echo 1;
    }
}else{
    echo "403";
}
?>