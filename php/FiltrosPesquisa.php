<?php


    $sql = "SELECT a.id_ativacao , a.data_ativacao, a.Hfinal_ativacao,
    a.Hpedido_ativacao , u.nome_usuario , t.nome_tecnico , a.nomeCliente_ativacao ,
    c.nome_cidade , r.nome_regiao , a.Hinicio_ativacao , a.Hduracao_ativacao , a.patrimonio_ativacao ,
    a.mac_ativacao , a.obs_ativacao , p.tipo_procedimento
    FROM procedimento as p,  ativacao as a , usuario as u , cidade as c , tecnico as t , regiao as r 
    where a.fk_usuario=u.id_usuario and c.id_cidade=a.fk_cidade and a.fk_tecnico = t.id_tecnico and r.id_regiao=a.fk_regiao and p.id_procedimento=a.fk_procedimento and ";
    

    if(isset($_GET['selectUsuario']) && $_GET['selectUsuario'] !== "0"){
        $sql .="a.fk_usuario=".$_GET['selectUsuario']." and ";
    }
    
    if(isset($_GET['selectCidade']) && $_GET['selectCidade'] !== "0"){
        $sql .="a.fk_cidade=".$_GET['selectCidade']." and ";
    }
 
    if(isset($_GET['selectTecnico']) && $_GET['selectTecnico'] !== "0"){
        if(!empty($_GET['selectTecnico'])){
            $sql .= "a.fk_tecnico = (SELECT id_tecnico from tecnico where nome_tecnico like '%{$_GET['selectTecnico']}%') and ";
        }
    }
    
    if(isset($_GET['selectProcedimento']) && $_GET['selectProcedimento'] !== "0"){
        $sql .= "a.fk_procedimento={$_GET['selectProcedimento']} and ";
    }

    if(isset($_GET['txtTempo']) && $_GET['txtTempo'] !== "0" && $_GET['txtTempo'] !== "" && $_GET['menorMaior'] !== "undefined"){    
     $sql .= "a.Hduracao_ativacao {$_GET['menorMaior']}= '00:{$_GET['txtTempo']}' and ";
    }
    
    if($_GET['txtDataInicio'] <= $_GET['txtDataFinal'] ){
        if($_GET['txtDataFinal'] !== '' ){
            $date = str_replace('/', '-', $_GET['txtDataInicio'] );
            $txtDataInicio = date("Y-m-d", strtotime($date));
            $date = str_replace('/', '-', $_GET['txtDataFinal'] );
            $txtDataFinal = date("Y-m-d", strtotime($date));
            $sql .= "a.data_ativacao BETWEEN '".$txtDataInicio."' and '".$txtDataFinal."' and ";
            }
        }
    

    if(isset($_GET['horarioInicial']) && isset($_GET['horarioFinal'])){
        if(($_GET['horarioInicial']) < ($_GET['horarioFinal'])){
            $sql .= "a.Hinicio_ativacao between '".$_GET['horarioInicial']."' AND '".$_GET['horarioFinal']."' AND ";
        }
    }

    if(isset($_GET['txtMac'])){
        if(!empty($_GET['txtMac'])){
            $sql .= "a.mac_ativacao like '%".$_GET['txtMac']."%' and "; 
        }
    }
    
    if(isset($_GET['txtPatrimonio'])){
        if(!empty($_GET['txtPatrimonio'])){
            $sql .= "a.patrimonio_ativacao like '%".$_GET['txtPatrimonio']."%' and "; 
        }
    }
   
    $sql = substr_replace($sql,"",-5);
    
    $sql .= " ORDER By a.id_ativacao DESC";
    
    include_once('../php/conexao.php');

    //Consultando banco de dados
    $qryLista = mysqli_query($conn, $sql);    

    
    while($resultado = mysqli_fetch_assoc($qryLista)){
        
        $vetor[] = array_map('utf8_encode', $resultado);
    }    
   
    if ( !empty($vetor) == 0 ){
        echo null;
    }else {
        echo json_encode($vetor);
    }
   
    //Passando vetor em forma de json

