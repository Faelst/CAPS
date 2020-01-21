<?php

    //timepicker4=&nomeTecnico=&selectProcedimento=1&nomeCliente=&selectCidade=1&nPatrimonio=&macEquipamento=&txtObs=&tempoInicio=undefined&tempoFinal=13:55:24
    session_start();
    
    //fk_usuario
    $nomeUsuario = $_POST['nomeUsuario'];
    
    $senhaAtual=$_POST['senhaAtual'];

    $novaSenha=$_POST['novaSenha'];

    

    

    include_once('../php/conexao.php');
    $sql = "SELECT id_usuario , senha_usuario FROM usuario WHERE nick_usuario='".$nomeUsuario."'";
    
    $result = mysqli_query($conn,$sql);
    $rows = mysqli_fetch_assoc($result);
    $rows['id_usuario'];
    $sql2 = "UPDATE `usuario` SET `senha_usuario` = '".$novaSenha."' WHERE id_usuario=".$rows['id_usuario']."";

    if(($rows >= 1) && ($rows['senha_usuario']==$senhaAtual)){
        mysqli_query($conn, $sql2);
        echo "Senha Alterada com sucesso";
   }else {
    echo "ERRO \n Verifique se todos os campos foram preenchidos corretamente.";
        
    }

    mysqli_close($conn);
    