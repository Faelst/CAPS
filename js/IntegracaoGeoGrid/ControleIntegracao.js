var popularCliente = []
var clienteSelecionados = []
var IdIntegradorSelecionado = 0

const endPoint = 'http://netuno.geogridmaps.com.br/vivas/'
const token = '5AL7t0WyREW6tpbPnWcz'

$('#btnCadastrar').click(function (e) {
  /* fazer verificação das o tipo de procedimento que sera vinculado cliente na CTO */
  if ($('#selectProcedimento').val() == 1) {
    e.preventDefault()
    vincularClienteCTO()
  }
})

$('#nomeCliente').keyup(function () {
  if ($(this).val() == '') {
    $('#addGeoGrid').remove()
  }
  $('#nomeCliente').empty()
  if ($(this).val().length >= 5) {
    popularClientes($(this).val())
    $('#nomeCliente').autocomplete({
      source: popularCliente,
      minLength: 1
    })
  } else {
    $('#addGeoGrid').remove()
  }
})

$('#nomeCliente').change(function () {
  var idSelecionado

  popularClientes($(this).val())

  if ($('#nomeCliente').val() !== '') {
    if (typeof popularCliente !== 'undefined' && !popularCliente.length) {
      if ($('#selectProcedimento').val() == '1') {
        $('#addGeoGrid').remove()
        verificarGeo()
      }
    } else {
      $('#addGeoGrid').remove()
      if (popularCliente.length > 1) {
        $('.cliente-geogrid').html(
          '<div id="addGeoGrid"><span class="text-danger">Cliente ja cadastrado no GeoGrid</span><br><a href="#" id="selecionarClienteGeo" class="stretched-link text-info"></a></div>'
        )

        /* se haver mais de um cliente cadastrado ele abre um moldal para verificar se existe cliente  */

        selecionarClienteCadastrados(
          clienteSelecionados.map(person => ({
            nome: person.nome,
            idIntegrador: person.id_integrador
          }))
        )
      } else {
        $('.cliente-geogrid').html(
          '<div id="addGeoGrid"><span class="text-danger">Cliente ja cadastrado no GeoGrid</span> <p id="selecionarClienteGeo" class="text-info"> ID Integrador: ' +
            getIdIntegrador($('#nomeCliente').val()) +
            '</p>'
        )
      }
    }
  } else {
    $('#addGeoGrid').remove()
    $('#selecionarClienteGeo').remove()
  }
})

function verificarGeo () {
  var id_cadastro = parseInt(Math.random() * 1000000)

  console.log(id_cadastro)

  consultarId()

  function consultarId () {
    $.ajax({
      type: 'POST',
      url: `${endPoint}/api/?exec=${token}/clientes/consultarId`,
      async: false,
      data: { id_integrador: id_cadastro },
      cache: false
    }).done(function (dados) {
      if (dados.status == false) {
        console.log('Cliente nao Cadastrado')
        consultarNome()
      } else {
        verificarGeo()
      }
    })

    function consultarNome () {
      $.ajax({
        type: 'POST',
        url: `${endPoint}/api/?exec=${token}/clientes/consultar`,
        async: false,
        data: {
          nome: $('#nomeCliente')
            .val()
            .trim()
        },
        cache: false
      }).done(function (dados) {
        if (dados.totalRegistros == 0) {
          console.log(dados)
          cadastrarClienteGeo()
        } else {
          $('.cliente-geogrid').html(
            '<div id="addGeoGrid"><span class="text-danger" >Cliente ja cadastrado no GeoGrid</span><br><p id="selecionarClienteGeo" class="text-info"></p></div>'
          )
        }
      })
    }

    function cadastrarClienteGeo () {
      $.ajax({
        type: 'POST',
        url: `${endPoint}/api/?exec=${token}/clientes/cadastrar`,
        async: false,
        data: {
          id_integrador: id_cadastro,
          nome: $('#nomeCliente').val(),
          tipo: 1
        }
      }).done(function (cad) {
        console.log(cad)
        if (cad.status == true) {
          console.log(id_cadastro)
          $('.cliente-geogrid').html(
            '<div id="addGeoGrid"><span class="text-danger" >Novo cliente cadastrado no GeoGrid</span><br> <p id="selecionarClienteGeo" class="text-info"> ID Integrador: ' +
              id_cadastro +
              '</p></div>'
          )
        }
      })
    }
  }
}

