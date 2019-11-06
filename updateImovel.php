<?php

require_once 'db_connect.php';

//sessões 
session_start();

    $proprietario_id = $_GET['proprietario_id'];


    $rua = mysqli_escape_string($connect, $_POST['rua']);
    $bairro = mysqli_escape_string($connect, $_POST['bairro']);
    $numero = mysqli_escape_string($connect, $_POST['numero']);
    $cep = mysqli_escape_string($connect, $_POST['cep']);
    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $estado = mysqli_escape_string($connect, $_POST['estado']);
    $pais = mysqli_escape_string($connect, $_POST['pais']);

    $codigo_imovel = mysqli_escape_string($connect, $_POST['codigo_imovel']);
    $codigo_proprietario = mysqli_escape_string($connect, $_POST['codigo_proprietario']);
    $tipo = mysqli_escape_string($connect, $_POST['tipo']);
    $area = mysqli_escape_string($connect, $_POST['area']);
    $valor = mysqli_escape_string($connect, $_POST['valor']);
   
    $status = mysqli_escape_string($connect, $_POST['status']);
    $informacoes = mysqli_escape_string($connect, $_POST['informacoes']);

    
    
   

    if(isset($_POST['btn-buscar'])):
        header('Location: listarProprietariosimples.php');
    endif;
 

    if(isset($_POST['btn-voltar'])):
        header('Location: home.php');
    endif;

    if(empty($codigo_imovel)or empty($codigo_proprietario)or empty($tipo)or empty($area)or empty($valor)or empty($status)or empty($informacoes)
    or empty($rua)or empty($bairro)or empty($numero)or empty($cep)or empty($cidade)or empty($estado)or empty($pais)):
        $erros[] = "<li> Preecha todos os campos</li>";
    else:
    
        $sqlendereco = " INSERT INTO endereco(rua,bairro,numero,cep,cidade,estado,pais) values ('$rua','$bairro','$numero','$cep','$cidade','$estado','$pais')";

        if(mysqli_query($connect,  $sqlendereco)):
            //
        else:
            echo 'erro';
        endif;




         $sql = " INSERT INTO imovel(codigo_imovel,codigo_proprietario,tipo,area,valor,status,informacoes,enderecoimoID) values ('$codigo_imovel','$codigo_proprietario','$tipo','$area','$valor','$status','$informacoes',LAST_INSERT_ID())";

        if(mysqli_query($connect, $sql)):
            echo "<script>alert('Cadastrado com sucesso!');</script>";

            header('Location: home.php');
           
           
        else:
            echo 'erro';
        endif;



    endif;

   


?>