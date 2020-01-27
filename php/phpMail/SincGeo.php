<?php

echo "
    <script src='https://code.jquery.com/jquery-3.4.1.js' integrity='sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=' crossorigin='anonymous'></script>
    <script>
    
    var i = 0;
    var codigoEquipamento
  try{
    $.ajax({
      type: 'post',
      url: `http://netuno.geogridmaps.com.br/vivas/api/?exec=5AL7t0WyREW6tpbPnWcz/fichaTerminal/consultarCodigo`,
      dataType: 'json',
      async: false,
      data: {
        codigo: '" . $_GET['codigoCTO'] . "'
      }
    }).done(function(retorno) {
      codigoEquipamento = retorno.equipamentos[0].codigo
      
    });

  }
  catch (e) {
    alert('Algo aconteceu de errado // Contate o desenvolverdor')// declarações para manipular quaisquer exceções
    console.log(e); // passa o objeto de exceção para o manipulador de erro
 }

    do{
      i++;
      vincular(i);
    }while(i < " . ($_GET['vagasOcupadas'] ) . ")

    function vincular( i){
      
      try{
         $.ajax({
         type: 'post',
         url: `http://netuno.geogridmaps.com.br/vivas/api/?exec=5AL7t0WyREW6tpbPnWcz/fichaEquipamento/reservarPortaCliente`,
         dataType: 'json',
         async: false,
         data: {
           codigo: codigoEquipamento,
           porta:  i,
           id_integrador: '14937'  //Id de cliente nao indentificado.
         }
         }).done(function (resp){ 
              console.log(resp);
              if(resp.status == true){
                window.close()
              }
         })
        }
        catch (e) {
          // declarações para manipular quaisquer exceções
          alert('Algo aconteceu de errado Contate o desenvolverdor')// declarações para manipular quaisquer exceções
          console.log(e); // passa o objeto de exceção para o manipulador de erro
       }
    }
    </script>";
