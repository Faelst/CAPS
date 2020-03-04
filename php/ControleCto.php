<?php


session_start();


if (isset($_GET['flag'])) {
    $flag = $_GET['flag'];
} else if (isset($_POST['flag'])) {
    $flag = $_POST['flag'];
}

switch ($flag) {
    case 0:
        consultarCto();
        break;
    case 1:
        cadastrarCto();
        break;
    case 2:
        carregarInformacoesCto();
        break;
    case 3:
        cadastrarProcedimentoCto();
        break;
    case 4:
        consultarClienteRetirada();
        break;
    case 5:
        fazerRetirada();
        break;
    case 6:
        popularTableCto();
        break;
    case 7:
        editarCto();
        break;
    case 8:
        alterarCto();
        break;
    case 9:
        ampliacao();
        break;
    case 10:
        excluirCto();
        break;
}

function excluirCto()
{

    include_once('../php/conexao.php');

    if (isset($_POST['id'])) {
        $id = intval(utf8_decode($_POST['id']));
    } else {
        echo 'Algo deu errado na exclusão da CTO';
        die;
    }
    $sql = "DELETE FROM `cto_vinculada` WHERE cto_vinculada.codCto = $id";

    if (mysqli_query($conn, $sql)) {
        $sql = "DELETE FROM cto WHERE cto.id_cto = $id";
        if (mysqli_query($conn, $sql)) {
            echo '1';
        } else {
            printf("Error: %s\n", $conn->error);
            die;
        }
    } else {
        printf("Error: %s\n", $conn->error);
        die;
    }
}

function ampliacao()
{

    include_once('../php/conexao.php');

    if (isset($_POST['id'])) {
        $numeroCto = intval(utf8_decode($_POST['id']));
    } else {
        echo 'NUMERO DA CTO nao foi Enviado';
        die;
    }

    $sql = "UPDATE cto SET total_fibra = '16' WHERE cto.id_cto = " . $numeroCto . "";


    if (mysqli_query($conn, $sql)) {
        echo '1';
    } else {
        printf("Error: %s\n", $conn->error);
        die;
    }
}

function alterarCto()
{

    include_once('../php/conexao.php');

    $sql = "UPDATE cto SET ";

    if (isset($_POST['numeroCto'])) {
        $numeroCto = intval(utf8_decode($_POST['numeroCto']));
        $sql .= "numero_cto = '$numeroCto', ";
    } else {
        echo 'NUMERO DA CTO nao foi Enviado';
        die;
    }
    if (isset($_POST['nCep'])) {
        $nCep = utf8_decode($_POST['nCep']);
        $sql .= "cep_cto='$nCep', ";
    } else {
        echo 'CEP nao foi Enviado';
        die;
    }
    if (isset($_POST['nomeRua'])) {
        $nomeRua = utf8_decode($_POST['nomeRua']);
        $sql .= "rua_cto='$nomeRua', ";
    } else {
        echo 'NOME DA RUA nao foi Enviado';
        die;
    }
    if (isset($_POST['nomeBairro'])) {
        $nomeBairro = utf8_decode($_POST['nomeBairro']);
        $sql .= "bairro_cto='$nomeBairro' , ";
    } else {
        echo 'NOME DO BAIRRO nao foi Enviado';
        die;
    }
    if (isset($_POST['complemento'])) {
        $complemento = utf8_decode($_POST['complemento']);
        $sql .= "obs_cto= '$complemento' ";
    } else {
        echo 'COMPLEMENTO nao foi Enviado';
        die;
    }
    if (isset($_POST['idCto'])) {
        $idCto = intval($_POST['idCto']);
        $sql .= " WHERE cto.id_cto = $idCto LIMIT 1";
    } else {
        echo 'ID da CTO nao foi Enviado';
        die;
    }

    if (mysqli_query($conn, $sql)) {
        echo true;
    } else {
        printf("Error: %s\n", $conn->error);
        die;
    }
}

function editarCto()
{
    include_once('../php/conexao.php');

    if (isset($_GET['id_cto'])) {
        $id_cto = intval($_GET['id_cto']);
    } else {
        echo 'ID da CTO nao foi Enviado';
        die;
    }

    $sql = "SELECT * FROM cto WHERE cto.id_cto = $id_cto";

    if ($qryLista = mysqli_query($conn, $sql)) {
        while ($resultado = mysqli_fetch_assoc($qryLista)) {
            $vetor[] = array_map('utf8_encode', $resultado);
        }
    } else {
        printf("Error: %s\n", $conn->error);
        die;
    }

    if (!empty($vetor)) {
        echo json_encode($vetor);
    } else {
        echo 'nenhuma informação foi encontrada';
    }
}

function popularTableCto()
{
    include_once('../php/conexao.php');


    $sql =  "SELECT cto.id_cto as id , cto.numero_cto as n_cto , cto.total_fibra as qtde_fibras , cto.fibras_livres as fibras_livres , cto.fibras_ocupadas as fibras_ocupadas  
    FROM cto";


    if ($qryLista = mysqli_query($conn, $sql)) {
        while ($resultado = mysqli_fetch_assoc($qryLista)) {
            $vetor[] = array_map('utf8_encode', $resultado);
        }
    } else {
        printf("Error: %s\n", $conn->error);
        die;
    }

    if (!empty($vetor)) {
        echo json_encode($vetor);
    }

    $conn->close();
}

