<?php 
session_start();
include ("./php/verificacaoLogin.php"); 
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">

	<title>Controle de Ativação</title>
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<!--AUTOCOMPLETE CSS===============================================================================================-->
	
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css">  
	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">

</head>

<body>
	<div class="limiter">
		<div class="container-login100 img-background" style="background-image: url('images/bg-main.png'); background-size: 100%; ">
			<div class="wrap-login100 p-t-30 p-b-50">
			<span class="login100-form-title p-b-41">
					<img src="images/logo.png"/>
				</span>

				<form method="post" id="cadProcedimento" class="login100-form validate-form p-b-33 p-t-5">
					<main class="my-form">

						<div class="cotainer">
							<div class="row justify-content-center">
								<div class="col-md-9">
									<div class="card">
										<div class="card-header text-center">
											<Span class="span-size"> Cadastrar Procedimento </Span>
											<h1 style="font-size: 17px;margin-top: 11px;padding-left: 3px;">
												Usuário: <?php print_r($_SESSION['usuario']);?>
											</h1>
										</div>
										<div class="card-body">
											<div class="form-group row">
												<label for="user_name"
													class="txtNegrito col-md-4 col-form-label text-md-right validaHora">Horario
													da Solicitação</label>
												<div class="col-md-6 data-picker"
													style="padding-right: 0px; padding-left: 29px;">
													<div class="row">
														<div class='col-sm-6'>
															<div class="form-group">
																<div class='input-group date' id='datetimepicker3'>
																	<input name="timepicker4" id="timepicker4"
																		type="time" class="form-control dataPicker"
																		min="00:00" max="23:00">

																</div>
															</div>
														</div>

													</div>

												</div>
											</div>



											<div class="form-group row">
												<label for="full_name"
													class="txtNegrito nomeTecnico col-md-4 col-form-label text-md-right">Nome
													do Técnico</label>
												<div class="col-md-6">
													<input type="text" name='nomeTecnico' id="nomeTecnico"
														class="form-control" autocomplete="off">
												</div>
											</div>

											<div class="form-group row" style="margin-bottom: 0px;">
												<label for="email_address" id="labelProced"
													class="txtNegrito col-md-4 col-form-label text-md-right labelProced">Tipo
													de Procedimento</label>
												<div class="col-md-6">
													<div class="form-group">
														<select class="form-control" name="selectProcedimento"
															id="selectProcedimento">
															<option value="0">Selecione</option>
															<option value="1">Ativação</option>
															<option value="2">Manutenção</option>
															<option value="3">Migração</option>
															<option value="4">Mud. de Endereço</option>
															<option value="5">Auxilio Tecnico</option>
															<option value="6">Outros</option>
														</select>
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label for="phone_number"
													class="txtNegrito col-md-4 col-form-label text-md-right nomeCliente">Nome
													do Cliente</label>
												<div class="col-md-6">
													<input type="text" name="nomeCliente" id="nomeCliente"
													autocomplete="off"	class="form-control">
												</div>
											</div>

											<div class="form-group row" style="margin-bottom: 0px;">
												<label for="email_address"
													class="txtNegrito col-md-4 col-form-label text-md-right selectCidade">Cidade</label>
												<div class="col-md-6">
													<div class="form-group">
													
														<select class="form-control" name="selectCidade"
															id="selectCidade">
															<option value="0">Selecione</option>
															<option value="1">Jacarei</option>
															<option value="2">São Jóse dos Campos</option>
															<option value="3">Guararema</option>
															<option value="4">Campos do Jordão</option>
															<option value="5">Taubate</option>
															<option value="6">Caçapava</option>
															<option value="7">Pinda</option>
															<option value="8">Roseira</option>
															<option value="9">Mogi das Cruzes</option>
															<option value="10">Potim</option>
															<option value="11">Aparecida</option>
															
														</select>
													</div>
												</div>
											</div>

											<div class="form-group row">
												<label for="user_name"
													class="txtNegrito col-md-4 col-form-label text-md-right Patrimonio">Patrimonio
													do Equipamento</label>
												<div class="col-md-6">
													<input type="text" name="nPatrimonio" id="Patrimonio"
													autocomplete="off"	class="form-control" name="username">
												</div>
											</div>

											<div class="form-group row">
												<label
													class="txtNegrito col-md-4 col-form-label text-md-right macEquipamento">MAC
													do Equipamento</label>
												<div class="col-md-6">
													<input type="text" id="macEquipamento" name="macEquipamento"
													autocomplete="off"	class="form-control" name="nid-number">
												</div>
											</div>

											<div class="form-group row">
												<label for="user_name"
													class="txtNegrito col-md-4 col-form-label text-md-right">Observações</label>
												<div class="col-md-6">
													<textarea id="txtObs" name="txtObs" class="form-control"
													autocomplete="off"	aria-label="With textarea"></textarea>
												</div>
											</div>

											<div class="col-md-6 offset-md-4"
												style="padding-left: 2px; padding-right: 0px; margin-left: 34.333333%;">
												<div class=" offset-md-8">
												
												<input type="button" class="btn btn-link float-right" onclick="window.open('./CadastrarTecnico.php')" value="CADASTRAR TECNICO" style="
												padding-bottom: 12px;"
												
												<?php if ($_SESSION['admin_user'] == false){ ?> disabled <?php } ?> />
												</div>
												
												<input type="button" id="btnCadastrar" class="login100-form-btn"
													style="margin-bottom: 20px;" value="Cadastrar">
												<input type="submit" id="btnListar" class="login100-form-btn"
													style="margin-bottom: 7px;height: 55px;" value="Procedimento Cadastrados"/> 
													
											
											</div>


										</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	</div>

	</main>


	<div id="dropDownSelect1"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


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
	<script type="module" src="js/CadastroAjax.js"></script>

	<!-- AUTOCOMPLETE ========================================================-->
	<script src="excluidos/script.js"></script>

	<!--===============================================================================================-->
	<script type="module" src="js/ValidaControle.js"></script>
	<!--===============================================================================================-->

</body>

</html>