<?php 
session_start();
include ("./php/verificacaoLogin.php"); 
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>CAPS</title>

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
    <link href="https://fonts.googleapis.com/css?family=Farro&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

    <!--===============================================================================================-->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css">  
	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">

</head>

<body>
    <div class="limiter">
        <div class="container-login100 img-background" style="padding-left: 0px;padding-right: 0px;padding-top: 0px;padding-bottom: 0px; background-image: url('images/bg-02.png'); background-size: 100%; background-repeat: no-repeat;
  background-attachment: fixed;">
            <div class="wrap-login100 p-t-30 p-b-50" style="width: 95%;">
                <span class="login100-form-title p-b-41">
                    <img src="images/logo.png" />
                </span>

                <div class="container-fluid">
                    <div class="mb-2">

                        <div class="pos-f-t">
                            <div class="collapse" id="navbarToggleExternalContent">
                                <!---------------------------------------------------------------------------->

                                <div class='bg-white pt-1 mb-2 rounded' style="background-color: #fff; opacity: 0.60;">
                                    <h5 class="mt-2 ml-2">Filtros de Pesquisa: </h5>
                                    <hr style="color: black">

                                    <div class="row">
                                        <div class="col ml-4 pb-2 ">
                                            <p>Usuario:</p>
                                            <select aria-label="Selecione o Nome do Usuario" data-balloon-pos="up-left"
                                                class="custom-select" id="selectUsuario"
                                                style="height: 30px;width: 200px; font-size: 10px"></select>
                                        </div>

                                        <div class="col ml-4 pb-2 mr-4">
                                            <p>Tecnico:<p>
                                                    <select class="custom-select" id="selectTecnico"
                                                        style="height: 30px;width: 200px; font-size: 12px "></select>
                                        </div>

                                        <div class="col ml-4 pb-2 mr-4">
                                            <p>Procedimento:<p>
                                                    <select class="custom-select" id="selectProcedimento"
                                                        style="height: 30px;width: 200px; "></select>
                                        </div>

                                        <div class="col ml-4 pb-2 mr-4 ">
                                            <p>Cidade:<p>
                                                    <select class="custom-select" id="selectCidade"
                                                        style="height: 30px;width: 200px; ">
                                                    </select>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col pt-1 ml-4 pb-1  mr-4">

                                            <p>Tempo de Duração:</p>
                                            <div class="input-group" style="width: 180px;margin-top: 3px;">
                                                <div class="input-group-prepend">
                                                    <button id="btnMenor" class="btn btn-outline-secondary"
                                                        type="button"
                                                        style="height: 30px;padding-bottom: 0px;padding-top: 0px;padding-left: 4px;padding-right: 4px;">
                                                        < </button> <button id="btnMaior"
                                                            class="mr-1 btn btn-outline-secondary" type="button"
                                                            style="height: 30px;padding-bottom: 0px;padding-top: 0px;padding-left: 4px;padding-right: 4px;">
                                                            >
                                                    </button>
                                                </div>
                                                <input
                                                    aria-label="Selecione o tempo de Duração do Procedimento ( Minutos : Segundos )"
                                                    data-balloon-pos="up-right" id="txtTempo" type="time"
                                                    class="form-control tooltip-red" required="required" maxlength="8"
                                                    name="hour" pattern="[0-9]{2}:[0-9]{2} [0-9]{2}$"
                                                    aria-describedby="basic-addon1" style="
                                                            
                                                            height: 30px;
                                                            padding-top: 6px;
                                                            font-size: 12px">
                                            </div>

                                        </div>


                                        <div class="col pt-2 ml-4 pb-1  mr-4">

                                            <p>Intervalo de Data:</p>
                                            
                                                <div class='p-1 mr-5 pr-5'>
                                                    <div class="input-daterange input-group" >
                                                        <input id="txtData1" type="text"
                                                            class="input-sm form-control dataPickers" name="start"
                                                            style="height: 30px;width:60px" />
                                                        <span class="input-group-addon"
                                                            style="height: 30px;font-size:12px">até</span>
                                                        <input id="txtData2" type="text" class="input-sm form-control dataPickers"
                                                            name="end" style="height: 30px;width:60px" />
                                                    </div>
                                                </div>
                                           
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col pt-1  ml-4 pb-2  mr-5">
                                            <div class="input-group-prepend">
                                                <p class="input-group-text" id="inputGroup-sizing-default">Patrimonio:
                                                </p>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Default"
                                                aria-describedby="inputGroup-sizing-default" style="height: 30px;">
                                        </div>

                                        <div class="col pt-1  ml-4 pb-2  mr-5">
                                            <div class="input-group-prepend">
                                                <p class="input-group-text" id="inputGroup-sizing-default">MAC:
                                                </p>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Default"
                                                aria-describedby="inputGroup-sizing-default" style="height: 30px;">
                                        </div>
                                        

                                        <div class="col pb-4 pt-4 mr-5">

                                            <div class="d-flex justify-content-end position-fixed pt-2">
                                                <button id="btnFiltrar" type="button" class="btn btn-outline-dark pt-1"
                                                    style="height: 30px; width: 110px;">Filtrar</button>
                                                <div class="col-4">

                                                    <input id="btnLimparFiltro" type="button" class="btn btn-link"
                                                        value="Limpar"
                                                        style="font-size: 10px;padding-top: 3px;padding-right: 3px;color:Blue;padding-left: 0px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                                </div>

                                <!---------------------------------------------------------------------------->
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <nav class="navbar navbar-dark bg-transparent rounded"
                                    style="opacity: 0.60;color: #ef520c ">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarToggleExternalContent"
                                        aria-controls="navbarToggleExternalContent" aria-expanded="false"
                                        aria-label="Alterna navegação">
                                        <span class="navbar-toggler-icon" style="color: #ef520c"></span>
                                        Exibir Filtros
                                    </button>
                                </nav>
                            </div>
                        </div>


                    </div>
                </div>





                <form method="POST" action="" class="login100-form validate-form p-b-33 p-t-20 f-login">

                    <div class="tables-Lista table-responsive-lg">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Data....</th>
                                    <th>Usuario</th>
                                    <th>Tecnico</th>
                                    <th>Cliente</th>
                                    <th>Procedimento</th>
                                    <th>Horario Pedido</th>
                                    <th>Inicio</th>
                                    <th>Duração</th>
                                    <th>Cidade</th>
                                    <th>Patrimonio</th>
                                    <th>MAC</th>
                                    <th>OBS</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!--===============================================================================================-->
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="DataTablesJS/tablesExample.js"></script>

    <!--=====POPULAR TABELA ==========================================================================================-->
    <script type="module" src="js/PopularTables.js"></script>
    <script type="module" src="js/FiltrosPesquisa.js"></script>

    <!-- Link para alterar css da DataTables API -->
    <link rel="stylesheet" type="text/css" href="css/cssTables.css">

    <script>
  $( function() {
    $( ".dataPickers" ).datepicker();
      $( ".dataPickers" ).datepicker( "option", "showAnim","slideDown");
  } );
  </script>

</body>

</html>