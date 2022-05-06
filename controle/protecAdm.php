<?php
    if(!isset($_SESSION)){
        session_start();
    }if(!isset($_SESSION['id'])){
        session_destroy();
        header('Location: ./Entrar.php');
    }elseif($_SESSION['nivel'] == 'cliente'){
        header('Location: ./ContaCliente.php');
    }
?>