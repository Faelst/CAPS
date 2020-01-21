

$('#btnAlterarSenha').click(function(e){

    e.preventDefault();

    var dados = "&nomeUsuario=" + $('#nomeUsuario').val() + "&senhaAtual=" + $('#senhaAtual').val()+"&novaSenha="+$('#novaSenha').val()+"&confirmarSenha="+$('#confirmarSenha').val();

    if($('#novaSenha').val()==$('#confirmarSenha').val()){
        $.ajax({
        type: 'POST',
        dataType: 'html',
        url: "./php/AlterarSenha.php",
        async: true,
        data: dados,
        success: function (response) {    
            alert(response);
            location.reload();
        }
    });
}else {
    alert('Digite as informações Corretamente.');
}
    

})