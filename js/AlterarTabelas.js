var resultado

$('#example').dblclick(function () {
    if (confirm('Deseja ativar modo de alteração ?')) {
        $("#example tbody tr ").on("click", function () {
            if (confirm('Deseja alterar o cadastro: ' + $(this).find("td:first").text() + ' ?')) {
                alterarCadastro($(this).find("td:first").text());
            }

        })
    }
})

var PopularTecnico=[];
$('#nomeTecnico').empty();
$('#nomeTecnico').autocomplete({
    source: PopularTecnico,
    minLength: 1
});
$('head').append('<link rel="stylesheet" href="css/AutoComplet.css" type="text/css" />');




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


function alterarCadastro(data) {



    $.get('php/alterar.php?idAlteracao=' + data + '&flag=pesquisar')
        .done(function (resp) {
            //limpaMoldal();
            $('#myModal1').modal('show');
            resultado = JSON.parse(resp);
            popularMoldal(resultado);
        })
}


function popularMoldal(resp) {
    $('#idAlteracao').val(resp[0].id_ativacao);
    $('#idAlteracao').prop("disabled", true);
    $('#nomeTecnico').val(resp[0].nome_tecnico);
    $('select#alteracaoCidade').val(resp[0].fk_cidade);
    $('select#alteracaoProcedimento').val(resp[0].fk_procedimento);
    $('#nomeCliente').val(resp[0].nomeCliente_ativacao);
    $('#Patrimonio').val(resp[0].patrimonio_ativacao);
    $('#macEquipamento').val(resp[0].mac_ativacao);
    $('#txtObs').val(resp[0].obs_ativacao);
}

function limpaMoldal() {
    $('#idAlteracao').val('');
    $('#idAlteracao').val('');
    $('#nomeTecnico').val('');
    $('#alteracaoCidade option').filter(function () { return $.trim($(this).val()) == '0' }).attr('selected', 'selected');
    $('select#alteracaoProcedimento').val(resp[0].fk_procedimento);
    $('#nomeCliente').val('');
    $('#Patrimonio').val('');
    $('#macEquipamento').val('');
    $('#txtObs').val('');
}


$('#btnAlterar').click(function () {

    console.log(resultado[0].fk_procedimento)

    var url = 'php/alterar.php?&flag=alterar&idAlterar=' + resultado[0].id_ativacao;

    if (resultado[0].nome_tecnico != $('#nomeTecnico').val()) {
        url += '&nomeTecnico=' + $('#nomeTecnico').val()
    }

    if (resultado[0].fk_procedimento != $('#alteracaoProcedimento').val()) {
        url += '&selectProcedimento=' + $('#alteracaoProcedimento').val()
    }

    if ($('#nomeCliente').val() != resultado[0].nomeCliente_ativacao) {
        url += '&nomeCliente=' + $('#nomeCliente').val()
    }

    if ($('#alteracaoCidade').val() != resultado[0].fk_cidade) {
        url += '&selectCidade=' + $('#alteracaoCidade').val()
    }

    if ($('#Patrimonio').val() != resultado[0].patrimonio_ativacao) {
        url += '&Patrimonio=' + $('#Patrimonio').val()
    }

    if ($('#macEquipamento').val() != resultado[0].mac_ativacao) {
        url += '&macEquipamento=' + $('#macEquipamento').val()
    }

    if ($('#txtObs').val() != resultado[0].obs_ativacao) {
        url += '&txtObs=' + $('#txtObs').val();
    }

    console.log(url)

    $.get(url)
        .done(function (resp) {
            alert(resp);
            $('#example').DataTable().ajax.reload();
            $('#myModal1').hide("slow");
            $('#myModal1').modal('hide');
           
        })
})


