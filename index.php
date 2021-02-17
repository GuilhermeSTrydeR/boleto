<?php 
    session_start();

    if (isset($_SESSION['logado'])){

        header("Location: samples/unicred.php");
        exit();
    }

    else{

        header("Location: inicio.php");
        exit();

    }
?>