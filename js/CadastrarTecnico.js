

var contadorFlag = 0;

$(document).ready(function () {

    
    $("#nome").css("border-color", "orange");
    $("#sobreNome").css("border-color", "orange");
    $("#inputGroupSelect01").css("border-color", "orange");
    $("#exampleFormControlTextarea4").css("border-color", "orange");
    


    $('#btnCadastrarTecnico').click(function(e){

       /* 
        var windowName = 'userConsole'; 
        var popUp = window.open('/popup-page.php', windowName, 'width=1000, height=700, left=24, top=24, scrollbars, resizable');
        if (popUp == null || typeof(popUp)=='undefined') { 	
            alert('Please disable your pop-up blocker and click the "Open" link again.'); 
        } 
        else { 	
            popUp.focus();
        }*/

        
        function validarCampo(p1) {
            if ($(p1).val() == "" || $(p1).val() == "0") {
              e.preventDefault();
              $(p1).css("border-color", "red");
            } else {
              $(p1).css("border-color", "orange");
              contadorFlag += 1;
              console.log(contadorFlag)
            }
          }  

        var dados = $('#cadastrarTecnico').serialize()

        e.preventDefault();
        validarCampo("#nome");
        validarCampo("#sobreNome");
        validarCampo("#inputGroupSelect01");
        validarCampo("#exampleFormControlTextarea4")

        if(contadorFlag == "4"){
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: "./php/CadastrarTecnico.php",
            async: true,
            data: dados,
            success: function (response) {    
                $('#btnCadastrar').val('Cadastrar');
                alert(response);
                limparCampo();
            }
        });
    }else {
        alert("Cadastre as informações do tecnico Corretamente.");
    }

    
    })
    
})