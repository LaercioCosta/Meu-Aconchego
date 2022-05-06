<?php
require_once './php/usuario.php';
$objFunc = new Usuario();
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
    <center>
    <h3>Usuários</h3>
    </center>
    <br>
    <table class="table table-striped">
    <thead>
        <tr>
            <th colspan="8"class="btn_AddCarrinho">
                <center>
                    <button type="button" style="text-align: center;" 
                    data-toggle="modal" data-target="#myModalCadastro" style="width: 190px;" >Cadastrar Usuário
                    </button>
                    <a href="./ContaAdmin.php">
                  <button class="button button1" style="width: 100px"><i class="fa fa-arrow-left"></i> Voltar</button>
                </a>
                </center>
            </th>
        </tr>

            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Nascimento</th>
                <th>Data do Cadastro</th>
                <th>Editar</th>
                <th>Deleta</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $query = "select * from tb_cliente";
            $stmt = $objFunc->runQuery($query);
            $stmt->execute();
            while ($objFunc = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>

                <tr class="btn_AddCarrinho">

                    <td><?php echo ($objFunc['id']) ?></td>
                    <td><?php echo ($objFunc['email']) ?> </td>
                    <td><?php echo ($objFunc['nome']) ?> </td>
                    <td><?php echo ($objFunc['sobrenome']) ?> </td>
                    <td><?php echo ($objFunc['nascimento']) ?> </td>
                    <td><?php echo ($objFunc['data_cadastro']) ?> </td>
                    <td>
                        <button class="btn btn-primary" type="button" 
                        data-toggle="modal" 
                        data-target="#myModalEditar" 
                        data-id="<?php echo ($objFunc['id']) ?>" 
                        data-nome="<?php echo ($objFunc['nome']) ?>" 
                        data-sobrenome="<?php echo ($objFunc['sobrenome']) ?>" 
                        data-email="<?php echo ($objFunc['email']) ?>" 
                        data-nascimento="<?php echo ($objFunc['nascimento']) ?>" 
                        data-tipo_user="<?php echo ($objFunc['tipo_user']) ?>">Editar</button>
                    </td>
                    <td>
                        <Button class="btn btn-danger" data-toggle="modal" data-target="#myModalDeletar">Deletar</Button>
                    </td>

                </tr>

            <?php } ?>

        </tbody>
    </table>







    <!-- Modal Cadastrar usuario -->
    <div class="modal fade" id="myModalCadastro">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" style="background-color: rgb(18, 52, 80); color:white">
                    <h4 class="modal-title">Cadastrar Funcionario</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="./controle/ctr-usuario.php" method="POST">
                        <input type="hidden" name="insert">
                        <div class="form-group">
                            <label for="">Email</label><br>
                            <input type="email" class="from-control" name="txtEmail" id="recipiente-Email" required>
                        </div>
                        <div class="form-group">
                            <label for="">Senha</label><br>
                            <input type="password" class="from-control" name="txtSenha" id="recipiente-Senha" required>
                        </div>
                        <label for="">Nome</label><br>
                        <input type="text" class="from-control" name="txtNome" id="recipiente-Nome" required>
                </div>
                <div class="form-group">
                    <label for="">Sobrenome</label><br>
                    <input type="text" class="from-control" name="txtSobrenome" id="recipiente-Sobrenome" required>
                </div>
                <div class="form-group">
                    <label for="">Nascimento</label><br>
                    <input type="date" class="from-control" name="txtNascimento" id="recipiente-Nascimento" required>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>

            <!-- Modal footer -->


        </div>
    </div>
    </div>


    <!-- Modal Editar Funcionario -->
    <div class="modal fade" id="myModalEditar">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" style="background-color: rgb(18, 52, 80); color:white">
                    <h4 class="modal-title">Editar Usuario</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="./controle/ctr-usuario.php" method="POST">
                        <input type="hidden" name="editar" id="recipiente-id">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Email</label><br>
                                <input type="email" class="from-control" name="txtEmail" id="recipiente-Email" required>
                            </div>
                            <div class="form-group">
                                <label for="">Senha</label><br>
                                <input type="password" class="from-control" name="txtSenha" id="recipiente-Senha" required>
                            </div>
                            <label for="">Nome</label><br>
                            <input type="text" class="from-control" name="txtNome" id="recipiente-Nome" required>
                        </div>
                        <div class="form-group">
                            <label for="">Sobrenome</label><br>
                            <input type="text" class="from-control" name="txtSobrenome" id="recipiente-Sobrenome" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nascimento</label><br>
                            <input type="date" class="from-control" name="txtNascimento" id="recipiente-Nascimento" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nivel do Usuario</label><br>
                            <select class="form-control" name="txtNivel" id="recipiente-Nivel" required>
                                <option>admin</option>
                                <option>cliente</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Modal Deletar Usuario -->
    <div class="modal fade" id="myModalDeletar">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" style="background-color: rgb(18, 52, 80); color:white">
                    <h4 class="modal-title">Deletar Usuario</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="./controle/ctr-usuario.php" method="POST">
                        <input type="hidden" name="deletar" id="recipiente-id">
                        <div class="form-group">
                            <label for="">Email</label><br>
                            <input type="email" class="from-control" name="txtEmail" id="recipiente-Email" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script>
        //Script Para editar usuario
        $('#myModalEditar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipienteId = button.data('id')
            var recipienteEmail = button.data('email')
            var recipienteSenha = button.data('senha')
            var recipienteNome = button.data('nome')
            var recipienteSobrenome = button.data('sobrenome')
            var recipienteNascimento = button.data('nascimento')
            var recipienteTipo_User = button.data('tipo_user')

            var modal = $(this)
            modal.find('#recipiente-id').val(recipienteId)
            modal.find('#recipiente-Email').val(recipienteEmail)
            modal.find('#recipiente-Senha').val(recipienteSenha)
            modal.find('#recipiente-Nome').val(recipienteNome)
            modal.find('#recipiente-Sobrenome').val(recipienteSobrenome)
            modal.find('#recipiente-Nascimento').val(recipienteNascimento)
            modal.find('#recipiente-Nivel').val(recipienteTipo_User)
        })
    </script>

    <script>
        //Script para deletar usuario
        $('#myModalDeletar').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipienteId = button.data('id')
            var recipienteEmail = button.data('email')

            var modal = $(this)
            modal.find('#recipiente-id').val(recipienteId)
            modal.find('#recipiente-Email').val(recipienteEmail)
        })
    </script>

</body>

</html>