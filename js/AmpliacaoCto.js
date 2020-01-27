
var TabelaCto

$(document).ready(function () {

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $('#formularioCtoCadastrados').hide();

    tabelaCto = $('#tabelaCtoAmpliacao').DataTable({
        retrieve: true,
        "processing": true,
        "bPaginate": true,
        "info": true,
        "ordering": true,
        "language": {
            "url": "JsonTabela/Portuguese-Brasil.json",
        },
        "columnDefs": [
            { "className": "dt-center", "targets": "_all" }
        ],
        "ajax": {
            "url": "php/ControleCto.php?flag=6",
            dataSrc: ''
        },
        "columns": [
            { "data": "id" },
            { "data": "n_cto" },
            { "data": "qtde_fibras" },
            { "data": "fibras_livres" },
            { "data": "fibras_ocupadas" },
            { "defaultContent": "<button type='button' id='btnEditarCto' class='p-1 btn btn-outline-warning'>Editar</button>" },
            { "defaultContent": "<button type='button' id='btnAmpliacao' class='p-1 btn btn-outline-success'>Ampliação</button>" },
            { "defaultContent": "<button type='button' id='btnExcluir' class='btn p-1 btn-outline-danger '>Excluir</button>" }
        ],
        "order": [[0, "desc"]]
    });

    tabelaCto.column(2)
        .data()
        .each(function (value, index) {
            if (value >= 16) {
                console.log('Data in index: ' + index + ' is: ' + value);
                tabelaCto.cell(index , 6 ).data("<button type='button' id='btnExcluir' class='btn p-1 btn-outline-danger ' DISABLED>Excluir</button>")
            }
        });

    $('#tabelaCtoAmpliacao tbody').on('click', 'button', function (e) {
        e.preventDefault();

        var data = tabelaCto
            .column(0)
            .row($(this).parents('tr'))
            .data();

        chamada = $(this).text();

        switch (chamada) {
            case 'Editar':
                $('#btnClienteVinculado').text('Clientes Vinculados');
                editarCto(data);
                break;
            case 'Ampliação':
                ampliacaoCto(data);
                break;
            case 'Excluir':
                excluirCto(data);
                break;
        }

    })
})

$('#btnClienteVinculado').click(function () {

    const voltarid = { id: parseInt($('#tituloModalEditarCto').text().replace(/[^0-9]/g, '')) };

    if ($(this).text() !== 'voltar') {

        const nCto = { id: $('#nCto').val() };

        $('#modalCtoIditar .modal-body').html("<table id='tabelaRetirada' class='display' style='width:100%'> <thead> <tr> <th>CTO</th> <th>Cliente</th></tr> </thead> <tbody> </tbody> </table>")

        $('#tabelaRetirada').DataTable({
            retrieve: true,
            "processing": true,
            "bPaginate": true,
            "info": true,
            "ordering": true,
            "language": {
                "url": "JsonTabela/Portuguese-Brasil.json",
            },
            "columnDefs": [
                { "className": "dt-center", "targets": "_all" }
            ],
            "ajax": {
                "url": "php/ControleCto.php?flag=4&numeroCto=" + nCto.id + "",
                dataSrc: ''
            },
            "columns": [
                { "data": "numero_cto" },
                { "data": "nome_cliente" },
            ],
            "order": [[0, "desc"]]

        });

        $(this).text('voltar');
    } else {
        $(this).text('Clientes Vinculados');
        editarCto(voltarid);
    }

})


