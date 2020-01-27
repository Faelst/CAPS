////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////          VALIDAÇÃO DA CTO       //////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

var flagCto = false;
var tamanho;
var dadosClienteRetirada;

const endPoint = "http://netuno.geogridmaps.com.br/vivas/";
const token = "5AL7t0WyREW6tpbPnWcz";

$("#modalCto").on("shown.bs.modal", function() {
  $("div").removeClass("modal-backdrop");
  $(".modal-content").addClass("border border-warning rounded");
});

$("#selectProcedimento").change(function() {
  if (
    $("#selectProcedimento").val() == 1 ||
    $("#selectProcedimento").val() == 2
  ) {
    $("#moduloCto").show("slow");
    $("#moduloCtoRetirada").hide("slow");
    $("#numeroCtoRetirada").val("").css("background-image", "");
    $(".cto-retirada").html("");
    $("#numeroCto").val("");
  }
  if (
    $("#selectProcedimento").val() == 3 ||
    $("#selectProcedimento").val() == 4
  ) {
    $("#moduloCto").show("slow");
    $("#moduloCtoRetirada").show("slow");
    $("#numeroCtoRetirada").val("").css("background-image", "");
    $(".cto-retirada").html("");
    $("#numeroCto").val("");
  }
  if ($("#selectProcedimento").val() == 8) {
    $("#moduloCto").hide("slow");
    $("#moduloCtoRetirada").show("slow");
    $("#numeroCtoRetirada").val("").css("background-image", "");
    $(".cto-retirada").html("");
    $("#numeroCto").val("");
  }
  if (
    $("#selectProcedimento").val() == 5 ||
    $("#selectProcedimento").val() == 6 ||
    $("#selectProcedimento").val() == 9
  ) {
    $("#moduloCto").hide("slow");
    $("#moduloCtoRetirada").hide("slow");
    $("#numeroCtoRetirada").val("").css("background-image", "");
    $(".cto-retirada").html("");
    $("#numeroCto").val("");
  }
});

$("#numeroCtoRetirada").keyup(function() {
  if ($("#numeroCtoRetirada").val() == "") {
    $("#moduloCto").hide("slow");
    $("#moduloCtoRetirada").show("slow");
    $("#numeroCtoRetirada").val("").css("background-image", "");
    $(".cto-retirada").html("");
    $("#numeroCto").val("");
  }
});

$("#nCto").change(function() {
  var nCtoSigla = $("#nCto").val();
  if ($("#nCto").val() !== "") {
    concultarCtoSigla(nCtoSigla, "#nCto", "checked.png", "delete.png", true);
  } else {
    $("#nCto").css({ "background-image": "", opacity: "" });
  }
});

$("#dropFibra").change(function() {
  $("#inputFibra").val($("#dropFibra a").val());
});

$(".dropdown-menu a").click(function(e) {
  $("#inputFibra").val($(this).attr("value"));
  $("#txtLivres").prop("disabled", false);
});

$("#btnAbrirMoldal").click(function() {
  $("#txtLivres").prop("disabled", true);

  limpaFormulario();
});

$("#txtLivres").keyup(function() {
  $("#txtOcupados").val($("#inputFibra").val() - $("#txtLivres").val());
  if ($("#txtOcupados").val() < 0) {
    alert("Informe o a quantidade corretamente");
    $("#txtLivres").val("");
    $("#txtOcupados").val("");
  }
});

$("#numeroCto").keyup(function() {
  if ($("#numeroCto").val() !== "") {
    ConsultarCto(
      $("#numeroCto").val(),
      "#numeroCto",
      "delete.png",
      "checked.png",
      true
    );
  } else {
    $("#numeroCto").css({ "background-image": "", opacity: "" });
    $("#fibraUsada").hide("slow");
    $("#ocupadosLivres").empty();
  }
});

$("#numeroCtoRetirada").keyup(function() {
  if ($("#numeroCtoRetirada").val() !== "") {
    ConsultarCto(
      $("#numeroCtoRetirada").val(),
      "#numeroCtoRetirada",
      "delete.png",
      "checked.png",
      false
    );
  } else {
    $("#numeroCtoRetirada").css({ "background-image": "", opacity: "" });
    $("#fibraUsada").hide("slow");
    $("#ocupadosLivres").empty();
  }
});

