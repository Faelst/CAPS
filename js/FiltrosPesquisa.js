var menorMaior = undefined;

$('#btnFiltrar').click(function (e) {

    e.preventDefault();

    console.log("./php/FiltrosPesquisa.php?selectUsuario="+$('#selectUsuario').val()+
    "&selectTecnico="+$('#selectTecnico').val()+
    "&selectProcedimento="+$('#selectProcedimento').val()+
    "&selectCidade="+$('#selectCidade').val()+
    "&horarioInicial="+$('#horarioInicial').val()+
    "&horarioFinal="+$('#horarioFinal').val()+
    "&txtTempo="+$('#txtTempo').val()+
    "&menorMaior="+menorMaior+
    "&txtDataInicio="+$('#txtDataInicio').val()+
    "&txtDataFinal="+$('#txtDataFinal').val()+
    "&txtPatrimonio="+$('#txtPatrimonio').val()+
    "&txtMac="+$('#txtMac').val())

    $.get("./php/FiltrosPesquisa.php?selectUsuario="+$('#selectUsuario').val()+
    "&selectTecnico="+$('#selectTecnico').val()+
    "&selectProcedimento="+$('#selectProcedimento').val()+
    "&selectCidade="+$('#selectCidade').val()+
    "&horarioInicial="+$('#horarioInicial').val()+
    "&horarioFinal="+$('#horarioFinal').val()+
    "&txtTempo="+$('#txtTempo').val()+
    "&menorMaior="+menorMaior+
    "&txtDataInicio="+$('#txtDataInicio').val()+
    "&txtDataFinal="+$('#txtDataFinal').val()+
    "&txtPatrimonio="+$('#txtPatrimonio').val()+
    "&txtMac="+$('#txtMac').val())
        .done(function (data){
            console.log(data);
            if (!data.length){
                alert('Nao Foi encontrado nenhuma Informação');               
            }else {
                var jsonData = JSON.parse(data);
                jsonData;
            }

            preencherTabelaFiltro(jsonData);
        })

})

function preencherTabelaFiltro(jsonData) {

    var table = $('#example').DataTable();

    table.clear().draw();

    table.rows.add(jsonData).draw();

    table.columns(4).order('desc').draw();

}



$(document).ready(function () {

    //--------------------------- colorir btns de Filtro ---------------//

    $('#selectUsuario').css("border-color", "#cf4105");
    $('#selectTecnico').css("border-color", "#cf4105");
    $('#selectProcedimento').css("border-color", "#cf4105");
    $('#selectCidade').css("border-color", "#cf4105");
    $('#txtTempo').css("border-color", "#cf4105");
    $('#txtData1').css("border-color", "#cf4105");
    $('#txtData2').css("border-color", "#cf4105");
    $('#horarioInicial').css("border-color", "#cf4105");
    $('#horarioFinal').css("border-color", "#cf4105");
    $('#txtDataInicio').css("border-color", "#cf4105");
    $('#txtDataFinal').css("border-color", "#cf4105");
    $('#txtPatrimonio').css("border-color", "#cf4105");
    $('#txtMac').css("border-color", "#cf4105");

    //------------------------------------------------------------------//

    //Data Picker dos filtros

    $(".dataPickers").datepicker({
        changeMonth: true,
        changeYear: true
    });
    $(".dataPickers").datepicker("option", "showAnim", "clip");
    $(".dataPickers").datepicker("option", "dateFormat", "dd/mm/yy");

    //-------------------------------------------------------------//

    //Mascaras dos Datas Pickers e dos inputs de tempo///

    $(".dataPickers").inputmask({
        mask: ['99/99/9999', '99-99-9999'],
        keepStatic: true
    });

    $(".timeformatExample1").inputmask({
        mask: ['hh:mm:ss', '99:99:00'],
        keepStatic: true
    });

    //------------------------------------------------------//



})


//----------------------- Verificação se as datas e o tempo sao maiores ou menores ---------------///////////
$('#txtDataFinal').change(function () {
    if ($('#txtDataInicio').val() > $('#txtDataFinal').val()) {
        alert("Selecione as datas corretamente");
        $('#txtDataInicio').val('');
        $('#txtDataFinal').val('');
    }

});

$('#horarioFinal').change(function () {

    if ($('#horarioInicial').val() > $('#horarioFinal').val()) {
        alert("Selecione as datas corretamente");
        $('#horarioInicial').val('');
        $('#horarioFinal').val('');
    }

});
//----------------------------------------------------------------------------------///

// ----------------- Verificação dos Botoes maiores e menores -------------------- //

$("#btnMaior").click(function () {
    if (menorMaior == undefined) {
        menorMaior = '>';
        $("#btnMaior").css("border-color", "#cf4105");
        $("#btnMaior").css("color", "#cf4105");
        $("#btnMenor").css("border-color", "rgb(134, 142, 150)");
        $("#btnMenor").css("color", "rgb(134, 142, 150)");
    } else if (menorMaior == ">") {

        menorMaior = undefined;
        $("#btnMaior").css("border-color", "rgb(134, 142, 150)");
        $("#btnMaior").css("color", "rgb(134, 142, 150)");
        $("#btnMenor").css("border-color", "rgb(134, 142, 150)");
        $("#btnMenor").css("color", "rgb(134, 142, 150)");
    } else if (menorMaior == "<") {
        menorMaior = '>';
        $("#btnMaior").css("border-color", "#cf4105");
        $("#btnMaior").css("color", "#cf4105");
        $("#btnMenor").css("border-color", "rgb(134, 142, 150)");
        $("#btnMenor").css("color", "rgb(134, 142, 150)");
    }
});

$("#btnMenor").click(function () {
    if (menorMaior == undefined) {
        menorMaior = '<';
        $("#btnMenor").css("border-color", "#cf4105");
        $("#btnMenor").css("color", "#cf4105");
        $("#btnMaior").css("border-color", "rgb(134, 142, 150)");
        $("#btnMaior").css("color", "rgb(134, 142, 150)");
    } else if (menorMaior == "<") {
        menorMaior = undefined;
        $("#btnMenor").css("border-color", "rgb(134, 142, 150)");
        $("#btnMenor").css("color", "rgb(134, 142, 150)");
        $("#btnMaior").css("border-color", "rgb(134, 142, 150)");
        $("#btnMaior").css("color", "rgb(134, 142, 150)");
    } else if (menorMaior == ">") {
        menorMaior = '<';
        $("#btnMenor").css("border-color", "#cf4105");
        $("#btnMenor").css("color", "#cf4105");
        $("#btnMaior").css("border-color", "rgb(134, 142, 150)");
        $("#btnMaior").css("color", "rgb(134, 142, 150)");
    }
});

// ------------------------ fim da verificação ------------------------------- //






















