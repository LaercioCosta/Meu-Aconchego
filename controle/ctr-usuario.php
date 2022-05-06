<?php
        require_once '../php/usuario.php';
        $objFunc = new Usuario();

            if(isset($_POST['validar'])){
                $email = $_POST['Login_Email'];
                $senha = $_POST['Login_Senha'];
                
                if($objFunc->validar($email, $senha)){
                    if($_SESSION['nivel'] == 'admin'){
                        $objFunc->redirect('../ContaAdmin.php');
                    }else{
                        $objFunc->redirect('../ContaCliente.php');
                    }
                }else{
                    $objFunc->redirect('../Entrar.php');
            }
    }

    if (isset($_POST['insert'])){
        $email = $_POST['txtEmail'];
        $senha= $_POST['txtSenha'];
        $nome = $_POST['txtNome'];
        $sobrenome = $_POST['txtSobrenome'];
        $nascimento = $_POST['txtNascimento'];
        if($objFunc->inserir($email, $senha, $nome, $sobrenome, $nascimento)){
            $objFunc->redirect('../AdmUser.php');
        }
    }

    if (isset($_POST['editar'])){
        $id = $_POST['editar'];
        $email = $_POST['txtEmail'];
        $senha= $_POST['txtSenha'];
        $nome = $_POST['txtNome'];
        $sobrenome = $_POST['txtSobrenome'];
        $nascimento = $_POST['txtNascimento'];
        $nivel = $_POST['txtNivel'];
        if($objFunc->editar($email, $senha, $nome, $sobrenome, $nascimento, $nivel, $id)){
            $objFunc->redirect('../AdmUser.php');
        }
    }

    if(isset($_POST['deletar'])){
        $id = $_POST['deletar'];
        if($objFunc->deletar($id)){
            $objFunc->redirect('../AdmUser.php');
        }
    }
?>