<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

   <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
   <meta http-equiv="Pragma" content="no-cache">
   <meta http-equiv="Expires" content="0">

   <title>CAPS - CONTROL ACTIVATION PROCEDURES SUPPORT</title>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="images/favicon.png" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100 img-background" style="background-image: url('images/bg-02.png'); background-size: 100%; ">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					<img src="images/logo.png"/>
				</span>
				
				<form class="login100-form validate-form p-b-33 p-t-5 f-login">

					<div class="wrap-input100 validate-input" data-validate = "Digite o usuário corretamente">
                            <input id="nomeUsuario" class="input100" type="text" name="username" placeholder="Usuario" >
                            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        </div>
    
                        <div class="wrap-input100 validate-input" data-validate="Digite a senha corretamente">
                            <input id="senhaAtual" class="input100" type="password" name="pass" placeholder="Senha atual">
                            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Digite a senha corretamente">
                                <input id="novaSenha" class="input100" type="password" name="pass" placeholder="Nova Senha">
                                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Digite a senha corretamente">
                                    <input id="confirmarSenha" class="input100" type="password" name="pass" placeholder="Confirmar Senha">
                                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                                </div>

                        <div class="container-login100-form-btn m-t-32">
                            <button id="btnAlterarSenha" class="login100-form-btn">Alterar Senha</button>
                        </div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

    <script src="js/AlterarSenha.js"></script>

</body>
</html>