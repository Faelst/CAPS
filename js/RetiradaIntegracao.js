var objEquipamentos = []

const funcRetirada = {
  popularModalRetiradaGeo (codigoCTO) {
    $.ajax({
      type: 'post',
      url: `http://netuno.geogridmaps.com.br/vivas/api/?exec=5AL7t0WyREW6tpbPnWcz/fichaTerminal/consultarCodigo`,
      dataType: 'json',
      cache: false,
      async: false,
      data: {
        codigo: 'TA' + codigoCTO
      }
    }).done(function (retorno) {
      var { equipamentos } = retorno
      objEquipamentos.codigoEquipamento = equipamentos[0].codigo

      /* faz um filter no OBEJTO para verificar quais fibras estão ocupadas */
      objEquipamentos.vinculados = retorno.equipamentos[0].fibras.saidas.filter(
        function (element) {
          return element.reservada == true
        }
      )

      /*  REMOVE INFORMAÇÕES DESNECESSARIAS PARA DEIXAR O ARRAY MAIS LEGIVEL */
      objEquipamentos.vinculados = objEquipamentos.vinculados.map(function (
        array
      ) {
        delete array.comentario
        delete array.ocupada
        delete array.cliente
        delete array.reservada
        return { idCliente: array.idCliente, fibraUtilizada: array.fibra }
      })

      consultarNome(objEquipamentos, objEquipamentos.vinculados)
    })

    function consultarNome (objEquipamentos, vinculados) {
      var callbackNome = []
      objEquipamentos.vinculados = objEquipamentos.vinculados.map(function (
        array
      ) {
        $.ajax({
          type: 'post',
          url: `http://netuno.geogridmaps.com.br/vivas/api/?exec=5AL7t0WyREW6tpbPnWcz/clientes/consultarId`,
          dataType: 'json',
          cache: false,
          async: false,
          data: {
            id_integrador: array.idCliente
          }
        }).done(function (retorno) {
          callbackNome.push(retorno.registro.nome)
        })
      })
      var i = 0
      for (; i < vinculados.length; i++) {
        vinculados[i].nome = callbackNome[i]
      }

      popularModalRetirada(vinculados)
    }

    function popularModalRetirada (dados) {
      $('#tituloModalRetirada').html(
        "<h5 class='modal-title'>Cliente Vinculado CTO :" +
          codigoCTO +
          "<br><p id='subTitle'>" +
          objEquipamentos.codigoEquipamento +
          '</p>'
      )

      console.log(dados)

      $('#modalRetirada').modal({
        backdrop: false,
        keyboard: false,
        focus: false,
        show: true
      })

      $('#modalRetirada').on('shown.bs.modal', function () {
        $('div').removeClass('modal-backdrop')
        $('.modal-content').addClass('border border-warning rounded')
      })

      $('#tabelaRetirada')
        .DataTable()
        .destroy()

      var tabelaRetirada = $('#tabelaRetirada').DataTable({
        retrieve: true,
        bPaginate: false,
        info: false,
        ordering: true,
        language: {
          url: 'JsonTabela/Portuguese-Brasil.json'
        },
        data: dados,
        columns: [
          { data: 'idCliente' },
          { data: 'nome' },
          { data: 'fibraUtilizada' },
          {
            defaultContent:
              "<button class='btn-success p-1 rounded'>Selecionar</button>"
          }
        ]
      })
    }

    var dataSelecionada = []

    $('#tabelaRetirada tbody').on('click', 'button', function (e) {
      e.preventDefault()

      const tabelaRetirada = $('#tabelaRetirada').DataTable()

      dataSelecionada = tabelaRetirada
        .column(0)
        .row($(this).parents('tr'))
        .data()

      setarInformaçõesFront(dataSelecionada)
    })

    function setarInformaçõesFront (dataSelecionada) {
      $('.cto-retirada').html(
        '<p id="idEquipamento">' + $('#subTitle').text() + '</p>'
      )
      $('#nomeCliente').val(dataSelecionada.nome)
      $('#fibraUsadaIntegracao').html(
        '<div class="input-group-append"><span class="input-group-text" id="fibraUtilizada">' +
          dataSelecionada.fibraUtilizada +
          '</span></div>'
      )
      $('.cliente-geogrid').html(
        '<p id="idIntegradorCliente">' + dataSelecionada.idCliente + '</p>'
      )

      if ($('#nomeCliente').val() == 'Cliente nao informado') {
        $('#nomeCliente').prop('disabled', false)
      }
    }
  },

  // função exportada para desvincular o cliente da CTO no GEOGRID.
  desvincularClienteGeoGrid (codigoEquipamento, porta) {    
    try {
      $.ajax({
        type: 'post',
        url: `http://netuno.geogridmaps.com.br/vivas/api/?exec=5AL7t0WyREW6tpbPnWcz/fichaEquipamento/cancelarReservaPortaCliente`,
        dataType: 'json',
        cache: false,
        async: false,
        data: {
          codigo: codigoEquipamento,
          porta: porta
        }
      }).done(function (retorno) {
        console.log(retorno)
        alert('Cliente Desvinculado')
      })
    } catch (e) {
      alert(
        'Aconteceu um erro ! \nNotifique a equipe de desenvolvimento.\n' + e
      )
    }
  }
}

export default funcRetirada
