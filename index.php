<?php

    
    if (!isset($_SESSION['logado'])) {
        session_start();
        include('inicio.php');
    }

    else{

        header("Location: samples/unicred.php");
        exit();

    }

?>