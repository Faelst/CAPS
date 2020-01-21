<?php


    //timepicker4=&nomeTecnico=&selectProcedimento=1&nomeCliente=&selectCidade=1&nPatrimonio=&macEquipamento=&txtObs=&tempoInicio=undefined&tempoFinal=13:55:24
    session_start();
    
    //fk_usuario

    
    include_once('../php/conexao.php');
    
    
    $query = "select nome_tecnico from tecnico";

    //Consultando banco de dados
    $qryLista = mysqli_query($conn,$query);    
    while($resultado = mysqli_fetch_assoc($qryLista)){
        $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    //Passando vetor em forma de json
    echo json_encode($vetor);


    mysqli_close($conn);
    
