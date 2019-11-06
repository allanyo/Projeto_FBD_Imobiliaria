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

    $codigo_proprietario = mysqli_escape_string($connect, $_POST['codigo_proprietario']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $rg = mysqli_escape_string($connect, $_POST['rg']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);
    $celular = mysqli_escape_string($connect, $_POST['celular']);
    $email = mysqli_escape_string($connect, $_POST['email']);

    $sql = " UPDATE proprietario join endereco on endereco_id = enderecoPId SET codigo_proprietario='$codigo_proprietario',nome='$nome',
    rg='$rg',cpf='$cpf',telefone='$telefone',celular='$celular',email='$email',rua ='$rua',bairro='$bairro',
    numero='$numero',cep='$cep',cidade='$cidade',estado='$estado',pais='$pais' where proprietario_id = '$proprietario_id'";

    if(mysqli_query($connect, $sql)):
        header('Location: buscaproPrietario.php');
    else:
        echo 'erro';
    endif;

    ?>