function popularClientes (nome) {
  $.ajax({
    type: 'POST', //Definimos o método HTTP usado
    dataType: 'json', //Definimos o tipo de retorno
    url: `${endPoint}/api/?exec=${token}/clientes/consultar`, //Definindo o arquivo onde serão buscados os dados
    data: {
      nome: nome
    },
    success: function (dados) {
      const registros = Object.values(dados.registros)
      clienteSelecionados = registros
      popularCliente = registros.map(function (element) {
        return element.nome.toLowerCase()
      })
    },
    error: function (request, status, error) {
      alert(request.responseText)
    }
  })
}

$('#selecionarClienteGeo').click(function (e) {
  e.preventDefault()
})

function selecionarClienteCadastrados (resultados) {
  $('#divModalSelecionarClientes').html(
    "<div class='modal fade' id='modalSelecionarCliente' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'> <div class='modal-dialog modal-dialog-centered' role='document'> <div class='modal-content'> <div class='modal-header'> <h5 class='modal-title' id='TituloModalCentralizado'>Selecionar Cliente</h5> <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'> <span aria-hidden='true'>&times;</span> </button> </div> <div class='modal-body'> <table id='selecionarClientes' class='display' style='width:100%'> <thead> <tr> <th>ID Integrador</th> <th>Nome</th><th></th> </tr> </thead> </table> </div> </div> </div> </div>"
  )

  $('#modalSelecionarCliente').on('shown.bs.modal', function () {
    $('div').removeClass('modal-backdrop')
    $('.modal-content').addClass('border border-warning rounded')
  })

  $('#modalSelecionarCliente').modal('show')

  $('#selecionarClientes').DataTable({
    retrieve: true,
    bPaginate: false,
    info: false,
    ordering: true,
    language: {
      url: 'JsonTabela/Portuguese-Brasil.json'
    },
    data: resultados,
    columns: [
      { data: 'idIntegrador' },
      { data: 'nome' },
      {
        defaultContent:
          "<button class='btn-success p-1 rounded'>Selecionar</button>"
      }
    ]
  })

  $('#selecionarClientes tbody').on('click', 'button', function (e) {
    e.preventDefault()
    const selecionarClientes = $('#selecionarClientes').DataTable()

    var dataSelecionada = selecionarClientes
      .column(0)
      .row($(this).parents('tr'))
      .data()

    $('#selecionarClienteGeo').html(
      'ID Integrador: ' + dataSelecionada.idIntegrador
    )
    $('#nomeCliente').val(dataSelecionada.nome)

    $('#modalSelecionarCliente').modal('hide')
  })
}

function vincularClienteCTO () {
  const idIntegrador = $('#selecionarClienteGeo')
    .text()
    .match(/\d+/)[0]
  const numeroCto = $('#numeroCto').val()
  const objCto = verificarPortaDisponivel(numeroCto)

  console.log(objCto)

  $.ajax({
    type: 'post',
    url: `${endPoint}/api/?exec=${token}/fichaEquipamento/reservarPortaCliente`,
    dataType: 'json',
    async: false,
    data: {
      codigo: objCto.codigo,
      porta: objCto.fibraLivre,
      id_integrador: idIntegrador //Id de cliente nao indentificado.
    }
  }).done(function (resp) {
    console.log(resp)
  })

  function verificarPortaDisponivel (numeroCto) {
    var retorno
    var codigoEquip

    $.ajax({
      type: 'post',
      url: `${endPoint}/api/?exec=${token}/fichaTerminal/consultarCodigo`,
      dataType: 'json',
      async: false,
      data: {
        codigo: 'TA' + numeroCto
      }
    }).done(function (callbeck) {
      if (callbeck.equipamentos.length) {
        callbeck = Object.values(callbeck.equipamentos)
        codigoEquip = callbeck[0].codigo
        const addresses = callbeck[0].fibras.saidas.filter(function (element) {
          return element.reservada == false
        })
        retorno = addresses[0].fibra
      }
    })
    return {
      fibraLivre: retorno,
      codigo: codigoEquip
    }
  }
}

function getIdIntegrador (nomeCliente) {
  var id

  $.ajax({
    type: 'post',
    url: `${endPoint}/api/?exec=${token}/clientes/consultar`,
    dataType: 'json',
    async: false,
    data: {
      nome: nomeCliente
    }
  }).done(function (callbeck) {
    if (callbeck.totalRegistros !== 0) {
      id = callbeck.registros[0].id_integrador
    } else {
      alert('cliente')
    }
  })
  return id
}
