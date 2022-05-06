<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once './php/Produtos.php';
require_once './php/usuario.php';
include './php/carrinho.class.php';

$objproduto = new Produtos();
$carrinho   = new Carrinho();
$total      = $carrinho->valorTotal();
$produtos   = $carrinho->listarProtudo();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>


<?php
// SDK do Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Adicione as credenciais
//MercadoPago\SDK::setAccessToken('APP_USR-1422372214464850-101618-40348fbdc037c4104bd49aed533a9dfe-242353619');
MercadoPago\SDK::setAccessToken('TEST-1422372214464850-101618-05bbbd92d2f7c8a6d5190af334dd2b04-242353619');



// Cria um item na preferência
foreach ($produtos as $indice => $produto) :
    $preference = new MercadoPago\Preference();
    $item = new MercadoPago\Item();
    $item->title = $produto['nome'];
    $item->quantity = 1;
    $item->unit_price = $total;
    $preference->items = array($item);

    $preference->back_urls = array(
        "success" => 'http://localhost/meuaconchego/meuAconchego/index.php',
        "failure" => 'http://localhost/meuaconchego/meuAconchego/carrinho.php',
        "pending" => 'http://localhost/meuaconchego/meuAconchego/index.php',
    );
    $preference->notification_url = 'http://localhost/meuaconchego/meuAconchego/controle/notification.php';

    //$preference->external_reference = $_SESSION['veriPedidos']['reference'];

    $preference->save();

endforeach;
//$link = $preference->init_point;

//echo $link;

//echo "<a href='$preference->init_point'>Pagar</a>";

?>

</html>