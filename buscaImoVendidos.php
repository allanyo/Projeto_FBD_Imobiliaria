<?php

require_once 'db_connect.php';

session_start();

$sql = "SELECT *from imovel";

//$sql = "SELECT imovel.codigo_imovel,imovel.codigo_proprietario,imovel.tipo,imovel.status,imovel.valor,venda.parcelas,imovel.imovel_id  
//FROM imovel JOIN venda on venda.venda_id = imovel.vendaID";
$resultado = mysqli_query($connect, $sql);

if(isset($_POST['btn-voltar'])):
  header('Location: home.php');
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
  <h1>Imóveis</h1>
  <table >
    <tr>
    <td>CÓDIGO IMÓVEL</td>
      <td>CÓDIGO PROPRIETARIO</td>
      <td>TIPO</td>
      <td>STATUS</td>
      <td>PARCELAS</td>
      
    </tr>
    <?php while($dado = mysqli_fetch_array($resultado)) { ?>
      <tr>
      <td><?php echo $dado['codigo_imovel']; ?></td>
      <td><?php echo $dado['codigo_proprietario']; ?></td>
      <td><?php echo $dado['tipo']; ?></td>
      <td><?php echo $dado['status']; ?></td>
      <td><?php echo $dado['parcelas']; ?></td>
      
      
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