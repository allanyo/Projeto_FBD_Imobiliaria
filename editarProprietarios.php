<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();

$proprietario_id = $_GET['proprietario_id'];

$sql = "SELECT * FROM proprietario join endereco 
where proprietario_id = '$proprietario_id' and enderecoPId = endereco_id";
$resultado = mysqli_query($connect, $sql);
$row_proprietario = mysqli_fetch_assoc($resultado);


if(isset($_POST['btn-voltar'])):
header('Location: home.php');
endif;




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estiloImovell.css" />
    
    <title>Imobiliaria</title>
</head>
<body>
    <h1> Imobiliaria Rocha <i class="glyphicon glyphicon-map-marker"></i></h1>
    <h2> <i class="glyphicon glyphicon-user"></i> Cadastro de proprietario</h2><br>
 
    <hr>
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    
    <div>
        <form action="updateProprietario.php?proprietario_id=<?php echo $row_proprietario['proprietario_id']; ?>" method="POST">
                
                Código Proprietario: &nbsp<input type="text" name="codigo_proprietario" value = "
                 <?php echo $row_proprietario['codigo_proprietario'];?>"><br>
                 Nome:  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="nome" value = "
                <?php echo $row_proprietario['nome'];?>"><br>
                RG:  &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="rg" value = "
                <?php echo $row_proprietario['rg'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp
                CPF: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp<input type="text" name="cpf" value = "
                 <?php echo $row_proprietario['cpf'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp
                Telefone: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="telefone" value = "
                 <?php echo $row_proprietario['telefone'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp
                celular: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp<input type="text" name="celular" value = "
                 <?php echo $row_proprietario['celular'];?>"><br>
                E-mail: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="email" value = "
                 <?php echo $row_proprietario['email'];?>">
                

                <h2> <i class="glyphicon glyphicon-map-marker"></i> Endereço</h2><br>
                
                <input type="hidden" name="endereco_id" value = "
                 <?php echo $row_proprietario['endereco_id'];?>"><br>
                Rua: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="rua" value = "
                 <?php echo $row_proprietario['rua'];?>"> <br>
                Bairro: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="bairro" value = "
                 <?php echo $row_proprietario['bairro'];?>"> &nbsp&nbsp&nbsp&nbsp&nbsp
                Nº:   &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="numero" value = "
                 <?php echo $row_proprietario['numero'];?>"><br>
                CEP: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cep" value = "
                 <?php echo $row_proprietario['cep'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp
                Cidade: &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cidade" value = "
                 <?php echo $row_proprietario['cidade'];?>"><br>
                Estado: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="estado" value = "
                 <?php echo $row_proprietario['estado'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp 
                País: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="pais" value = "
                 <?php echo $row_proprietario['pais'];?>"><br>
                <center>
                <button type="submit" name="btn-editar">Editar</button>
                <button type="submit" name="btn-voltar">Voltar</button>
                </center>
                
        </form>
    </div>


    
</body>
</html>