<?php
    session_start();
    include_once('conexao.php');

    if(empty($_POST['username']) || empty($_POST['pass'])){
        header("Location: ../index.php");
        exit();
    } 
       
       $usuario = mysqli_real_escape_string($conn,$_POST['username']);
       $senha = mysqli_real_escape_string($conn,$_POST['pass']);

       $sql = "SELECT id_usuario FROM usuario WHERE nick_usuario = '{$usuario}' AND senha_usuario = '{$senha}'";
       $sql2 = "SELECT admin_user FROM usuario WHERE nick_usuario = '{$usuario}' AND senha_usuario = '{$senha}'";

       $result = mysqli_query($conn,$sql2);
       $rows = mysqli_fetch_assoc($result);
       $_SESSION['admin_user'] = $rows['admin_user']; 


      $result = mysqli_query($conn,$sql);
      $rows = mysqli_num_rows($result);
       
       if($rows == 1){
            $_SESSION['usuario'] = $usuario;
            header('location: ../controle.php');
            exit();
       }else {
            $_SESSION['loginIncorreto'] = "Login Incorreto";
            header('location: ../index.php');
            exit();
            
        }