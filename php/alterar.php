<?php

if($_GET['flag']=='pesquisar'){
    pesquisar();
}else if($_GET['flag']=='alterar'){
    alterar();
}

function alterar (){
    
    $sql = "UPDATE `ativacao` SET ";
    
    
    
    
    
    
    if(isset($_GET['nomeTecnico'])){
        
        $sql .= " fk_tecnico =(SELECT tecnico.id_tecnico FROM tecnico WHERE tecnico.nome_tecnico = '{$_GET['nomeTecnico']}'),";
    }
    if(isset($_GET['selectProcedimento'])){
        
        $sql .= " fk_procedimento = {$_GET['selectProcedimento']},";
    }
    if(isset($_GET['nomeCliente'])){
        
        $sql .= " nomeCliente_ativacao = '{$_GET['nomeCliente']}',";
    }
    if(isset($_GET['selectCidade'])){

        //Verificar Região da Ativação
        if($_GET['selectCidade']=="1"){
            $regiao = 1;
        }  else if($_GET['selectCidade']=="2"){
            $regiao = 1;
        } else if($_GET['selectCidade']=="3"){
            $regiao = 1;
        } else if($_GET['selectCidade']=="4"){
            $regiao = 2;
        } else if($_GET['selectCidade']=="5"){
            $regiao = 3;
        } else if($_GET['selectCidade']=="6"){
            $regiao = 3;
        } else if($_GET['selectCidade']=="7"){
            $regiao = 4;
        } else if($_GET['selectCidade']=="8"){
            $regiao = 4;
        } else if($_GET['selectCidade']=="9"){
            $regiao = 5;
        }else if($_GET['selectCidade']=="10"){
            $regiao = 6;
        }else if($_GET['selectCidade']=="11"){
            $regiao = 6;
        }else if($_GET['selectCidade']=="12"){
            $regiao = 6;
        }
        
        $sql .= " fk_cidade = {$_GET['selectCidade'] }, fk_regiao = $regiao,";
    }
    if(isset($_GET['Patrimonio'])){
        
        $sql .= " patrimonio_ativacao = '{$_GET['Patrimonio']}',";
    }
    if(isset($_GET['macEquipamento'])){
        
        $sql .= " mac_ativacao = '{$_GET['macEquipamento']}',";
    }
    if(isset($_GET['txtObs'])){
        
        $sql .= " obs_ativacao = '{$_GET['txtObs']}' ,";
    }
    
    $sql = rtrim($sql, ',');

    $sql .= " WHERE id_ativacao = {$_GET['idAlterar']}";
    
    include_once('../php/conexao.php');

    if (mysqli_query($conn, $sql)) {
        echo "Alterado com Sucesso";
    } else {
        echo "Erro ao deletar: " . mysqli_error($conn);
    }

}



function pesquisar(){

if(isset($_GET['idAlteracao'])||empty($_GET['idAlteracao'])){
   $id = $_GET['idAlteracao'];
}else{
    echo 'Nenhuma informação foi encontrada com esse ID.\nTente Novamente';
}

$sql = 'SELECT a.id_ativacao , t.nome_tecnico , a.fk_cidade , a.nomeCliente_ativacao , a.fk_procedimento , a.patrimonio_ativacao, a.mac_ativacao , a.obs_ativacao';
$sql .= ' from ativacao as a , tecnico as t ';
$sql .= "where a.fk_tecnico=t.id_tecnico and a.id_ativacao={$id}";

include_once('../php/conexao.php');

$qryLista = mysqli_query($conn, $sql);

    if (mysqli_num_rows($qryLista)) {

        while ($resultado = mysqli_fetch_assoc($qryLista)) {
            $vetor[] = array_map('utf8_encode', $resultado);
        }
        //Passando vetor em forma de json

        echo json_encode($vetor);

        die();
    } else {
        echo '';
        die();
    }


}