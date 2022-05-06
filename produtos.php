<?php
require_once './php/Produtos.php';
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <style type="text/css">
        .flex-container {
            display: flex;
            background-color: #f1f1f1;
        }

        .flex-container>div {
            background-color: DodgerBlue;
            color: white;
            width: 100px;
            margin: 10px;
            text-align: center;
            line-height: 75px;
            font-size: 30px;
        }

        .zoom {
            padding: 10px;
            transition: transform .3s;
            justify-content: center;
            margin-top: 20px;

        }

        .zoom:hover {
            transform: scale(1.3);
        }

        #conteudos {
            display: flex;
            flex-direction: row;
            margin-top: 30px;

        }

        .conteudo-categorias {
            margin-left: 20px;
            width: 10%;
            text-align: center;

        }

        .conteudo-venda {
            display: flex;
            flex-direction: row;
            text-align: center;
            margin-left: 1vh;
            width: 100%;


        }

        .venda1 {
            margin-left: 1px;
            width: 100%;
            height: 500px;

        }

        .venda2 {
            width: 100%;
            height: 500px;
        }


        .produtos-conteudo>h1 {
            margin: 10;
            font-size: 32px;

        }

        .produtos-conteudo>p {
            margin-top: 20px;
            font-size: 16px;
        }

        .produtos-preco .produtos-stars>svg {
            margin-top: 20px;
            fill: yellow;
        }

        .produtos-preco>strong {
            font-size: 40px;
        }

        .produtos-preco>form {
            font-weight: 100;
        }

        .produtos-preco .produtos-stars svg,
        strong span,
        form {
            font-size: 16px;
        }

        .conteudo-descricao {
            margin: 20px;
            width: 1720px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Meu Aconchego</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                                            <a href="#" class="dropdown-toggle-hide" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bars" style="float: left;"></i>
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
                                            <a id="Conta2" class="dropdown-toggle-hide" data-toggle="dropdown" role="button" aria-expanded="false">
                                                <?php if (isset($_SESSION['id'])) {
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
                                        <?php } else { ?>
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
  <a href="./index.php"> <button class="button button1"> Voltar ao início </button>
  </a>


        <article id="conteudos">


            <!--Conteudo venda-->
            <div class="conteudo-venda">
                <div class="container">
                    <?php
                    $id_produto = (int)$_GET['produtoid'];
                    $produto_solo = ("SELECT * FROM produto WHERE id_Produto = ?");
                    $produto_solo = $objproduto->runQuery($produto_solo);
                    $produto_solo->execute(array($id_produto));

                    while ($dados_produto = $produto_solo->fetchObject()) {

                    ?>
                        <!-- Page Heading -->

                        <!-- /.row -->

                        <div class="produto_solo row">
                            <div class="col-lg-6 mb-4">

                                <div class="venda1">
                                    <!-- inicio venda -->
                                    <!-- imagem do produto -->

                                    <div>
                                        <!-- Carousel -->
                                        <div id="Carrosel">
                                            <div id="demo" class="carousel slide" data-bs-ride="carousel" style="width: 100%;">

                                                <!-- Indicators/dots -->
                                                <div class="carousel-indicators ">
                                                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                                                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                                                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                                                </div>

                                                <!-- The slideshow/carousel -->
                                                <div class="carousel-inner" style="width: 100%; ">
                                                    <div class="carousel-item active">
                                                        <img class="zoom" src="./fotosProdutos/<?php echo $dados_produto->imagen; ?>" alt="" class="d-block" style="width:100%; height: 45vh;">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="zoom" src="./fotosProdutos/<?php echo $dados_produto->imagen; ?>" alt="" class="d-block" style="width:100%; height: 45vh;">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="zoom" src="./fotosProdutos/<?php echo $dados_produto->imagen; ?>" alt="" class="d-block" style="width:100%; height: 45vh;">
                                                    </div>
                                                </div>

                                                <!-- Left and right controls/icons -->
                                                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon"></span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon"></span>
                                                </button>
                                            </div>


                                        </div>


                                    </div>


                                </div>

                            </div> <!--  final venda -->


                            <div class="col-lg-6">
                                <div class="venda2">
                                    <section class="col-md-12 mb-3 d-flex flex-column justify-content-around" style="border: 1px solid white;">
                                        <article class="produtos-conteudo">
                                            <h2>
                                                <?php echo $dados_produto->nome ?>
                                            </h2>
                                        </article>

                                        <article class="produtos-preco">
                                            <div class="produtos-stars">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>

                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>

                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>

                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>

                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                            </div>

                                            <strong>
                                                R$:<?php echo number_format($dados_produto->valor, 2, ',', '.'); ?>
                                                <span class="d-block">Em até 12x sem Juros</span>
                                            </strong>

                                            <form action="#">
                                                <div class="form-group">
                                                    <label for="produtos-quantidade-itens" style="margin-top: 20px;">Quantidade</label>
                                                    <select class="form-control" id="produtos-quantidade-itens">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>


                                                <div class="form-group" class="form-group qty-select row">
                                                    <label for="produtos-quantidade-itens"> cor:</label>
                                                    <select class="form-control" id="produtos-quantidade-itens">
                                                        <div id="206919" name="206919" class="form-control prod-options">
                                                            <option data-variant-stock="999" data-variant-id="2478881" value="687718">Cinza
                                                            </option>
                                                            <option data-variant-stock="999" data-variant-id="2478882" value="687719">Preto
                                                            </option>
                                                        </div>
                                                    </select>
                                                </div>
                                            </form>
                                        </article>

                                    </section>


                                </div>


                            </div>

                            <form action="carrinho.php" method="POST" enctype="multipart/form-data" style="margin-top: -2vh;">
                                <input type="hidden" name="qtd" value="1" size="3">
                                <input type="hidden" name="id" value="<?php echo $id_produto; ?>">
                                <input type="hidden" name="acao" value="add">
                                <input type="submit" name="comprar" value="Adicionar ao Carrinho" class="btnAddCart">
                            </form>

                        </div>
                    
                </div>
            </div>
        </article>

        <div class="conteudo-descricao">
            <div class="product_tabs">
                <ul class="nav nav-tabs">

                    <li class="active">
                        <a href="#tab-description" data-toggle="tab" aria-expanded="true">
                            Descrição do produto
                        </a>
                    </li>

                    <li class="">
                        <a href="#tab-specification" data-toggle="tab" aria-expanded="false">
                            Especificações
                        </a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab-description">
                        <p>
                        <?php echo $dados_produto->descricao ?>    
                        </p>
                        <?php } ?>
                    </div>

                    <div class="tab-pane" id="tab-specification">
                        <table class="table table-bordered">


                            <tbody>
                                <tr>
                                    <td>Lorem ipsum</td>
                                    <td>Lorem ipsum</td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum</td>
                                    <td>Lorem ipsum</td>
                                </tr>
                            </tbody>

                            <thead>
                                <tr>
                                    <td colspan="2"><strong>Lorem ipsum</strong></td>
                                </tr>
                            </thead>

                            <thead>
                                <tr>
                                    <td colspan="2"><strong>Lorem ipsum</strong></td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Lorem ipsum</td>
                                    <td>Lorem ipsum</td>
                                </tr>

                                <tr>
                                    <td>Lorem ipsum</td>
                                    <td>Lorem ipsum</td>
                                </tr>
                            </tbody>

                        </table>

                    </div>

                    <div class="tab-pane product-reviews" id="tab-review">
                        <form class="form-horizontal" id="form-review">
                            <div id="review">
                                <table class="table table-striped table-bordered">
                                    <tbody>

                                        <tr>
                                            <td style="width: 50%;"><strong>Cooper</strong></td>
                                            <td class="text-right">03/12/2014</td>
                                        </tr>

                                        <tr>

                                            <td colspan="2">
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
                                                    varius leo eu neque fringilla, in commodo quam blandit. Praesent
                                                    urna mauris, sollicitudin et ipsum a, faucibus dignissim quam. Cras
                                                    et urna in lacus aliquam interdum nec nec lorem. Sed eget ipsum at
                                                    metus convallis aliquet.
                                                </p>

                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>




        <br><br>
        <footer style="margin-top: 20vh;" >
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
      <div style="height: 100%; width: 100%">
      <img src="./Imagens/Mercadopago.png" style="height: 10%; width: 100%" >
            </div>
      </div>
      </center>
    </section>
  </footer>


        <!-- partial -->
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    </body>

    </html>