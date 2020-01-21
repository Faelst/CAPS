
<?php 
session_start();
include ("./php/verificacaoLogin.php"); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>CAPS - CONTROL ACTIVATION PROCEDURES SUPPORT</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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

  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100 img-background" style="background-image: url('images/bg-02.png'); background-size: 100%; ">
			<div class="wrap-login100 p-t-30 p-b-50" style="width: 695px;">
				<span class="login100-form-title p-b-41">
					<img src="images/logo.png"/>
				</span>
				
				<form id="cadastrarTecnico" class="login100-form validate-form p-b-33 p-t-5 f-login">
                    
                    <div class="container" style=" width: 690px;margin-left: 0px;margin-right: 0px;">
                        
                        
                            <div class="panel panel-default" style="border-color: orange;">
                                <div class="panel-heading" style="border-color: orange;">
                                        <h3 class="panel-title">Cadastrar Tecnico </small></h3>
                                         </div>
                                         <div class="panel-body">
                                        
                                         <div class="input-group" style="padding-bottom: 12px;">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="" style="font-size: 11px">Nome Completo:</span>
                                             </div>
                                            <input id="nome" type="text" class="form-control" placeholder="Nome" name="nome" value="">
                                            <input id="sobreNome" type="text" class="form-control" placeholder="Sobrenome" name="sobrenome" value="">
                                          </div>
                
                                              <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                  <label class="input-group-text" for="inputGroupSelect01" style="font-size: 11px">Cidade: </label>
                                                </div>
                                                <select class="custom-select" id="inputGroupSelect01" style="height: 33.5px;" name="cidade">
                                                  <option value="0">Selecionar...</option>
                                                  <option value=1>Jacarei</option>
                                                  <option value=2>SJC</option>
                                                  <option value=3>Guararema</option>
                                                  <option value=4>Campos</option>
                                                  <option value=5>Taubate</option>
                                                  <option value=6>Caçapava</option>
                                                  <option value=7>Pinda</option>
                                                  <option value=8>Roseira</option>
                                                  <option value=9>Mogi</option>
                                                </select>
                                              </div>
                                              
                
                                              <div class="form-group purple-border">
                                                
                                                <textarea class="form-control" id="exampleFormControlTextarea4" placeholder="Observações Sobre o Tecnico" rows="4" name="obs"></textarea>
                                              </div>
                                              
                                              <button class="login100-form-btn" id="btnCadastrarTecnico" style="font-size: 1.3rem">Cadastrar Tecnico</button>
                                        
                                       
                                    </div>
                                </div>
                           
                        
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
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/CadastrarTecnico.js"></script>
</body>
</html>