<?php session_start();

    if(!isset($_POST['cpf']) && !isset($_POST['nasc'])){

        header("Location: /");

    }
    
    //o cpf e a data de nascimento recebidos do formulario sao enviados as suas respectivas variaveis
    $cpf = $_POST['cpf'];
    $nasc = $_POST['nasc'];

    //as variaveis de ssessao recebem os dados
    $_SESSION['cpf'] = $cpf;
    $_SESSION['nasc'] = $nasc;

    //nessa parte serao tiradas as mascaras dos inputs que vieram por POST
    $cpf = str_replace(".", "", $cpf);
    $cpf = str_replace("-", "", $cpf);

    $nasc = str_replace("-", "", $nasc);

    // funcao de validacao real do cpf aplicando a formula matematica
    function validaCPF($cpf) {
        if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
            
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    //funcao para validar e entrada do usuario no campo nasc 'data de nascimento' se a data for igual ou menor a 01/01/1900 será retornado falso
    function validaNasc($nasc){

        //aqui recebemos a data de hoje e consequentemente ela tiramos as barras '/' para consequentemente aplicar a regra para definir a idade maxima de login no sistema
        $data_minima = date('Y/m/d');
        $data_minima = str_replace("/", "", $data_minima);

        //regra definida para login foi de 130 anos, podendo ser alterada a quelauqer momento ex: AAA/MM/DD 100 anos seria: 100/00/00 consequentemente: 1000000
        $data_minima = ($data_minima - 1300000);

        //data maxima recebe a data de hoje
        $data_maxima = date('Y/m/d');
        $data_maxima = str_replace("/", "", $data_maxima);

        //nessa parte pegamos o valor da variavel $idade_minima e convertemos para inteiro, afim de aplicar a regra abaixo
        $data_minima = intval($data_minima);
        $data_maxima = intval($data_maxima);

        //se data de nascimento for maior que o dia atual ou menor que 130 anos a contar no dia de hoje, é retornado falso
        if(($nasc < $data_minima) || ($nasc > $data_maxima)){

            return false;

        }
    }

    //nessa parte serao validados os retornos das funcoes e dependendo do retorno sera feito o login ou nao

    //se o cpf não existir(matematicamente) ou a  funcao da data de nascimento retornou falso(data de nascimento passando os limites min. e max., sera retornado mensagem de erro sera retornado a pagina inicial)
    if(validaCPF($cpf) === false and validaNasc($nasc) === false){
        
        echo "<script>alert('CPF e Data Inseridos são Invalidos!, por favor digite novamente.');</script>";
        $url = '/';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
        
    }

    //se o cpf não existir(matematicamente) sera exibido a tela de erro e retornado a pagina inicial
    elseif(validaCPF($cpf) === false){
        
        echo "<script>alert('O CPF inserido é Inválido!, por favor digite novamente.');</script>";
        $url = '/';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
        
    }

    //se a data de nascimento estiver fora dos limites min. e max. sera exibido erro e retornado para a pagina inicial
    elseif(validaNasc($nasc) === false){

        echo "<script>alert('A data inserida é Inválida!, por favor digite novamente.');</script>";
        $url = '/';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    }

    //se nenhuma das alternativas acima forem satisfeitas, a variavel de sessao ($_SESSION['logado']) responsavel por validar a sessao ativa recebera o valor 1 para que as condicoes de validacao mais a frente sejam satisfeitas, depois sera redirecionado para a pagina responsavel por exibir a lista de boletos
    else{
        $_SESSION['logado'] = 1;
        header('Location: ../../samples/unicred.php');
        exit();
    }

?>    
