/** VALIDAR INPUTS DO FORMULARIO DE CADASTRO */

var flag;
var contadorFlag;
var PopularTecnico = [];

$("#btnListar").click(function (e) {
  e.preventDefault();
  window.location = "./Listagem.php";
});

$(document).ready(function () {

  // Fazer Chamada da Pagina
  

  // VALIDAR CAMPO DE INSERÇÃO DA PAGINA "CONTROLE.PHP"

  $("#nomeTecnico").css("border-color", "orange");
  $("#timepicker4").css("border-color", "orange");
  $("#nomeCliente").css("border-color", "orange");
  $("#Patrimonio").css("border-color", "orange");
  $("#macEquipamento").css("border-color", "orange");
  $("#selectCidade").css("border-color", "orange");
  $("#selectProcedimento").css("border-color", "orange");
  $("#txtObs").css("border-color", "orange");

  //DADOS DO AUTOCOMPETE
  //CIDADE
  $('#nomeTecnico').empty();
  $('#nomeTecnico').autocomplete({
    source: PopularTecnico,
    minLength: 1
  });



  $.ajax({
    type: 'GET',		    //Definimos o método HTTP usado
    dataType: 'json',	            //Definimos o tipo de retorno
    url: './php/PopularTecnico.php',    //Definindo o arquivo onde serão buscados os dados
    success: function (dados) {
      for (var i = 0; dados.length > i; i++) {
        //Adicionando registros retornados na tabela
        PopularTecnico[i] = dados[i].nome_tecnico;

      }

    },
    error: function (request, status, error) {
      alert(request.responseText);
    }
  });

  //VALIDAR CAMPOS DE ENTRADA

  $("#btnCadastrar").click(function (e) {


    contadorFlag = 0;

    validarCampo("#timepicker4", ".validaHora");
    validarCampo("#nomeTecnico", ".nomeTecnico");
    validarCampo("#nomeCliente", ".nomeCliente");
    validarCampo("#Patrimonio", ".Patrimonio");
    validarCampo("#macEquipamento", ".macEquipamento");
    validarCampo('#selectProcedimento', '.labelProced');
    validarCampo('#selectCidade', '.selectCidade');

    function validarCampo(p1, p2) {
      if ($(p1).val() == "" || $(p1).val() == "0") {
        e.preventDefault();
        $(p2).css("color", "red");
        $(p1).css("border-color", "red");
      } else {
        $(p1).css("border-color", "orange");
        $(p2).css("color", "black");
        contadorFlag += 1;
      }
    }

    // So irá retornar 'True' se todos os campos forem preenchidos
    if (contadorFlag == 7) {
      flag = true;
    } else {
      flag = false
    }
  });
});


export { flag };

