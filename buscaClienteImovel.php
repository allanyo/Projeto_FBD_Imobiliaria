<?php

require_once 'db_connect.php';

session_start();

$cod_cliente = $_GET['cod_cliente'];


$sql = "SELECT cliente.codigo_cliente,cliente.nome,cliente.cpf FROM cliente where cliente.codigo_cliente = $cod_cliente";
$resultado = mysqli_query($connect, $sql);

if(isset($_POST['btn-voltar'])):
  header('Location:buscaImovel.php');
endif;

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/estilobuscacliente.css" />
  <title>Produtos</title>
</head>
<body>
<h1>Cliente</h1>
  <table >
    <tr>
    <td>CÓDIGO</td>
      <td>NOME</td>
      <td>CPF</td>
    

    </tr>
    <?php while($dado = mysqli_fetch_array($resultado)) { ?>
      
    <tr>
      
    <td><?php echo $dado['codigo_cliente']; ?></td>
      <td><?php echo $dado['nome']; ?></td>
      <td><?php echo $dado['cpf']; ?></td>
    
      </tr>
      <br><br><br>
    </tr>
    <?php } 
    ?>
  </table>
  <br><br><br>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <button type="submit" name="btn-voltar">Voltar</button>
  </form>
 

</body>
</html>