<?php
$first  = new DateTime( '11:00:45' );
$second = new DateTime( '12:00:45' );

$diff = $first->diff( $second );

echo date('Y-m-d');
echo "<br>";
echo $diff->format( '%H:%I:%S' );
    
    /*
    $host="localhost";
    $user="root";
    $pass="";
    $db="controle_ativacao";
    
    $link = mysqli_connect($host,$user,$pass,$db);
    
    session_start();

    if((isset($_POST['username'])) && (isset($_POST['pass']))){
        $username=$_POST['username'];
        $password=$_POST['pass'];      

        $sql= "SELECT * FROM `usuario` WHERE nick_usuario='".$username."'and senha_usuario='".$password."' limit 1";
        $result= mysqli_query($link,$sql);
        
        if(mysqli_num_rows($result)==1){
            echo "<script> alert('Logado com Sucesso')
            </script>";
            header('Location: ../controle.html');
            exit();
           
        }else
            
            $_SESSION['loginErro'] = "Usuario ou Senha Invalida";

            header("Location: ../index.html");
            exit();
        }else{
            $_SESSION['loginErro'] = "Usuario ou Senha Invalida";

            header("Location: ../index.html");

        }
        */

?>