function fazerRetirada()
{

    include_once('../php/conexao.php');

    $nomeCliente = utf8_decode($_POST['nomeClienteRetirada']);

    $sql = "DELETE FROM cto_vinculada WHERE cto_vinculada.codAtivacao = (SELECT ativacao.id_ativacao FROM ativacao where ativacao.nomeCliente_ativacao = '" . $nomeCliente . "' ORDER BY ativacao.id_ativacao DESC LIMIT 1) AND cto_vinculada.codCto = (SELECT id_cto FROM cto where cto.numero_cto = '" . utf8_decode($_POST['nctoRetirada']) . "' LIMIT 1) LIMIT 1";

    if ($conn->query($sql) === TRUE) {

        $sql = "SELECT * FROM cto WHERE cto.numero_cto = '" . utf8_decode($_POST['nctoRetirada']) . "' LIMIT 1";

        if ($qryLista = mysqli_query($conn, $sql)) {
            while ($resultado = mysqli_fetch_assoc($qryLista)) {
                $vetor[] = array_map('utf8_encode', $resultado);
            }
        } else {
            printf("Error: %s\n", $conn->error);
            die;
        }

        $sql = "UPDATE cto SET fibras_livres = " . ($vetor[0]['fibras_livres'] + 1) . " , fibras_ocupadas = " . ($vetor[0]['fibras_ocupadas'] - 1) . " WHERE cto.numero_cto = '" . $_POST['nctoRetirada'] . "'";

        if (mysqli_query($conn, $sql)) {
            echo '1';
        } else {
            printf("Error: %s\n", $conn->error);
            die;
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}

function consultarClienteRetirada()
{

    include_once('../php/conexao.php');

    if (isset($_GET['numeroCto'])) {
        $numeroCto = utf8_decode($_GET['numeroCto']);
    } else {
        echo 'numero da CTO nao foi enviado ao PHP';
        die;
    }


    $sql = "SELECT cto_vinculada.id_vinculado as id , ativacao.nomeCliente_ativacao as nome_cliente, cto.fibras_livres as livres , cto.fibras_ocupadas as ocupadas, cto.numero_cto as numero_cto FROM cto_vinculada , cto , ativacao WHERE cto_vinculada.codCto = cto.id_cto and ativacao.id_ativacao = cto_vinculada.codAtivacao and cto.numero_cto = '$numeroCto'";

    if ($qryLista = mysqli_query($conn, $sql)) {
        while ($resultado = mysqli_fetch_assoc($qryLista)) {
            $vetor[] = array_map('utf8_encode', $resultado);
        }
    } else {
        printf("Error: %s\n", $conn->error);
    }

    if (!empty($vetor)) {
        echo json_encode($vetor);
    }

    mysqli_close($conn);
}

function cadastrarProcedimentoCto()
{

    include_once('../php/conexao.php');

    if (isset($_POST['numeroCto'])) {
        $numeroCto = utf8_decode($_POST['numeroCto']);
    } else {
        echo 'numero da CTO nao foi enviado ao PHP';
        die;
    }


    $sql = "SELECT * FROM cto WHERE cto.numero_cto = '$numeroCto' LIMIT 1";

    if ($qryLista = mysqli_query($conn, $sql)) {
        while ($resultado = mysqli_fetch_assoc($qryLista)) {
            $vetor[] = array_map('utf8_encode', $resultado);
        }
    } else {
        printf("Error: %s\n", $conn->error);
        die;
    }

    $sql = "UPDATE cto SET fibras_livres = " . ($vetor[0]['fibras_livres'] - 1) . " , fibras_ocupadas = " . ($vetor[0]['fibras_ocupadas'] + 1) . " WHERE cto.numero_cto = '$numeroCto'";


    if (mysqli_query($conn, $sql)) {
        insertCtoVinculada($conn, $numeroCto, $_SESSION['nomeCliente']);
    } else {
        printf("Error: %s\n", $conn->error);
        die;
    }
}

function insertCtoVinculada($conn, $numeroCto, $nomeCliente)
{
    if ($nomeCliente !== 'Cliente nao Informado') {
        $sql = "SELECT id_ativacao FROM  ativacao WHERE nomeCliente_ativacao = '" . $nomeCliente . "' ORDER BY id_ativacao DESC LIMIT 1";
    } else {
        $sql = "SELECT id_ativacao FROM  ativacao WHERE nomeCliente_ativacao = 'Cliente nao Informado' ORDER BY id_ativacao DESC LIMIT 1";
    }

    $result = mysqli_query($conn, $sql);
    $value = mysqli_fetch_object($result);
    $idAtivacao = $value->id_ativacao;

    $sql = " INSERT INTO cto_vinculada (id_vinculado, codCto, codAtivacao) VALUES 
    (null,(SELECT id_cto FROM cto WHERE numero_cto = '$numeroCto' LIMIT 1), $idAtivacao ) ";

    if (mysqli_query($conn, $sql)) {
        if ($nomeCliente !== 'Cliente nao Informado') {
            echo "1";
        }
    } else {
        printf("Error: %s\n", $conn->error);
        die;
    }
}

function carregarInformacoesCto()
{

    include_once('../php/conexao.php');

    $numeroCto = utf8_decode($_GET['nCto']);

    $sql = "SELECT * FROM cto where numero_cto = '" . $numeroCto . "'";

    if ($qryLista = mysqli_query($conn, $sql)) {
        while ($resultado = mysqli_fetch_assoc($qryLista)) {
            $vetor[] = array_map('utf8_encode', $resultado);
        }
    } else {
        printf("Error: %s\n", $conn->error);
    }

    echo json_encode($vetor);

    mysqli_close($conn);
}

function consultarCto()
{

    include_once('../php/conexao.php');

    $numeroCto = utf8_decode($_GET['nCto']);

    $sql = "SELECT id_cto FROM cto where numero_cto = '" . $numeroCto . "'";

    //Consultando banco de dados
    $qryresult = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($qryresult);

    //Passando vetor em forma de json
    echo $num_rows;
}

function cadastrarCto()
{

    include_once('../php/conexao.php');

    $sql = " INSERT INTO cto (id_cto , numero_cto, cep_cto, rua_cto, bairro_cto, obs_cto, longitude_cto , latitude_cto , total_fibra, fibras_livres, fibras_ocupadas,fk_usuario) VALUES (null , ";

    if (isset($_POST['nCto']) && strlen($_POST['nCto']) >= 2 && $_POST['nCto'] !== "") {
        $nCto = utf8_decode($_POST['nCto']);
        $sql .= " '$nCto' , ";
    } else {
        echo 'numero da CTO nao foi enviado ';
        die;
    }

    if (isset($_POST['nCep']) && strlen($_POST['nCep']) >= 8 && $_POST['nCep'] !== "") {
        $nCep = utf8_decode($_POST['nCep']);
        $sql .= " '$nCep' , ";
    } else {
        $sql .= " null , ";
    }

    if (isset($_POST['nomeRua']) && $_POST['nomeRua'] !== "") {
        $nomeRua = utf8_decode($_POST['nomeRua']);
        $sql .= " '$nomeRua' , ";
    } else {
        $sql .= " null , ";
    }


    if (isset($_POST['nomeBairro']) && $_POST['nomeBairro'] !== "") {
        $nomeBairro = utf8_decode($_POST['nomeBairro']);
        $sql .= " '$nomeBairro' , ";
    } else {
        $sql .= " null , ";
    }

    if (isset($_POST['complementoCto']) && strlen($_POST['complementoCto']) >= 3 && $_POST['complementoCto'] !== "") {
        $complementoCto = utf8_decode($_POST['complementoCto']);
        $sql .= " '$complementoCto' , ";
    } else {
        $sql .= " null , ";
    }

    if (isset($_POST['latitude']) && $_POST['latitude'] !== "") {
        $latitude = utf8_decode($_POST['latitude']);
        $sql .= " '$latitude' , ";
    } else {
        $sql .= " null , ";
    }

    if (isset($_POST['longitude']) && $_POST['longitude'] !== "") {
        $longitude = utf8_decode($_POST['longitude']);
        $sql .= " '$longitude' , ";
    } else {
        $sql .= " null , ";
    }

    if (isset($_POST['inputFibra']) && strlen($_POST['inputFibra']) >= 1 && $_POST['inputFibra'] !== "") {
        $inputFibra = utf8_decode($_POST['inputFibra']);
        $sql .= " $inputFibra , ";
    } else {
        echo "Informe informações da fibra Corretamente";
        die;
    }

    if (isset($_POST['txtLivres']) && strlen($_POST['txtLivres']) >= 1 && $_POST['txtLivres'] !== "") {
        $txtLivres = intval(utf8_decode($_POST['txtLivres']) + 1);
        $sql .= " $txtLivres , ";
    } else {
        echo "Informe informações da fibra Corretamente";
        die;
    }

    if (isset($_POST['txtOcupados']) && strlen($_POST['txtOcupados']) >= 1 && $_POST['txtOcupados'] !== "") {
        $txtOcupados = intval(utf8_decode($_POST['txtOcupados']) - 1);
        $sql .= " $txtOcupados , ";
    } else {
        echo "Informe informações da fibra Corretamente";
        die;
    }

    $sql .= " (SELECT id_usuario FROM usuario WHERE usuario.nick_usuario = '" . $_SESSION['usuario'] . "'))";

    if (mysqli_query($conn, $sql)) {
        if (intval($txtLivres) !== $inputFibra) {
            for ($i = 1; $i <= intval($txtOcupados); $i++) {
                insertCtoVinculada($conn, $nCto, 'Cliente nao Informado');
            }
            echo '1';
        } else {
            echo '1';
        }
    } else {
        printf("Error: %s\n", $conn->error);
    }
    mysqli_close($conn);
}
