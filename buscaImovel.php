<?php

require_once 'db_connect.php';

session_start();

$sql = "SELECT  imovel.codigo_imovel,imovel.codigo_proprietario,imovel.codigoP,imovel.tipo,imovel.area,imovel.status,
imovel.valor,endereco.rua,endereco.cidade,imovel.imovel_id FROM imovel JOIN endereco on endereco.endereco_id = imovel.enderecoimoID";
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
      <td>CÓDIGO PARCELA</td>
      <td>TIPO</td>
      <td>AREA</td>
      <td>STATUS</td>
      <td>VALOR</td>
      <td>RUA</td>
      <td>CIDADE</td>
    </tr>
    <?php while($dado = mysqli_fetch_array($resultado)) { ?>

      
      <tr>
      <td><?php echo $dado['codigo_imovel']; ?></td>
      <td><?php echo $dado['codigo_proprietario']; ?></td>
      <td><?php echo $dado['codigoP']; ?></td>
      <td><?php echo $dado['tipo']; ?></td>
      <td><?php echo $dado['area']; ?></td>
      <td><?php echo $dado['status']; ?></td>
      <td><?php echo $dado['valor'];?></td>
      <td><?php echo $dado['rua']; ?></td>
      <td><?php echo $dado['cidade']; ?></td>
      
      <td>  
          <div>
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">      

            <a href="vendaImovel.php?imovel_id=<?php echo $dado['imovel_id']?>"> Vender </a> &nbsp&nbsp&nbsp&nbsp  
           <a href="buscarParcelas.php?codigoP=<?php echo $dado['codigoP']?>"> Ver parcelas</a>
           
           
     
           </a>  &nbsp&nbsp&nbsp&nbsp                       
            </form> 
                                
          </div> 
      </td>
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