import funcRetirada  from './RetiradaIntegracao.js';


$("#numeroCtoRetirada").change(function() {
  
  //consultarClienteRetirada($("#numeroCtoRetirada").val());
  funcRetirada.popularModalRetiradaGeo($("#numeroCtoRetirada").val() , tabelaRetirada);

});

function consultarClienteRetirada(nCto, nfibra) {
  $.get("php/ControleCto.php?flag=4&numeroCto=" + nCto).done(function(dados) {
    if (dados.length > 5) {
      dados = JSON.parse(dados);
      /*
      popularModalRetirada(dados);
      */
      $(".cto-retirada").html(
        "<span class='text-success mr-2' id=>Fibras livres: " +
          dados[0].livres +
          " </span> <span>/</span> <span class='text-danger ml-2' id='numeroFibrasOcupadas'>Fibras Ocupadas: " +
          dados[0].ocupadas +
          " </span>"
      );
      $(".text-info.stretched-link").hide("slow");
    } else {
      alert("NENHUM CLIENTE VINCULADO NA CTO");
    }
  });
}

function popularModalRetirada(dados) {
  $("#tituloModalRetirada").text(
    "Cliente Vinculado CTO :" + dados[0].numero_cto
  );

  $("#modalRetirada").modal({
    backdrop: false,
    keyboard: false,
    focus: false,
    show: true
  });

  $("#modalRetirada").on("shown.bs.modal", function() {
    $("div").removeClass("modal-backdrop");
    $(".modal-content").addClass("border border-warning rounded");
  });

  const tabelaRetirada = $("#tabelaRetirada").DataTable({
    retrieve: true,
    bPaginate: false,
    info: false,
    ordering: true,
    language: {
      url: "JsonTabela/Portuguese-Brasil.json"
    },
    data: dados,
    columns: [
      { data: "numero_cto" },
      { data: "nome_cliente" },

      {
        defaultContent:
          "<button class='btn-success p-1 rounded'>Selecionar</button>"
      }
    ]
  });
}

$("#btnCadastrar").click(function() {
  if (
    $("#selectProcedimento").val() == "8" /*||
    $("#selectProcedimento").val() == "3" ||
    $("#selectProcedimento").val() == "4"*/
  ) {
    const codigoEquipamento = $('#idEquipamento').text();
    const porta = $('#fibraUtilizada').text()
    funcRetirada.desvincularClienteGeoGrid(codigoEquipamento , porta)

    $.post("php/ControleCto.php", {
      flag: "5",
      nomeClienteRetirada: dadosClienteRetirada,
      fibraOcupada: $("#fibraRetirada").val(),
      nctoRetirada: $("#numeroCtoRetirada").val()
    }).done(function(dados) {
      if (!dados == 1) {
        alert("algo Aconteceu de errado na retirada \nInforne o desenvolvedor");
      } else {
        
        console.log("cliente removido");
      }
    });
  }
});


$("#tabelaRetirada tbody").on("click", "button", function(e) {
  e.preventDefault();

  const tabelaRetirada = $("#tabelaRetirada").DataTable();

  var data = tabelaRetirada.column(0).row($(this).parents("tr")).data();

  //if(data.nome_cliente !== 'Cliente nao Informado'){
  if (data.nome_cliente == "Cliente nao Informado") {
    $(".cto-retirada")
      .last()
      .append("<p class='text-warning'>Cliente nao informado<p>");
  } else {
    $("div .fibraUsada").html(
      "<input type='text' name='nomeCliente' id='nomeCliente' autocomplete='off' class='form-control border-warning rounded-right' value='" +
        data.nome_cliente +
        "' disabled><div id='fibraUsadaIntegracao'></div>");
  }
  $("#modalRetirada").modal("hide");
  //$('#moduloCtoRetirada').hide('slow');

  dadosClienteRetirada = data.nome_cliente;
});

