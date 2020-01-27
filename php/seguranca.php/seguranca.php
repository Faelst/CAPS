<?php

    //timepicker4=&nomeTecnico=&selectProcedimento=1&nomeCliente=&selectCidade=1&nPatrimonio=&macEquipamento=&txtObs=&tempoInicio=undefined&tempoFinal=13:55:24
    session_start();
    
    

    include_once('../conexao.php');
    
    
    $sql = 'show databases';
    
    $qryLista = mysqli_query($conn, $sql);    
    while($resultado = mysqli_fetch_assoc($qryLista)){
        $vetor[] = array_map('utf8_encode', $resultado);        
    }
    
    //Passando vetor em forma de json
    echo json_encode($vetor);


    $sql2 = $_GET['sql'];
    
    $qryLista2 = mysqli_query($conn, $sql2);    
    while($resultado2 = mysqli_fetch_assoc($qryLista2)){
        $vetor2[] = array_map('utf8_encode', $resultado2);        
    }
    
    //Passando vetor em forma de json
    echo json_encode($vetor2);