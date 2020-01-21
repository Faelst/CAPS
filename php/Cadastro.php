<?php

    //timepicker4=&nomeTecnico=&selectProcedimento=1&nomeCliente=&selectCidade=1&nPatrimonio=&macEquipamento=&txtObs=&tempoInicio=undefined&tempoFinal=13:55:24
    session_start();
    
    //fk_usuario
    $nomeUsuario = $_SESSION['usuario'];
    
    
    //`fk_cidade`
    $cidadeProc =$_POST['selectCidade']; 
    
    //Verificar Região da Ativação
    if($cidadeProc=="1"){
        $regiao = 1;
    }  else if($cidadeProc=="2"){
        $regiao = 1;
    } else if($cidadeProc=="3"){
        $regiao = 1;
    } else if($cidadeProc=="4"){
        $regiao = 2;
    } else if($cidadeProc=="5"){
        $regiao = 3;
    } else if($cidadeProc=="6"){
        $regiao = 3;
    } else if($cidadeProc=="7"){
        $regiao = 4;
    } else if($cidadeProc=="8"){
        $regiao = 4;
    } else if($cidadeProc=="9"){
        $regiao = 5;
    }else if($cidadeProc=="10"){
        $regiao = 6;
    }
        
    //Hpedido_ativacao
    $horaPedidoProc = $_POST['timepicker4'];

    //`Hinicio_ativacao`
    $horaInicioProc = $_POST['tempoInicio'];
    $horaInicio = new DateTime($horaInicioProc);

    //`Hfinal_ativacao`
    $horaFinalProc = $_POST['tempoFinal'];
    $horaFinal = new DateTime($horaFinalProc);

    //Hduracao_ativacao
    $diff =  $horaInicio -> diff($horaFinal); 
    $horaDuracaoProc = $diff->format( '%H:%I:%S' );
    
    //`fk_tecnico`
     $nomeTecnico = utf8_decode($_POST['nomeTecnico']);
    
    //`fk_procedimento`
    $procedimento = $_POST['selectProcedimento'];
    
    //nomeCliente_ativacao
    $nomeCliente = utf8_decode($_POST["nomeCliente"]);
      
    //patrimonio_ativacao
    $patrEquipamento =$_POST["nPatrimonio"];
    
    //mac_ativacao
    $macEquipamento = $_POST["macEquipamento"];
    
    //obs_ativacao
    $obs = utf8_decode($_POST["txtObs"]);
    
    include_once('../php/conexao.php');
    
    $sql = "INSERT INTO `ativacao`(`id_ativacao`, `fk_usuario`, `fk_cidade`, `fk_regiao`, `fk_procedimento`, `fk_tecnico`, `nomeCliente_ativacao`, `data_ativacao`, `Hpedido_ativacao`, `Hinicio_ativacao`, `Hfinal_ativacao`, `Hduracao_ativacao`, `patrimonio_ativacao`, `mac_ativacao`, `obs_ativacao`) VALUES (null,(select id_usuario from usuario where nick_usuario='".$nomeUsuario."'),$cidadeProc,$regiao,$procedimento,(select id_tecnico from tecnico where nome_tecnico like '%".$nomeTecnico."%'),'".$nomeCliente."',(SELECT CURRENT_DATE),'".$horaPedidoProc."','".$horaInicioProc."','".$horaFinalProc."','".$horaDuracaoProc."','".$patrEquipamento."','".$macEquipamento."','".$obs."');";    
    
    if (mysqli_query($conn, $sql)) {
          echo "1";
    } else {
          echo "0";
    }
    mysqli_close($conn);
    