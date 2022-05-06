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
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Meu Aconchego</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
  <link rel="stylesheet" href="./css/style.css">
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
                      <li><a class="drops_menu" href="PainelProdutos.php">Produtos</a></li>
                      <li><a class="drops_menu" href="sobre.php">Sobre</a></li>
                      <li><a class="drops_menu" href="contatos.php">Contatos</a></li>
                      <li class="divider"></li>
                      <li class="dropdown-header" style="color: white"></li>
                      <li><i class="fa fa-user" style="color: white ;"></i>
                        <a class="drops_menu" id="ContaDrop" href="Entrar.php"></a>
                        <a class="drops_menu" id="Conta" href="ContaCliente.php"></a>
                      </li>
                    </ul>
                  </li>
                  <li class="Menu__Item" style="flex-grow: 1;"><a href="sobre.php">Sobre</a></li>
                  <li class="Menu__Item" style="flex-grow: 1;"><a href="PainelProdutos.php">Produtos</a></li>
                  <li class="Menu__Item" style="flex-grow: 1;"><a href="contatos.php">Contatos</a></li>
                </div>
              </div>
            </div>
          </center>

          <center>
            <div class="item__Novo grid_Criar">
              <div class="Criar">
                <span class="CriarConta__subcontainer01" data-logged-user="false">
                  <li style=" margin-right: 7px; "><i class="fa fa-user" style="color: white ;"></i></li>
                  <li>
                   <a id="Conta2" class="dropdown-toggle-hide" data-toggle="dropdown" role="button"
                      aria-expanded="false">
                      <?php if(isset($_SESSION['id'])){
                          echo $_SESSION['msg'] = "Bem Vindo ";
                          echo $_SESSION['nome'];
                         
                      ?>
                      <ul class="dropdown-menu" role="menu">
                        <li class="drops_menu" style="color: white">Área Do Cliente</li>
                        <p>
                          <li><a class="drops_menu" href="ContaAdmin.php">Conta</a></li>
                          <li><a class="drops_menu" href="#">Pedidos</a></li>
                          <li><a class="drops_menu" href="#">Acesso e Segurança</a></li>
                          <li><a class="drops_menu" href="#">Enderços</a></li>
                          <li><a class="drops_menu" id="SairConta" href="./php/SairConta.php">Sair da Conta</a></li>
                      </ul>
                    </a>
                    <?php }else{ ?>
                    <a id="Entrar" class="" href="Entrar.php">entrar</a>
                    <li style="margin-left: 10px;">
                    <a id="CriarConta" class="" href="CriarConta.php">Criar Conta</a>
                    </li> 
                    <?php  } ?>
                  </li>
                </span>
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
              <div style="margin-left: 10px;">
                <a href="carrinho.php" style="text-decoration:none;">
                  <div class="bag">
                    <div class="back_NumCarrinho">
                      <span class="NumCarrinho" id='cart'>0
                      </span>
                    </div>
                    <div class="icon "><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    
    <center>
    <div id="carouselExampleControlsNoTouching" class="carousel slide "
      style="width: 100%;" data-bs-ride="carousel">
      <div class="carousel-inner" style="
      margin: auto;
      width: 100%;
      object-fit: cover;
      background-color: #C0C0C0;">
      
        <div class="carousel-item active">
         <h5>Entrega para todo Brasil</h5>
        </div>
        <div class="carousel-item">
          <h5>Compra facilidada com Mercado Pago</h5>
        </div>
        <div class="carousel-item">
          <h5>Parcele em até x12</h5>
        </div>
      </div>


      <button class="carousel-control-prev" style="margin-left: 40vh;" type="button" data-bs-target="#carouselExampleControlsNoTouching"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" style="margin-right: 40vh; color: black" type="button" data-bs-target="#carouselExampleControlsNoTouching"
        data-bs-slide="next">
        <span class="carousel-control-next-icon"aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  </center>
  <br>

        
    <div class="Redes__Sociais">
      <div class="show" id="showId">
          <i></i>
      </div>
      <div class="Social">
          <div class="Socials instagram">
              <a href="https://www.instagram.com/meuaconchego.byam/?hl=pt-br">
                  <img src="https://cidadedosoltransportes.com.br/wp-content/themes/cidadedosol/instagram.png"
                      style="height:60px; width: 60px;" class="fa fa-instagram"></img></a>
          </div>
          <div class="Socials whatsapp">
              <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5571993551934">
                  <img src="https://i0.wp.com/www.clker.com/cliparts/3/c/c/9/14798007281956560960whatsapp%20trans.med.png"
                      style="height:45px; width: 50px;" class="fa fa-instagram"></img></a>
          </div>

      </div>
  </div>
  </header>

  <style>
    .button1 {
      background-color: #E08B53;
      /* Green */
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 150px 5px;
      transition-duration: 0.4s;
      cursor: pointer;
      border-radius: 2px;

    }

    .button1:hover {
      background-color: #20B2AA;
      color: white;
    }
  </style>
  <a href="./index.php">
  <a href="./index.php"> <button class="button button1"><i class="fa fa-arrow-left"></i> Voltar ao início </button>
  </a>


  <br><br>
  <div id="w">
    <div id="title">
      <h1>Carrinho</h1>
  </div>
    <div id="page">
      <table id="cart">
        <thead>
          <?php
          $contarProduto = count($produtos);
          if ($contarProduto != 0) {
            echo ' 
              <tr>
              <th style="text-align: center;" class="first">Produto</th>
              <th  style="text-align: center;" class="second">Quantidade</th>
              <th style="text-align: center;" class="third">Valor</th>
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
            echo '
              <tr>
              <td style="font-size:20px;" colspan="5">Carrinho vazio</td>
              </tr>';
          } else {
            foreach ($produtos as $indice => $produto) :

          ?>

              <tr class="productitm">
                <td><?php echo $produto['nome']; ?></td>
                <td><input type="number" id="qnt" class="qtyinput" size="3" name="qtd[<?php echo $indice; ?>]" value="<?php echo $produto['quantidade']; ?>"></td>
                <td>R$:<input style="width: 50px; border: none; " id="valor_unitario" type="text" readonly="readonly" value="<?php echo number_format($produto['valor'], 2, ',', '.'); ?>" /></td>
                <td><a class="remove" href="?acao=del&id=<?php echo $indice;  ?>">Remover</a></td>
              </tr>
          <?php endforeach;
          } ?>


          <tr class="totalprice" style="margin-top: 11px;">
            <td class="light">Total:</td>
            <td colspan="2">&nbsp;</td>
            <td>R$:<input style="width: 50px; border: none; " id="total" type="text" readonly="readonly" value="<?php echo number_format($total, 2, ',', '.'); ?>"></td>
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

              <a style="font-size:20px;" type="button" onClick="create_pedido();">
                <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>">
                </script>
              </a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>


  <br><br><br><br>
  <footer style="margin-top: 30vh; bottom: 100; " >
    <section class="grindRodape ">
    <center>
      <div class="Site" >
        <div class="Mapadosite">
          <h4>Mapa do site</h4>
          <hr>
          <h5>
              <li><a href="PainelProdutos.php">Produtos</a></li>
              <li><a href="sobre.php">Sobre</a></li>
              <li><a href="contatos.php">Contatos</a></li>
              <li><a href="ContaAdmin.php">Conta</a></li>
          </h5>
        </div>
        <div class="Midiassociais" style="margin-left: 3vh;"> 
        <h4>Mídias sociais</h4>
          <hr>
          <h5>
              <li><a href="https://api.whatsapp.com/send?1=pt_BR&phone=5571993551934">Whatsapp</a></li>
              <li><a href="https://www.instagram.com/meuaconchego.byam/?hl=pt-br">Instagram</a></li>
          </h5>
        </div>
      </div>
    </center>
    
      <center>
        <div class="Mapa">
          <div style="height: 100%; width: 100%">
          <img src="./Imagens/Mapa.png" style="height: 100%; width: 100%" >
          </div>
        </div>
      </center>

      <center>
      <div class="FormasPag">
      <img src="./Imagens/Mercadopago.png" style="height: 100%; width: 100%" >
      </div>
      </center>
    </section>
  </footer>



  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
</body>

</html>