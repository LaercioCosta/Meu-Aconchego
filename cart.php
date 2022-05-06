<?php
if (!isset($_SESSION)) {
  session_start();
}
include 'MercadoPago.php';

if (isset($_POST['acao']) && $_POST['acao'] == 'add') {
  $id_produto = (int)$_POST['id'];
  $qtd = (int)$_POST['qtd'];
  $forma = (isset($_POST['forma'])) ? $_POST['forma'] : null;


  $carrinho->adicionarProduto($id_produto, $qtd, $forma);
}


if (isset($_POST['atualizar'])) {
  $qtd = $_POST['qtd'];
  foreach ($qtd as $indice => $valor) {
    $carrinho->alterarquantidade($indice, $valor);
  }
}

if (isset($_GET['acao']) && $_GET['acao'] == 'del') {
  $id = $_GET['id'];
  $carrinho->excluirProduto($id);
}

$produtos = $carrinho->listarProtudo();
$total = $carrinho->valorTotal();


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="./Carrinho/carrinho.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div id="w">
    <header id="title">
      <h1>Carrinho</h1>
    </header>
    <div id="page">
      <table id="cart">
        <thead>
          <?php
          $contarProduto = count($produtos);
          if ($contarProduto != 0) {
            echo ' <tr>
            <th class="first">Produto</th>
            <th class="second">Quantidade</th>
            <th class="third">Valor</th>
            <th class="fourth">&nbsp;</th>
            <th class="fifth">&nbsp;</th>
          </tr>';
          } else {
            echo ' <tr>
            <th class="first"></th>
            <th class="second"></th>
            <th class="third"></th>
            <th class="fourth"></th>
            <th class="fifth"></th>
          </tr>';
          }
          ?>
        </thead>
        <tbody>



          <?php
          $contarProduto = count($produtos);
          if ($contarProduto == 0) {
            echo '<tr>
            <td style="font-size:20px;" colspan="5">Carrinho vazio</td>
            </tr>';
          } else {
            foreach ($produtos as $indice => $produto) :

          ?>

              <tr class="productitm">
                <td><?php echo $produto['nome']; ?></td>
                <td><input type="number" id="qnt" class="qtyinput" size="3" name="qtd[<?php echo $indice; ?>]" value="<?php echo $produto['quantidade']; ?>"></td>
                <td>R$:<input style="width: 40px; border: none; " id="valor_unitario" type="text" readonly="readonly" value="<?php echo number_format($produto['valor'], 2, ',', '.'); ?>" /></td>
                <td><a class="remove" href="?acao=del&id=<?php echo $indice;  ?>">Remover</a></td>
              </tr>
          <?php endforeach;
          } ?>


          <tr class="totalprice" style="margin-top: 11px;">
            <td class="light">Total:</td>
            <td colspan="2">&nbsp;</td>
            <td>R$:<input style="width: 40px; border: none; " id="total" type="text" readonly="readonly" value="<?php echo number_format($total, 2, ',', '.'); ?>"></td>
          </tr>


          <tr class="checkoutrow">
            <td colspan="5">
              <script>
                function create_pedido() {
                  $.post('./controle/ctr-pedido.php', {
                    create: true
                  }, function(data) {
                    console.log(data);
                  });
                }
              </script>

              <a style="font-size:20px;" type="button" onClick="create_pedido();" class="submitbtn">
                <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>">
                </script>
              </a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</body>

</html>