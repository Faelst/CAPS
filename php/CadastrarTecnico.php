<?php
    session_start();

$nomeTecnico = $_POST['nome'];

$sobrenomeTecnico = $_POST['sobrenome'];

$cidade = $_POST['cidade'];
 
$obs =$_POST['obs'];

include_once('../php/conexao.php');
    
    $sql = "INSERT INTO `tecnico`(`id_tecnico`, `nome_tecnico`, `fk_cidade`, `des_tecnico`) VALUES (null,'".$nomeTecnico." ".$sobrenomeTecnico."', $cidade,'".$obs."')";
    

    if (mysqli_query($conn, $sql)) {
          echo "Tecnico Cadastrado com Sucesso";
    } else { 
        echo "CADASTRO INCORRETO \n Verifique se todos os campos foram preenchidos corretamente.";
    }
   