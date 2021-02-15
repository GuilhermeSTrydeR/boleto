<?php

    
    //passando para as variaveis o que foi recebido por POST

    $cpf = $_POST['cpf'];
    $nasc = $_POST['nasc'];

    $_SESSION['cpf'] = $cpf;
    $_SESSION['nasc'] = $nasc;

    //nessa parte serao tiradas as mascaras dos inputs que vieram por POST
    $cpf = str_replace(".", "", $cpf);
    $cpf = str_replace("-", "", $cpf);

    $nasc = str_replace("-", "", $nasc);

    //aqui serao atribuidas as variaves nas variaveis de sessao
    

    // funcao de validacao real do cpf aplicando a formula matematica
    function validaCPF($cpf) {
        if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
            
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
        
    }

    //funcao para validar e entrada do usuario no campo nasc 'data de nascimento' se a data for igual ou menor a 01/01/1900 será retornado falso
    function validaNasc($nasc){

        $data_minima = date('Y/m/d');
        $data_minima = str_replace("/", "", $data_minima);
        $data_minima = ($data_minima - 1300000);

        
        $data_maxima = date('Y/m/d');
        $data_maxima = str_replace("/", "", $data_maxima);

        $data_minima = intval($data_minima);
        $data_maxima = intval($data_maxima);

        if(($nasc < $data_minima) || ($nasc > $data_maxima)){

            return false;

        }
    }

    //nessa parte serao validados os retornos das funcoes e dependendo do retorno sera feito o login ou nao
    if(validaCPF($cpf) === false and validaNasc($nasc) === false){
        
        echo "<script>alert('CPF e Data Inseridos são Invalidos!, por favor digite novamente.');</script>";
        $url = '/';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
        
    }

    elseif(validaCPF($cpf) === false){
        
        echo "<script>alert('O CPF inserido é Inválido!, por favor digite novamente.');</script>";
        $url = '/';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
        
    }

    elseif(validaNasc($nasc) === false){

        echo "<script>alert('A data inserida é Inválida!, por favor digite novamente.');</script>";
        $url = '/';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    }

    else{
        session_start();
        $_SESSION['logado'] = 1;
        header('Location: ../../samples/unicred.php');
    }
        
?>    
