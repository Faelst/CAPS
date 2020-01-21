
$("#btnListar").click(function(e) {
        carregar();
        e.preventDefault();
        console.log("passando");
 
        function carregar (){
        $.ajax({
        dataType: 'json',
        cache: false,
        url: "../Controle-Ativacao/excluidos/controleTeste.php",
        async: true,
        
    });
}
});
