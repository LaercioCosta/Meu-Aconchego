<?php
require_once './php/Produtos.php';
require_once './php/usuario.php';
$objproduto = new Produtos();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Meu Aconchego</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/secunStyle.css">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<style type="text/css">

</style>

<body onunload="myfunction()">

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
  <a href="./index.php"> <button class="button button1"><i class="fa fa-arrow-left"></i> Voltar ao início </button>
  </a>

  <div class="PainelProdutos">
     <div class="test">
      <div class="conteudo-categorias categorias">
          <text style="font-size:1.3em; color: white;"> Categorias</text>
          <hr>
          <div class="textos_categoria">
              <a href="#" class="w3-bar-item w3-button"><b>Pet</b></a><br>
              <a href="#" class="w3-bar-item w3-button"><b>Infantil</b></a><br>
              <a href="#" class="w3-bar-item w3-button"><b>Casa</b></a><br>
              <a href="#" class="w3-bar-item w3-button"><b>Mascaras</b></a><br>
              <a href="#" class="w3-bar-item w3-button"><b>Acessórios</b></a><br>
          </div>
        </div>
      </div>
      <div class="test">
        <div class="ListaProdutos">
          <div class="row row-cols-5 row-cols-md-5" style="display:flex; justify-content:center; margin-top: -150px">
            <?php
                $queryPodutos = ("SELECT * FROM produto ORDER BY id_Produto DESC");
                $stmt = $objproduto -> runQuery($queryPodutos);
                $stmt -> execute();
                $calcular = 0;          
                while($calcular <= 12){
                  if(($fecthProduto = $stmt->fetchObject())) {
              ?>
                <div class="col-lg-4">
                  <div style="margin-bottom: 10vh; margin-right: 20px; ">
                  <div class="cartao_Novidades" style="width: 95%; margin-top: 15px;">
                  <div style="width: 100%; height: 100%;">
                    <img style="width: 100%; height: 40vh;" src="./fotosProdutos/<?php echo $fecthProduto->imagen;?>" class="Primeira_imagem">
                    </div>
                    <div class="corpo_Cartao">
                      <div class="cor_Cartao_Ocul">
                        <a href="produtos.php?produtoid=<?php echo $fecthProduto->id_Produto; ?>" class="btn_AddCarrinho">
                          <center><button style="width:100%">Mais Detalhes</button></center>
                        </a>
                        <h5>
                          <center>R$: <?php echo number_format($fecthProduto->valor, 2 , ',' , '.'); ?> </center>
                        </h5>
                      </div>
                      <hr>
                      <center>
                        <h5 class="titulo_Cartao"><?php echo $fecthProduto->nome; ?></h5>
                      </center>
                    </div>
                  </div>
                  </div>
                </div>
            <?php } $calcular++; } ?>
          </div>
          </center>
        </div>
      </div>
      </div>


      <br>
      <footer style="margin-top: 10vh; bottom: 100; " >
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







  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

</body>

</html>