function concultarCtoSigla(nCtoSigla, idElement, pic1, pic2, flag) {
  $.ajax({
    type: "post",
    url: `${endPoint}/api/?exec=${token}/fichaTerminal/consultar`,
    dataType: "json",
    cache: false,
    data: {
      sigla: "TA" + nCtoSigla
    }
  }).done(function(retorno) {
    if (retorno.registros.length !== 1 && retorno.registros.length > 1) {
      const registros = Object.values(retorno.registros);
      const addresses = registros.map(function(element) {
        return {
          sigla: element.sigla,
          codigo: element.codigo,
          cidade: element.cidade
        };
      });
      callModalConsultarCtoCadastro(addresses, nCtoSigla);
    } else if (retorno.registros.length == 1) {
      ConsultarCtoCadastro(
        retorno.registros[0].codigo,
        "#nCto",
        "checked.png",
        "delete.png",
        true
      );
    } else if (retorno.registros.length == 0) {
      alert("Nenhuma caixa foi encontrada");
      $(idElement).css({
        "background-image": "url('./images/icons/" + pic2 + "')"
      });
      $("#fibraUsada").hide("slow");
      $("#ocupadosLivres").empty();
      flagCto = false;
    }
  });
}

function callModalConsultarCtoCadastro(addresses, nCtoSigla) {
  $("#divModalConsultarCtoCadastro").html(
    "<div class='modal fade' id='ModalVariasCto' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'> <div class='modal-dialog modal-dialog-centered' role='document'> <div class='modal-content'> <div class='modal-header'> <h5 class='modal-title' id='TituloModalCentralizado'>Consulta GeoGrid: " +
      nCtoSigla +
      "</h5> <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'> <span aria-hidden='true'>&times;</span> </button> </div> <div class='modal-body'> <table id='TableVariasCto' class='display' style='width:100%'> <thead> <tr> <th>ID</th> <th>Numero da CTO</th> <th>Cidade</th> <th></th> </tr> </thead> <tbody> </tbody>  </table> </div> <div class='modal-footer'> <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button> <button type='button' class='btn btn-primary'>Salvar mudanças</button> </div> </div> </div> </div>"
  );

  $("#ModalVariasCto").modal("show");

  $("#ModalVariasCto").on("shown.bs.modal", function() {
    $("div").removeClass("modal-backdrop");
    $(".modal-content").addClass("border border-warning rounded");
  });

  var TableVariasCto = $("#TableVariasCto").DataTable({
    retrieve: true,
    bPaginate: true,
    ordering: true,
    language: {
      url: "JsonTabela/Portuguese-Brasil.json"
    },
    data: addresses,
    columns: [
      { data: "sigla" },
      { data: "codigo" },
      { data: "cidade" },
      {
        defaultContent:
          "<a href='#' class='stretched-link text-primary'>Selecionar</a>"
      }
    ]
  });

  $("#TableVariasCto tbody").on("click", "a", function(e) {
    e.preventDefault();

    var TableVariasCto = $("#TableVariasCto").DataTable();

    var data = TableVariasCto.column(0).row($(this).parents("tr")).data();

    $("#nCto").val(data.sigla.replace(/^\D+/g, ""));
    $("#nCto").css("background-image", "url('./images/icons/checked.png')");
    $("#ModalVariasCto").modal("hide");
  });
}

var registros;

