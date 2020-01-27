<?php

include_once('../php/conexao.php');

    $sql = "SELECT a.id_ativacao , a.data_ativacao, a.Hfinal_ativacao, a.Hpedido_ativacao , u.nome_usuario , t.nome_tecnico , a.nomeCliente_ativacao , c.nome_cidade , r.nome_regiao , a.Hinicio_ativacao , a.Hduracao_ativacao , a.patrimonio_ativacao , a.mac_ativacao , a.obs_ativacao , p.tipo_procedimento FROM procedimento as p,  ativacao as a , usuario as u , cidade as c , tecnico as t , regiao as r where a.fk_usuario=u.id_usuario and c.id_cidade=a.fk_cidade and a.fk_tecnico = t.id_tecnico and r.id_regiao=a.fk_regiao and p.id_procedimento=a.fk_procedimento ORDER By a.id_ativacao DESC LIMIT 100000";

    //Consultando banco de dados
    $qryLista = mysqli_query($conn, $sql);    
    while($resultado = mysqli_fetch_assoc($qryLista)){
        $vetor[] = array_map('utf8_encode', $resultado);
        
    }    
    
    //Passando vetor em forma de json
    echo json_encode($vetor);