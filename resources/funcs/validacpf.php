<?php   
    $cpf = $_POST['cpf'];
    $nasc = $_POST['nasc'];
    $nasc = str_replace("-", "", $nasc);

        echo $cpf;
        echo "<br>";
        echo $nasc;
        echo "<br>";
        
        if($nasc >= 1000){

            echo "maior que 1000";

        }

        $cpf = $_POST['cpf'];
        $nasc = $_POST['nasc'];

        //nessa parte serao tiradas as mascaras dos inputs que vieram por POST
        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace("-", "", $cpf);

        $nasc = str_replace("-", "", $nasc);

        //funcao de validacao real do cpf aplicando a formula matematica
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

            if($nasc <= 19000101){

                return false;

            }

        }

        //nessa parte serao validados os retornos das funcoes e dependendo do retorno sera feito o login ou nao
        if(validaCPF($cpf) === false and validaNasc($nasc) === false){
            
            echo "<script>alert('CPF e Data Inseridos são Invalidos!, por favor digite novamente.');</script>";
            $url = '/boleto';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            
        }

        elseif(validaCPF($cpf) === false){
            
            echo "<script>alert('O CPF inserido é Inválido!, por favor digite novamente.');</script>";
            $url = '/boleto';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            
        }

        elseif(validaNasc($nasc) === false){

            echo "<script>alert('A data inserida é Inválida!, por favor digite novamente.');</script>";
            $url = '/boleto';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

        }

        else{
            header('Location: ../../samples/unicred.php');
        }
        
?>    
