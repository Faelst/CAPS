// PASSAR FLAG PARA CADATRAR.

import { flag } from './validaControle.js'
import { updateCto } from './ControleCto.js'
import desvincularClienteGeoGrid from './RetiradaIntegracao.js'

/** CADASTRO VIA AJAX */

$(document).ready(function () {
  var tempoInicio
  var tempoFinal

  // PEGAR O TEMPO DE INICIO DA ATIVAÇÃO
  $('#nomeTecnico').keypress(function () {
    tempoInicio = getTime()
  })

  //PEGAR O TEMPO FINAL DA ATIVAÇÃO.
  $('#btnCadastrar').click(function () {
    tempoFinal = getTime()
  })

  // PEGAR TEMPO ATUAL
  function getTime () {
    var today = new Date()
    var time =
      today.getHours() + ':' + today.getMinutes() + ':' + today.getSeconds()
    return time
  }

  // FUNÇÃO PARA LIMPAR OS CAMPOS DE FORMULARIO DE CADASTRO
  function limparCampo () {
    $('#nomeTecnico').val('')
    $('#timepicker4').val('')
    $('#nomeCliente').val('')
    $('#Patrimonio').val('')
    $('#macEquipamento').val('')
    $('#selectCidade').val('0')
    $('#selectProcedimento').val('0')
    $('#txtObs').val('')
  }

  // EVENTO PARA CADASTRAR EVENTO NO BANCO
  $('#btnCadastrar').click(function (e) {
    if (flag == true) {
      e.preventDefault()

      var dados =
        $('#cadProcedimento').serialize() +
        '&tempoInicio=' +
        tempoInicio +
        '&tempoFinal=' +
        tempoFinal +
        '&nomeCliente=' +
        $('#nomeCliente').val() +
        '&flag=0'

      $('#btnCadastrar').val('Cadastrando...')

      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: './php/Cadastro.php',
        async: true,
        data: dados,
        success: function (response) {
          response = JSON.parse(response)

          $('#btnCadastrar').val('Cadastrar')
          if (response.status == '1') {
            if (
              $('#selectProcedimento').val() == '1' ||
              $('#selectProcedimento').val() == '3' ||
              $('#selectProcedimento').val() == '4'
            ) {
              updateCto()
              console.log('Estou passsando pelo CadastroAjax.js')
              //cadastrarClienteGeoGrid(response.id_insert);
            }
            var today = new Date()
            $('#modalScriptBody').html(
              '<p>Sinal do Equipamento: </p><p>Tipo de Procedimento: ' +
                $('#selectProcedimento option:selected').html() +
                '</p><p>Nome do Tecnico: ' +
                $('#nomeTecnico').val() +
                '</p><p>Horario do Pedido: ' +
                $('#timepicker4').val() +
                '</p><p>Horario termino: ' +
                (today.getHours() - 1) +
                ':' +
                today.getMinutes() +
                ':' +
                today.getSeconds() +
                '</p><p>Patrimonio: ' +
                $('#Patrimonio').val() +
                '</p><p>Mac: ' +
                $('#macEquipamento').val() +
                '</p><p>CTO: ' +
                $('#numeroCto').val() +
                '</p><p>Observação: ' +
                $('#txtObs').val() +
                '</p>'
            )
            $('#modalScript').modal({
              show: true,
              backdrop: false,
              keyboard: false
            })
          } else {
            alert(
              'Falha ao cadastrar \n Verifique se os dados foram cadastrados corretamente'
            )
            console.log(response)
          }
        }
      })
    } else {
      alert('Digite todos os Campos Corretamente')
    }
  })
  $('#fecharModal').click(function () {
    document.location.reload(true)
  })
})

function cadastrarClienteGeoGrid (id_cliente) {
  var id_cliente = id_cliente;
  var nomeCliente = $('#nomeCliente').val()

  $.post('./php/CadastroCto.php', {
    flag: 1,
    nomeCliente: nomeCliente,
    nomeTecnico: $('#nomeTecnico').val()
  }).done(function (resp) {
    if (isNaN(parseInt(resp))) {
      id_cliente = resp

      $.ajax({
        type: 'post',
        url:
          'http://186.225.17.13/aconcagua/api/?exec=5AL7t0WyREW6tpbPnWcz/clientes/cadastrar',
        dataType: 'json',
        data: {
          id_integrador: id_cliente,
          nome: nomeCliente,
          tipo: '1'
        }
      }).done(function (retorno) {
        console.log(
          'Resultado da API:',
          retorno,
          '\n Cliente Cadastrado no SISTEMA GEOGRID'
        )
      })
    } else {
      alert('Cliente nao encontrado')
    }
  })

  /*
    $.ajax({
        type: 'post',
        url: "http://186.225.17.13/aconcagua/api/?exec=5AL7t0WyREW6tpbPnWcz/fichaTerminal/consultarCodigo",
        dataType: 'json',
        data: {
            id_integrador: 
            nome: 
            tipo:
        }
    }).done(function (retorno) {
        
 
        if (retorno.recipienteConsultado.codigo !== null) {
            registros = retorno.recipienteConsultado;
            $(idElement).css("background-image", "url('./images/icons/" + pic1 + "')")
            
            console.log(registros)
        } else {
            alert('Nenhuma caixa foi encontrada');
            $(idElement).css({ "background-image": "url('./images/icons/" + pic2 + "')" })
            $('#fibraUsada').hide('slow');
            $('#ocupadosLivres').empty();
            flagCto = false;  
        }
    })*/
}
