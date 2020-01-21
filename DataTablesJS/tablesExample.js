$(document).ready(function() {

    $('#example').DataTable( {
        
        "ordering": true,
        "language": {
            "url": "JsonTabela/Portuguese-Brasil.json",
        },
        ajax: {
            url: './php/PopularTables.php',
            dataSrc: ''
        },
        
        columns: [ 
            { 'data' : 'id_ativacao' },
            { 'data' : 'data_ativacao' },
            { 'data' : 'nome_usuario' },
            { 'data' : 'nome_tecnico' },
            { 'data' : 'nomeCliente_ativacao' },
            { 'data' : 'tipo_procedimento' },
            { 'data' : 'Hpedido_ativacao' },
            { 'data' : 'Hinicio_ativacao' },
            { 'data' : 'Hduracao_ativacao' },
            { 'data' : 'nome_cidade' },
            { 'data' : 'patrimonio_ativacao' },
            { 'data' : 'mac_ativacao' },
            { 'data' : 'obs_ativacao' },
         ]
    } );

    var table = $('#example').DataTable();
 
    table.columns(0).order( 'desc' ).draw();
    
} );