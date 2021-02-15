<?php

	session_start();

	if(isset($_SESSION["logado"]))
	{
		header("Location: samples/unicred.php");
	}
	

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">
	<link rel="stylesheet" href="resources/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="resources/css/styles.css">

	<title>2ª Via Boleto</title>
</head>
<body>
	<div id="login-area">
		<!-- Main Content -->	
		<div class="container-fluid">
			<div class="row main-content bg-success text-center">
				<div class="col-md-4 text-center company__info">
					<span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
					<!-- <img src="resources/images/logo-unimed.png" alt="logo-unicred" width="200" height="180"> -->
				</div>
				<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
					<div class="container-fluid-1">
							<br>
						<div class="row">
							<p><b>Para acessar a segunda via de seus boletos, <br> digite seu CPF e sua data de nascimento abaixo:</b></p>
							<br>
						</div>
						<div class="row">
							<form method="post" action="resources/funcs/validalogin.php" control="" class="form-group">
								<div class="input_log">
									<input type="text" class="form__input" onkeyup=validarCpf(this) name="cpf" placeholder="CPF" maxlength="14" autocomplete="on" id="cpf" required>
									<script> // script para inserir a mascara no campo cpf
										function validarCpf(entradaDoUsuario) {
												var cpf = entradaDoUsuario.value; // Passa para a variável 'cpf' o que o usuário digitar no formulário
												
												if (cpf.length === 3){                                                        // Quando a 	  string possuir 3 dígitos
													cpf += ".";                                                                 // Adiciona um hífen
													cpfMaiuscula = cpf.toUpperCase();                   // Passa a string para letras maiúsculas
													document.forms[0].cpf.value = cpfMaiuscula; // Coloca a nova string de volta no formulário
													return true;
												}
												if (cpf.length === 7){                                                        // Quando a string possuir 7 dígitos
													cpf += ".";                                                                 // Adiciona um hífen
													cpfMaiuscula = cpf.toUpperCase();                   // Passa a string para letras maiúsculas
													document.forms[0].cpf.value = cpfMaiuscula; // Coloca a nova string de volta no formulário
													return true;
												}
												if (cpf.length === 11){                                                        // Quando a string possuir 11 dígitos
													cpf += "-";                                                                 // Adiciona um hífen
													cpfMaiuscula = cpf.toUpperCase();                   // Passa a string para letras maiúsculas
													document.forms[0].cpf.value = cpfMaiuscula; // Coloca a nova string de volta no formulário
													return true;
												}
										}
									</script>
									<input type="date" name="nasc" onkeyup=validarNasc(this) class="form__input" placeholder="Data de Nascimento" id="nasc" required maxlength="10">		
									<script>
										function validarNasc(entradaDoUsuario) {
											var nasc = entradaDoUsuario.value; // Passa para a variável 'nasc' o que o usuário digitar no formulário
											
											if (nasc.length === 2){                                                        // Quando a string possuir 2 dígitos
												nasc += "/";                                                                 // Adiciona um hífen
												nascMaiuscula = nasc.toUpperCase();                   // Passa a string para letras maiúsculas
												document.forms[0].nasc.value = nascMaiuscula; // Coloca a nova string de volta no formulário
												return true;
											}
											if (nasc.length === 5){                                                        // Quando a string possuir 5 dígitos
												nasc += "/";                                                                 // Adiciona um hífen
												nascMaiuscula = nasc.toUpperCase();                   // Passa a string para letras maiúsculas
												document.forms[0].nasc.value = nascMaiuscula; // Coloca a nova string de volta no formulário
												return true;
											}
											if (nasc.length === 11){                                                      	 // Quando a string possuir 11 dígitos
												nasc += "/";                                                                 // Adiciona um hífen
												nascMaiuscula = nasc.toUpperCase();                   // Passa a string para letras maiúsculas
												document.forms[0].nasc.value = nascMaiuscula; // Coloca a nova string de volta no formulário
												return true;
											}
										}
										</script>
									<div class="row" style="margin-left: 35px;">
										<input type="submit" value="Acessar" class="btn" />		
									</div>
								</div>
								<!-- <div class="row">
									<input type="checkbox" name="remember_me" id="remember_me" class="">
									<label for="remember_me">Lembrar Dados!</label>
								</div> -->
							</form>
						</div>
						<div class="row">
							<p></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Footer -->
<script src="resources/js/index.js"></script>
</body>
</html>