
var PopularTecnico=[];
var menorMaior=undefined;

$(document).ready(function () {

   
//////////////////---------           GERAR RELATORIO               ------///////////////////////////////////////////
       
  
    

        $('#btnLimparFiltro').click(function(e){

            e.preventDefault();
            $('#selectUsuario').val('0');
            $('#selectTecnico').val('0');
            $('#selectProcedimento').val('0');
            $('#selectCidade').val('0');
            $('#btnMenor').val();
            $('#btnMenor').css('border-color','#868e96');
            $('#btnMenor').css('color','#868e96');
            $('#btnMaior').val();
            $('#btnMaior').css('border-color','#868e96');
            $('#btnMaior').css('color','#868e96');
            $('#txtTempo').val('0');
            $('#txtData1').val('0');
            $('#txtData2').val('0');
            menorMaior = undefined;
           
        })
    

    /*  PREENCHER SELECT NA PAGINA LISTAGEM.PHP    */ 
    

    $.ajax({
        type: 'GET',		    //Definimos o método HTTP usado
        dataType: 'json',	            //Definimos o tipo de retorno
        url: './php/PopularSelectProcedimento.php',    //Definindo o arquivo onde serão buscados os dados
        success: function (dados) {
            $("#selectProcedimento").append($('<option>',{
                text: "Selecionar Procedimento",
                value: 0
            }));

            for (var i = 0; dados.length > i; i++) {
                //Adicionando registros retornados na tabela
                $("#selectProcedimento").append($('<option>',{
                    value: dados[i].id_procedimento,
                    text: dados[i].tipo_procedimento
                }))

              }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });
    

    $.ajax({
        type: 'GET',		    //Definimos o método HTTP usado
        dataType: 'json',	            //Definimos o tipo de retorno
        url: './php/PopularSelectCidade.php',    //Definindo o arquivo onde serão buscados os dados
        success: function (dados) {
            $("#selectCidade").append($('<option>',{
                text: "Selecionar Cidade",
                value: 0
            }));

            for (var i = 0; dados.length > i; i++) {
                //Adicionando registros retornados na tabela
                $("#selectCidade").append($('<option>',{
                    value: dados[i].id_cidade,
                    text: dados[i].nome_cidade
                }))
              }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });



     /*  PREENCHER SELECT NA PAGINA LISTAGEM.PHP    */     
     $.ajax({
        type: 'GET',		    //Definimos o método HTTP usado
        dataType: 'json',	            //Definimos o tipo de retorno
        url: './php/PopularSelectUsuairo.php',    //Definindo o arquivo onde serão buscados os dados
        success: function (dados) {
            $("#selectUsuario").append($('<option>',{
                text: "Selecionar Usuario",
                value: 0
            }));

            for (var i = 0; dados.length > i; i++) {
                //Adicionando registros retornados na tabela
                $("#selectUsuario").append($('<option>',{
                    value: dados[i].id_usuario,
                    text: dados[i].nome_usuario
                }))

              }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });

    /*  PREENCHER SELECT NA PAGINA LISTAGEM.PHP    */
    $('#selectTecnico').empty();       //Limpando Select


    $.ajax({
        type: 'GET',		    //Definimos o método HTTP usado
        dataType: 'json',	            //Definimos o tipo de retorno
        url: './php/PopularTecnico.php',    //Definindo o arquivo onde serão buscados os dados
        success: function (dados) {
            $("#selectTecnico").append($('<option>',{
                text: "Selecionar Tenico",
                value: 0
            }));
            for (var i = 0; dados.length > i; i++) {
                //Adicionando registros retornados na tabela
                $("#selectTecnico").append($('<option>',{
                    text: dados[i].nome_tecnico,
                    value: dados[i].id_tecnico
                }))

              }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });


    // PEGAR VALORES DA TABELA PARA PODER FAZER ALTERAÇÃO
    
     
   
     
    

    /*======================  POPULAR TABELA  ================================== */

    $('#tabela').empty();       //Limpando a tabela
    
    //REQUISIÇÃO AJAX PARA POPULAR AS TABELAS
    $.ajax({
        type: 'GET',		    //Definimos o método HTTP usado
        dataType: 'json',	            //Definimos o tipo de retorno
        url: './php/PopularTables.php',    //Definindo o arquivo onde serão buscados os dados
        success: function (dados) {
            for (var i = 0; dados.length > i; i++) {
                //Adicionando registros retornados na tabela
                $('#tabela').append('<tr><td>' + dados[i].id_ativacao + '</td><td>' + dados[i].nome_usuario + '</td><td>' + dados[i].nome_tecnico + '</td><td>'+ dados[i].nomeCliente_ativacao + '</td><td>'+ dados[i].tipo_procedimento +'</td><td>'+ dados[i].Hpedido_ativacao + '</td><td>'+ dados[i].Hinicio_ativacao + '</td><td>'+ dados[i].Hfinal_ativacao+'</td><td>'+ dados[i].Hduracao_ativacao + '</td><td>'+ dados[i].nome_cidade + '</td><td>'+ dados[i].patrimonio_ativacao + '</td><td>'+ dados[i].mac_ativacao + '</td><td>'+ dados[i].obs_ativacao +'</td></tr>');
            }
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });


    
});

export { menorMaior };
