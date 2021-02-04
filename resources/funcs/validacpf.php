<?php
        $cpf = $_POST['cpf'];

        $cpf = str_replace(".", "", $cpf);
        $cpf = str_replace("-", "", $cpf);

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

        if(validaCPF($cpf) === false){

            echo "<script>alert('CPF Inválido!, por favor digite novamente');</script>";
            $url = '/boleto';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            
        }

        else{

            header('Location: ../../samples/unicred.php');

        }
        
?>    
