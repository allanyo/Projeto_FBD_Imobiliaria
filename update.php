<?php

require_once 'db_connect.php';

//sessões 
session_start();

$cliente_id = $_GET['cliente_id'];



    $rua = mysqli_escape_string($connect, $_POST['rua']);
    $bairro = mysqli_escape_string($connect, $_POST['bairro']);
    $numero = mysqli_escape_string($connect, $_POST['numero']);
    $cep = mysqli_escape_string($connect, $_POST['cep']);
    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $estado = mysqli_escape_string($connect, $_POST['estado']);
    $pais = mysqli_escape_string($connect, $_POST['pais']);

    $codigo_cliente = mysqli_escape_string($connect, $_POST['codigo_cliente']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $rg = mysqli_escape_string($connect, $_POST['rg']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);
    $celular = mysqli_escape_string($connect, $_POST['celular']);
    $email = mysqli_escape_string($connect, $_POST['email']);


    $sql = " UPDATE cliente join endereco on endereco_id = enderecoId SET codigo_cliente='$codigo_cliente',nome='$nome',
    rg='$rg',cpf='$cpf',telefone='$telefone',celular='$celular',email='$email',rua ='$rua',bairro='$bairro',
    numero='$numero',cep='$cep',cidade='$cidade',estado='$estado',pais='$pais' where cliente_id = '$cliente_id'";

    if(mysqli_query($connect, $sql)):
        header('Location: buscaCliente.php');
    else:
        echo 'erro';
    endif;




 



?>