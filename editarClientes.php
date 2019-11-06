<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();

  //  $cliente_id = $_GET['cliente_id'];

    $cliente_id = $_GET['cliente_id'];

    $sql = "SELECT * FROM cliente join endereco 
    where cliente_id = '$cliente_id' and enderecoID = endereco_id";
    $resultado = mysqli_query($connect, $sql);
    $row_cliente = mysqli_fetch_assoc($resultado);


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
    <link rel="stylesheet" type="text/css" href="css/estiloImovelll.css" />
    
    <title>Imobiliaria</title>
</head>
<body>
    <h1> Imobiliaria Rocha <i class="glyphicon glyphicon-map-marker"></i></h1>
    <h2> <i class="glyphicon glyphicon-user"></i> Editar cliente</h2><br>
 
    <hr>
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    
    <div>
        <form action="update.php?cliente_id=<?php echo $row_cliente['cliente_id']; ?>" method="POST">
       


                <input name cliente_id = "cliente_id" type = "hidden" value = " <?php echo $row_cliente['cliente_id'];?>"/>
                Código cliente: &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="codigo_cliente" value = "
                 <?php echo $row_cliente['codigo_cliente'];?>"><br>
                Nome:  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="nome" value = "
                <?php echo $row_cliente['nome'];?>"><br>
                RG:  &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="rg" value = "
                <?php echo $row_cliente['rg'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp
                CPF: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp<input type="text" name="cpf" value = "
                 <?php echo $row_cliente['cpf'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp
                Telefone: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="telefone" value = "
                 <?php echo $row_cliente['telefone'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp
                celular: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp<input type="text" name="celular" value = "
                 <?php echo $row_cliente['celular'];?>"><br>
                E-mail: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="email" value = "
                 <?php echo $row_cliente['email'];?>">
                

                <h2> <i class="glyphicon glyphicon-map-marker"></i> Endereço</h2><br>
                
                <input type="hidden" name="endereco_id" value = "
                 <?php echo $row_cliente['endereco_id'];?>"><br>
                Rua: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="rua" value = "
                 <?php echo $row_cliente['rua'];?>"> <br>
                Bairro: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="bairro" value = "
                 <?php echo $row_cliente['bairro'];?>"> &nbsp&nbsp&nbsp&nbsp&nbsp
                Nº:   &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="numero" value = "
                 <?php echo $row_cliente['numero'];?>"><br>
                CEP: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cep" value = "
                 <?php echo $row_cliente['cep'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp
                Cidade: &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cidade" value = "
                 <?php echo $row_cliente['cidade'];?>"><br>
                Estado: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="estado" value = "
                 <?php echo $row_cliente['estado'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp 
                País: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="pais" value = "
                 <?php echo $row_cliente['pais'];?>"><br>
                <center>
                <button type="submit" name="btn-editar">Editar</button>
                <button type="submit" name="btn-voltar">Voltar</button>

                </center>
                
        </form>
    </div>


    
</body>
</html>