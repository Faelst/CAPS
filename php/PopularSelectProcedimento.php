<?php

include_once('../php/conexao.php');

    $sql = "SELECT id_procedimento, tipo_procedimento from procedimento";

    //Consultando banco de dados
    $qryLista = mysqli_query($conn, $sql);    
    while($resultado = mysqli_fetch_assoc($qryLista)){
        $vetor[] = array_map('utf8_encode', $resultado);        
    }
    
    //Passando vetor em forma de json
    echo json_encode($vetor);