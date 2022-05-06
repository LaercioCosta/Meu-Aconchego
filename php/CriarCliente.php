<?php
require_once 'usuario.php';
$objFunc = new Usuario();

//Esse arquivo é utilizado para os usuario comun ciar suas conta 

if (isset($_POST['insert'])){
    $email = $_POST['txtEmail'];
    $senha= $_POST['txtSenha'];
    $nome = $_POST['txtNome'];
    $sobrenome = $_POST['txtSobrenome'];
    $nascimento = $_POST['txtNascimento'];
    if($objFunc->inserir($email, $senha, $nome, $sobrenome, $nascimento)){
        $objFunc->redirect('../ContaCliente.php');
    }
}