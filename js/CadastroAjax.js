

// PASSAR FLAG PARA CADATRAR.

import { flag } from './validaControle.js';

/** CADASTRO VIA AJAX */

$(document).ready(function () {


    var tempoInicio;
    var tempoFinal;

    
    // PEGAR O TEMPO DE INICIO DA ATIVAÇÃO
    $("#timepicker4").keypress(function () {
        tempoInicio = getTime();
    });

    //PEGAR O TEMPO FINAL DA ATIVAÇÃO.
    $("#btnCadastrar").click(function () {
        tempoFinal = getTime();
    });

    // PEGAR TEMPO ATUAL
    function getTime() {
        var today = new Date();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        return time;
    }


    
    // FUNÇÃO PARA LIMPAR OS CAMPOS DE FORMULARIO DE CADASTRO
    function limparCampo() {
        $("#nomeTecnico").val("");
        $("#timepicker4").val("");
        $("#nomeCliente").val("");
        $("#Patrimonio").val("");
        $("#macEquipamento").val("");
        $("#selectCidade").val("0");
        $("#selectProcedimento").val("0");
        $("#txtObs").val("")
    }


    // EVENTO PARA CADASTRAR EVENTO NO BANCO
    $("#btnCadastrar").click(function (e) {

        if (flag == true) {

            e.preventDefault();
            var dados = $('#cadProcedimento').serialize() + "&tempoInicio=" + tempoInicio + "&tempoFinal=" + tempoFinal;

            $('#btnCadastrar').val('Cadastrando...');

            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: "./php/Cadastro.php",
                async: true,
                data: dados,
                success: function (response) {    
                    $('#btnCadastrar').val('Cadastrar');
                    
                    if (response=="1"){
                        alert("Cadastrado com sucesso \n Obrigado por usar o CAPS");
                        limparCampo();
                        location.reload();
                    }else{alert("Falha ao cadastrar \n Verifique se os dados foram cadastrados corretamente");}
                }
            });
        } else {
            alert("Digite todos os Campos Corretamente");
        }


    });
});  