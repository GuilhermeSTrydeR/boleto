<?php session_start();

    // $_SESSION['logado'] = 1;

    if (isset($_SESSION['logado'])){

        header("Location: samples/unicred.php");
        exit();
    }

    else{

        header("Location: inicio.php");
        exit();

    }
?>