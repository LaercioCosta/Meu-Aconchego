<?php
require_once './php/Produtos.php';
$objproduto = new Produtos();
include './controle/protecAdm.php'
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Meu Aconchego</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
  <link rel="stylesheet" href="./css/secunStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

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
  </header>
      <br>
      <br>
      <center>
        <h3>Produtos</h3>
      </center>
      <br>
      <table class="table table-striped;">

        <thead>
          <tr>
            <th colspan="7"class="btn_AddCarrinho">
              <center>
                <button type="button" class="btn btn-primary" data-toggle="modal" 
                data-target="#myModalCadastrar" style="width: 190px;">Cadastrar Produto</button>

                <a href="./ContaAdmin.php">
                  <button class="button button1" style="width: 100px"><i class="fa fa-arrow-left"></i> Voltar</button>
                </a>
              </center>
            </th>
          </tr>
          <tr>
            <th>Id</th>
            <th>Produto</th>
            <th>valor</th>
            <th>Quantidade</th>
            <th>Descrição</th>
            <th>Editar</th>
            <th>Deletar</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "select * from produto";
          $stmt =  $objproduto->runQuery($query);
          $stmt->execute();

          while ($objproduto = $stmt->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <tr class="btn_AddCarrinho">
              <td><?php echo ($objproduto['id_Produto']) ?></td>
              <td><?php echo ($objproduto['nome']) ?></td>
              <td><?php echo ($objproduto['valor']) ?></td>
              <td><?php echo ($objproduto['quantidade']) ?></td>
              <td><?php echo ($objproduto['descricao']) ?></td>
              <td>
                <button class="btn btn-primary" 
                data-toggle="modal" 
                data-target="#myModalEditar" 
                data-id="<?php echo ($objproduto['id_Produto']) ?>" 
                data-nome="<?php echo ($objproduto['nome']) ?>" 
                data-valor="<?php echo ($objproduto['valor']) ?>" 
                data-quantidade="<?php echo ($objproduto['quantidade']) ?>"
                data-descricao="<?php echo ($objproduto['descricao']) ?>">Editar</button>

              </td>
              <td>
                <button class="btn btn-danger" 
                data-toggle="modal" 
                data-target="#myModalDeletar" 
                data-id="<?php echo ($objproduto['id_Produto']) ?>" 
                data-nome="<?php echo ($objproduto['nome']) ?>">Deletar</button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    
  
  </div>

  <!-- The Modal Cadastrar-->
  <div class="modal" id="myModalCadastrar">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header" style="background-color: black; color: white;">
          <h4 class="modal-title">Cadastrar Produto</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="./controle/ctr-produtos.php" method="POST" enctype="multipart/form-data">
            <!--ocutando o formulário-->
            <!-- Atribuição do id="editar" -->
            <input type="hidden" name="insert" id="cadastrar">
        </div>
        <div class="form-group">
          <label for="">Nome</label>
          <input type="text" class="form-control" name="txtnome" required>
        </div>
        <div class="form-group">
          <label for="">Valor</label>
          <input type="text" class="form-control" name="txtValor" required>
        </div>
        <div class="form-group">
          <label for="">Quantidade</label>
          <input type="text" class="form-control" name="txtQuantidade" required>
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <textarea  type="text" cols="40" rows="5" class="form-control" name="txtDescricao" required> </textarea>
        </div>
        <div class="form-group">
          <label for="">Imagem do Produto</label><br>
          <label for="">Arquivos supotado: JPG, JPEG, PNG</label>
          <input type="file" class="form-control" name="fileFoto" id='' required>
        </div>
        <button type="submit" class="btn btn-success">Enviar </button>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
        </form>
      </div>
    </div>
  </div>



  <!-- The Modal Editar-->
  <div class="modal" id="myModalEditar">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header" style="background-color: black; color: white;">
          <h4 class="modal-title">Editar</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="./controle/ctr-produtos.php" method="POST">
            <input type="hidden" name="editar" id="recipient-id">
            <div class="form-group">
              <label for="">nome</label>
              <input type="text" class="form-control" name="txtnome" id="recipient-nome" required>
            </div>
            <div class="form-group">
              <label for="">Valor</label>
              <input type="text" class="form-control" name="txtValor" id="recipient-valor" required>
            </div>
            <div class="form-group">
              <label for="">Quantidade</label>
              <input type="text" class="form-control" name="txtQuantidade" id="recipient-quantidade" required>
            </div>
            <div class="form-group">
              <label for="">Descrição</label>
              <textarea  type="text" cols="40" rows="5" class="form-control" name="txtDescricao" id="recipient-descricao" required> </textarea>
            </div>
            <button type="submit" class="btn btn-success">Editar</button>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- The Modal Deletar-->
  <div class="modal" id="myModalDeletar">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header" style="background-color: black; color: white;">
          <h4 class="modal-title">Deletar</h4>
          <!-- <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>-->
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="./controle/ctr-produtos.php" method="POST">
            <input type="hidden" name="deletar" id="recipient-id">
            <div class="form-group">
              <label for="">Produto:</label>
              <input type="text" class="form-control" name="txtnome" id="recipient-nome" required>
            </div>
            <button type="submit" class="btn btn-success">Deletar</button>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    $('#myModalEditar').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var recipientId = button.data('id')
      var recipientnome = button.data('nome')
      var recipientValor = button.data('valor')
      var recipientQuantidade = button.data('quantidade')
      var recipientDescricao = button.data('descricao')


      var modal = $(this)
      modal.find('#recipient-id').val(recipientId)
      modal.find('#recipient-nome').val(recipientnome)
      modal.find('#recipient-valor').val(recipientValor)
      modal.find('#recipient-quantidade').val(recipientQuantidade)
      modal.find('#recipient-descricao').val(recipientDescricao)

    })
  </script>

  <script>
    $('#myModalDeletar').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      var recipientId = button.data('id')
      var recipientnome = button.data('nome')

      var modal = $(this)
      modal.find('#recipient-id').val(recipientId)
      modal.find('#recipient-nome').val(recipientnome)

    })
  </script>

</body>

</html>