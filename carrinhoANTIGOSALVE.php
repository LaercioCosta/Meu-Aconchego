<?php
if(!isset($_SESSION)){
  session_start();
}
include 'MercadoPago.php';

if (isset($_POST['acao']) && $_POST['acao'] == 'add'){
  $id_produto = (int)$_POST['id'];
  $qtd = (int)$_POST['qtd'];
  $forma =(isset($_POST['forma']))? $_POST['forma']: null;


  $carrinho -> adicionarProduto($id_produto, $qtd, $forma);
  
}

if(isset($_POST['atualizar'])){
  $qtd = $_POST['qtd'];
  foreach($qtd as $indice => $valor){
    $carrinho->alterarquantidade($indice, $valor);
  }
}

if(isset($_GET['acao']) && $_GET['acao'] == 'del'){
  $id = $_GET['id'];
  $carrinho->excluirProduto($id);
}

$produtos = $carrinho->listarProtudo();
$total = $carrinho->valorTotal();


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Meu Aconchego</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <header>
    <div class="Nova__NavBar">
      <div>
        <section class="Novo__Grid Novo__grid-template">

          <a class="logo__Nov grid_Logo" href="index.php">
            <div class="item__Novo"></div>
          </a>

          <center>
            <div class="item__Novo">
              <div class="Menu__Novo">
                <div class="subContainer">
                  <li class="dropdown Menu__Responsivo" style="flex-grow: 1;">
                    <a href="#" class="dropdown-toggle-hide" data-toggle="dropdown" role="button"
                      aria-expanded="false"><i class="fa fa-bars" style="float: left;"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a class="drops_menu" href="produtos.html">Produtos</a></li>
                      <li><a class="drops_menu" href="sobre.html">Sobre</a></li>
                      <li><a class="drops_menu" href="contatos.html">Contato</a></li>
                      <li class="divider"></li>
                      <li class="dropdown-header" style="color: white"></li>
                      <li><i class="fa fa-user" style="color: white ;"></i>
                        <a class="drops_menu" href="Entrar.html">Conta</a>
                      </li>
                    </ul>
                  </li>
                  <li class="Menu__Item" style="flex-grow: 1;"><a href="sobre.html">Sobre</a></li>
                  <li class="Menu__Item" style="flex-grow: 1;"><a href="produtos.html">Produtos</a></li>
                  <li class="Menu__Item" style="flex-grow: 1;"><a href="contatos.html">Contato</a></li>
                </div>
              </div>
            </div>
          </center>

          <center>
            <div class="item__Novo grid_Criar">
              <div class="Criar">
                <div class="CriarConta__subcontainer01">
                  <li style=" margin-right: 7px; "><i class="fa fa-user" style="color: white ;"></i></li>
                  <li style="margin-right: 20px;"><a class="" href="CriarConta.html">Criar Conta</a></li>
                  <li><a class="" href="Entrar.html">Entrar</a></li>
                </div>
              </div>
            </div>
          </center>

          <div class="item__Novo grid_Buscar">
            <div class="barra_Buscar">
              <input type="search" placeholder="Buscar Produto" />
              <button type="submit" class="btn_Buscar" style="display:flex; align-items: center;">
                <i class="fa fa-search" style="align-items: center; justify-content: center;"></i>
              </button>
            </div>
          </div>

          <div class="item__Novo Grid_Comprar">
            <div class="incons_Compra">
              <div class="preferiti" style="margin-right: 10px;">
                <a href="#">
                  <div class="icon"><i class="fa fa-heart" aria-hidden="true"></i></div>
                </a>
              </div>
              <div class=" " style="margin-left: 10px;">
                <a href="#" class="dropdown-toggle-hide" data-toggle="dropdown" role="button" aria-expanded="false">
                  <div class="bag">
                    <div class="icon "><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </header>

  <div class="container">

    <table class="carrinho" border="1" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <td>Produto</td>
          <td>Quantidade</td>
          <td>Preço</td>
          <td>Subtotal</td>
          <td>Remover</td>
        </tr>
      </thead>
      <form action="" method="POST">
        <tfoot>
          <tr>
            <td colspan="4">Valor total:</td>
            <td>R$<?php echo number_format($total, 2, ',' , '.'); ?></td>
          </tr>
          <tr>
            <td>
              <input class="btn reload" type="submit" name="atualizar" value="Atualizar Carrinho">
            </td>
            <td>
              <a class="btn" href="index.php">Continuar Comprando</a>
            </td>
            <td  colspan="3">
            <script>
              function create_pedido(){
                $.post('./controle/ctr-pedido.php',{create:true}, function(data){
                  console.log(data);
                });
              }            
            </script>
            <a onClick="create_pedido();">
                <script
                src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                data-preference-id="<?php echo $preference->id; ?>">   
              </script>
            </a>
            </td>
          </tr>
        </tfoot>

        <tbody>
          <?php
          $contarProduto = count($produtos);
          if($contarProduto == 0){
            echo'<tr><td colspan="5">Carrinho vazio</td></tr>';
          }else{
            foreach($produtos as $indice => $produto):
          
          ?>
          <tr>
            <td><?php echo $produto['nome']; ?></td>
            <td><input type="text" size="3" name="qtd[<?php echo $indice; ?>]" value="<?php echo $produto['quantidade']; ?>"></td>
            <td>R$:<?php echo number_format($produto['valor'], 2 , ',' , '.'); ?></td>
            <td>R$:<?php echo number_format($produto['subtotal'], 2 , ',' , '.'); ?></td>
            <td><a class="btn" href="?acao=del&id=<?php echo $indice;  ?>">Remover</a></td>
          </tr>
            <?php endforeach; } ?>
        </tbody>
      </form>
    </table>

  </div>


  <br><br><br><br>
      <footer style="margin-top: 50vh; position: absolute; bottom: 100;">
            <div id="rodape2">   
              <div id="rod">
                <p> 
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                  Duis mattis nunc sem, ac vehicula ipsum ultricies eget. 
                  Nulla sed leo in turpis volutpat sollicitudin. In dictum risus leo, vitae mattis velit auctor vitae. 
                  Sed accumsan pellentesque ipsum vel eleifend. 
                  Aliquam interdum ante quis nibh mattis ullamcorper condimentum non enim. 
                  Nullam bibendum diam et nibh pretium, ut tempor ante facilisis. 
                  Aliquam ac gravida risus, nec scelerisque magna. 
                 
                </p>
                  
              </div>    
            </div> 

            <div id="rodape1">   
              <div>
                
                  <span>
                    &copy; Copyright 2000-2021 MeuAconchego
                  </span>
              </div>    
            </div> 
        </footer> 
  


  
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>

</html>