function ConsultarCtoCadastro(nCto, idElement, pic1, pic2, flag) {
  $.ajax({
    type: "post",
    url: `${endPoint}/api/?exec=${token}/fichaTerminal/consultarCodigo`,
    dataType: "json",
    data: {
      codigo: nCto
    }
  }).done(function(retorno) {
    var elementoCadastrarCTO = $("#btnCadastrarCto");

    if (retorno.recipienteConsultado.codigo !== null) {
      registros = retorno.recipienteConsultado;

      $(idElement).css(
        "background-image",
        "url('./images/icons/" + pic1 + "')"
      );

      console.log(retorno.equipamentos.length);

      if (retorno.equipamentos.length !== 0) {
        elementoCadastrarCTO.click(function() {
          vincularclienteNaoInformado(retorno);
        });
      } else {
        alert("Diagrama nao Existente GeoGrid\nFinalize o Cadastro.");
        console.log(retorno);
        elementoCadastrarCTO.click(function() {
          notificarInfra(retorno);
        });
      }
    } else {
      alert("Nenhuma caixa foi encontrada");
      $(idElement).css({
        "background-image": "url('./images/icons/" + pic2 + "')"
      });
      $("#fibraUsada").hide("slow");
      $("#ocupadosLivres").empty();
      flagCto = false;
    }
  });

  /* $.get('php/ControleCto.php?flag=0&nCto=' + nCto)
         .done(function (dados) {
             if (dados == 0) {
                 $(idElement).css("background-image", "url('./images/icons/" + pic1 + "')")
                 $('#fibraUsada').hide('slow');
                 $('#ocupadosLivres').empty();
                 flagCto = false;                                                             //// flagCto que esta sendo exportada para 'CadastroAjax.js' para ser tratada para fazer o cadastro do formulario
             } else {
                 $(idElement).css({ "background-image": "url('./images/icons/" + pic2 + "')" })
                 if (flag === true) {
                     if (pic2 == 'checked.png') {
                         $('#fibraUsada').show('slow');
                         carregarInformacoesCto(nCto);
                     }
                 }
             }
         })*/
}

function ConsultarCto(nCto, idElement, pic1, pic2, flag) {
  $.get("php/ControleCto.php?flag=0&nCto=" + nCto).done(function(dados) {
    if (dados == 0) {
      $(idElement).css(
        "background-image",
        "url('./images/icons/" + pic1 + "')"
      );
      $("#fibraUsada").hide("slow");
      $("#ocupadosLivres").empty();
      flagCto = false; //// flagCto que esta sendo exportada para 'CadastroAjax.js' para ser tratada para fazer o cadastro do formulario
    } else {
      $(idElement).css({
        "background-image": "url('./images/icons/" + pic2 + "')"
      });
      if (flag === true) {
        if (pic2 == "checked.png") {
          $("#fibraUsada").show("slow");
          carregarInformacoesCto(nCto);
        }
      }
    }
  });
}

function carregarInformacoesCto(nCto) {
  $.get("php/ControleCto.php?flag=2&nCto=" + nCto).done(function(dados) {
    dados = JSON.parse(dados);

    $("#ocupadosLivres").html(
      "<span class='text-success mr-2' id=>Fibras livres: " +
        dados[0].fibras_livres +
        " </span> <span>/</span> <span class='text-danger ml-2' id='numeroFibrasOcupadas'>Fibras Ocupadas: " +
        dados[0].fibras_ocupadas +
        " </span>"
    );
    $("#selectFibra").empty();

    if (dados[0].total_fibra == dados[0].fibras_ocupadas) {
      // Verifica se a caixa esta lotada
      alert("Caixa esta Indispomivel: Terminal Lotado");
      //$("#btnCadastrar").prop("disabled", true);
      flagCto = false;
    } else {
      flagCto = true;
      //$("#btnCadastrar").prop("disabled", false);
    }
  });
}