function editarCto(data) {
    $.get('php/ControleCto.php?flag=7&id_cto=' + data.id)
        .done(function (dados) {
            dados = JSON.parse(dados);
            $('#modalCtoIditar .modal-body').html("<div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text'>Nº CTO </span></div><input type='text' id='nCto' aria-label='First name' class='form-control'autocomplete='false'style='background-repeat:no-repeat;background-position: 98% 50%; padding-right: 30px;'></div><div class='input-group mb-3 col-5 ' style='padding: 0 !important;'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon1' disabled>CEP</span></div><input type='text' class='form-control' placeholder='CEP' id='nCep'aria-label='Username' aria-describedby='basic-addon1'></div><div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon1'>Rua</span></div><input type='text' class='form-control' placeholder='nome da rua' aria-label='Username' id='nomeRua' aria-describedby='basic-addon1'><div class='input-group-prepend ml-2'><span class='input-group-text' id='basic-addon1'>Bairro</span></div><input type='text' class='form-control' placeholder='Bairro' aria-label='Username' id='nomeBairro' aria-describedby='basic-addon1'></div><div class='input-group mb-3'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon1'>Complemento</span></div><input type='text' id='complementoCto' class='form-control' value='CTO proximo ao Nº:' value='Proximo ao Numero: ' placeholder='Cto proximo ao Nº ' x'' aria-label='Username'aria-describedby='basic-addon1'></div><div class='input-group '><div class='input-group-prepend'><button class='btn btn-outline-secondary dropdown-toggle rounded-right' disabled type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Nº de Fibras</button> <div class='dropdown-menu' id='dropFibra'> <a value='8' class='dropdown-item'>8</a> <a value='16' class='dropdown-item'>16</a> </div> <input type='text' class='form-control rounded-right' disabled id='inputFibra' aria-label='Text input with dropdown button' size='1'> <input type='text' id='txtLivres' pattern='[0-9]' disabled class='form-control mx-2 rounded' placeholder='Vagas Livres' aria-label='Username' aria-describedby='basic-addon1'> <input type='text' id='txtOcupados' pattern='[0-9]' disabled class='form-control mx-2 rounded' placeholder='Vagas Ocupadas' aria-label='Username' aria-describedby='basic-addon1'> </div> </div>");
            carregarModals();
            $('#tituloModalEditarCto').html("<h5 class='modal-title' id='tituloModalEditarCto'>Identificação CTO: " + dados[0].id_cto + "</h5>")
            $('#nCto').val(dados[0].numero_cto);
            $('#nCep').val(dados[0].cep_cto);
            $('#nomeRua').val(dados[0].rua_cto);
            $('#nomeBairro').val(dados[0].bairro_cto);
            $('#complementoCto').val(dados[0].obs_cto);
            $('#inputFibra').val(dados[0].total_fibra);
            $('#txtLivres').val(dados[0].fibras_livres);
            $('#txtOcupados').val(dados[0].fibras_ocupadas);
            $('#btnSalvarCto').prop('disabled', true)
            $('#modalCtoIditar').modal('show');
        })
        .fail(function (error) {
            alert(error);
        })
}

$('#btnSalvarCto').click(function () {
    alterarCto();
    tabelaCto.ajax.reload();
})

$('#modalCtoIditar .modal-body').keyup(function () { $('#btnSalvarCto').prop('disabled', false) })

$('#btnAmpliacao').click(function () {
    if ($(this).text() == 'Procedimentos Cadastrados') {
        $('#formularioCadastrados').show('slow');
        $(this).text('Central CTO');
        $('#formularioCtoCadastrados').hide('slow');
        $('.navbar-toggler').show('slow');
    } else {
        tabelaCto.ajax.reload();
        $('#formularioCadastrados').hide('slow');
        $(this).text('Procedimentos Cadastrados');
        $('#formularioCtoCadastrados').show('slow');
        $('.navbar-toggler').hide('slow')
    }
})


function ampliacaoCto(data) {

    if (parseInt(data.qtde_fibras) >= 16) {
        alert("Nao e Possivel fazer ampliação !")
    } else {
        $.post('php/ControleCto.php', { flag: 9, id: data.id })
            .done(function (dados) {
                if (parseInt(dados) == 1) {
                    alert('CTO Ampliada');
                    tabelaCto.ajax.reload();
                }
            })

    }
}

function excluirCto(data) {
    if (confirm('Deseja EXCLUIR CTO ' + data.n_cto + ' ?')) {
        $.post('php/ControleCto.php', { flag: 10, id: data.id })
            .done(function (dados) {
                if (parseInt(dados) == 1) {
                    alert('Excluido com sucesso.');
                    tabelaCto.ajax.reload();
                }
            })
    }
}

function alterarCto() {

    $.post('php/ControleCto.php', { flag: 8, idCto: $('#tituloModalEditarCto').text().replace(/\D/g, ""), numeroCto: $('#nCto').val(), nCep: $('#nCep').val(), nomeRua: $('#nomeRua').val(), nomeBairro: $('#nomeBairro').val(), complemento: $('#complementoCto').val() })
        .done(function (dados) {
            if (parseInt(dados) == 1) {
                $('#tituloModalEditarCto').val('');
                $('#nCto').val('');
                $('#nCep').val('');
                $('#nomeRua').val('');
                $('#nomeBairro').val('');
                $('#complementoCto').val('');
                $('#inputFibra').val('');
                $('#txtLivres').val('');
                $('#txtOcupados').val('');
                $('#btnSalvarCto').val('');
                $('#modalCtoIditar').modal('hide');
                alert('Alterado com sucesso.');

            } else {
                alert('Alguma coisa deu errado \n' + dados)
                console.log(dados);

            }


        })

}


function carregarModals() {
    $("#nCep").inputmask({
        mask: ['99999-999', '99999-999'],
        keepStatic: true
    });

    //Quando o campo cep perde o foco.
    $("#nCep").blur(function () {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

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
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#nomeRua").val(dados.logradouro);
                        $("#nomeBairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#nomeRua").val("");
        $("#nomeBairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }
}
