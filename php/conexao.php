<?php

    $servidor="localhost";
    $usuario="adm_move";
    $senha="Adm#vivas";
    $dbname="controle_ativacao";

    $conn = mysqli_connect($servidor,$usuario,$senha,$dbname);
    
        if(!$conn){
            die ("Falha na conexão".mysqli_connect_error());
        }