function limpaFormulario() {
  $("#nCto").val("");
  $("#nCep").val("");
  $("#nomeRua").val("");
  $("#nomeBairro").val("");
  $("#inputFibra").val("");
  $("#txtLivres").val("");
  $("#txtOcupados").val("");
  $("#complementoCto").val("");
  $("#nCto").css({ "background-image": "", opacity: "" });
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////                CADASTRAR CTO            ///////////////////////////////////////////////////////////////////////////////////

export { updateCto };

function updateCto() {
  $.post("php/ControleCto.php", {
    flag: "3",
    numeroCto: $("#numeroCto").val()
  }).done(function(data) {
    console.log(data);
    $("#fibraUsada").hide("slow");
    $("#numeroCto").val("");
    $("#selectFibra").empty();
  });
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////// quando o Js carrega /////////////////////////////////////////////////

$(document).ready(function() {
  $("#txtLivres").inputmask("Regex", { regex: "^[1-9][0-9]?$|^100$" });
  $("#fibraUsada").hide();
  $("#moduloCto").hide();
  $("#moduloCtoRetirada").hide();

  function limpa_formulário_cep() {
    // Limpa valores do formulário de cep.
    $("#nomeRua").val("");
    $("#nomeBairro").val("");
    $("#cidade").val("");
    $("#uf").val("");
    $("#ibge").val("");
  }

  //Quando o campo cep perde o foco.
  $("#nCep").blur(function() {
    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, "");

    //Verifica se campo cep possui valor informado.
    if (cep != "") {
      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;

      //Valida o formato do CEP.
      if (validacep.test(cep)) {
        //Preenche os campos com "..." enquanto consulta webservice.
        $("#nomeRua").val("...");
        $("#nomeBairro").val("...");
        $("#cidade").val("...");
        $("#uf").val("...");
        $("#ibge").val("...");

        //Consulta o webservice viacep.com.br/
        $.getJSON(
          "https://viacep.com.br/ws/" + cep + "/json/?callback=?",
          function(dados) {
            if (!("erro" in dados)) {
              //Atualiza os campos com os valores da consulta.
              $("#nomeRua").val(dados.logradouro);
              $("#nomeBairro").val(dados.bairro);
              $("#cidade").val(dados.localidade);
              $("#uf").val(dados.uf);
              $("#ibge").val(dados.ibge);
            } else {
              //end if.
              //CEP pesquisado não foi encontrado.
              limpa_formulário_cep();
              alert("CEP não encontrado.");
            }
          }
        );
      } else {
        //end if.
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
      }
    } else {
      //end if.
      //cep sem valor, limpa formulário.
      limpa_formulário_cep();
    }
  });

  $("#modalScript").on("shown.bs.modal", function() {
    $("div").removeClass("modal-backdrop");
    $(".modal-content").addClass("border border-warning rounded");
  });
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////                CADASTRO DE CTO         ////////////////////////////////////////////////////////////////////////

$("#btnCadastrarCto").click(function() {
  const nCto = registros.codigo.replace(/^\D+/g, "");
  const nCep = registros.cep;
  const nomeRua = registros.endereco;
  const complementoCto = registros.observacao;
  const nomeBairro = registros.bairro;
  const inputFibra = $("#inputFibra").val();
  const txtLivres = $("#txtLivres").val();
  const txtOcupados = $("#txtOcupados").val();
  const latitude = registros.latitude;
  const longitude = registros.longitude;

  $.post("./php/ControleCto.php", {
    flag: "1",
    nCto: nCto,
    nCep: nCep,
    nomeRua: nomeRua,
    complementoCto: complementoCto,
    nomeBairro: nomeBairro,
    inputFibra: inputFibra,
    txtLivres: txtLivres,
    txtOcupados: txtOcupados,
    latitude: latitude,
    longitude: longitude
  })
    .done(function(dados) {
      if (dados == "1") {
        alert("CTO cadastrada sucesso.");
        $("#numeroCto").val($("#nCto").val());
        ConsultarCto(
          $("#numeroCto").val(),
          "#numeroCto",
          "delete.png",
          "checked.png",
          true
        );
        $("#modalCto").modal("hide");
        limpaFormulario();
      } else {
        alert("Alguma aconteceu de errado ! \n" + dados);
      }
    })
    .fail(function(error) {
      alert(error);
    });
});

function notificarInfra(retorno) {
  $.post("php/phpMail/send.php", {
    CodigoCTO: retorno.recipienteConsultado.codigo,
    fibras: $("#inputFibra").val(),
    fibrasOcupadas: $("#txtOcupados").val(),
    fibrasLivres: $("#txtLivres").val()
  }).done(function(resp) {
    console.log(resp);
  });
}

function vincularclienteNaoInformado(retorno) {
  const vagasOcupadas = parseInt($("#txtOcupados").val());

  const codigoSpliter = retorno.equipamentos[0].codigo;

  var i = 0;

  do {
    i++;
    vincular(codigoSpliter, i);
  } while (i < vagasOcupadas);

  function vincular(codigoSpliter, i) {
    $.ajax({
      type: "post",
      url: `${endPoint}/api/?exec=${token}/fichaEquipamento/reservarPortaCliente`,
      dataType: "json",
      data: {
        codigo: codigoSpliter,
        porta: i,
        id_integrador: "14937" //Id de cliente nao indentificado.
      }
    }).done(function(resp) {
      console.log(resp);
      //if(resp.status )
    });
  }
}
