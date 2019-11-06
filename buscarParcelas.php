<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();

$codigoP = $_GET['codigoP'];
//$valor = $_GET['valor'];

$sql = "SELECT parcela.codigo_parcelas,parcela.cod_cliente,parcela.quantidade_parcelas,parcela.status,parcela.valor,parcela.parcela_id FROM parcela
 where  parcela.codigo_parcelas = $codigoP ";
$resultado = mysqli_query($connect, $sql);

if(isset($_POST['btn-voltar'])):
  header('Location: buscaImovel.php');
endif;

if(isset($_POST['editar'])):
  header('Location: editarCliente.php');
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
  <h1>Parcelas</h1><br>

 
  <div>
  
</div><br><br><br>
  <table >
    <tr>

      <td>CODIGO DA PARCELA</td>
      <td>VALOR</td>
      <td>STATUS</td>
      
     

    </tr>


    <?php  while($dado = mysqli_fetch_array($resultado)) { ?>
     
    <tr>
      
    <td><?php echo $dado['codigo_parcelas'];?></td>
      <td><?php echo $dado['valor'];?></td>
      <td><?php echo $dado['status']; ?></td>
     
      
      <td>
           <div>
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                       
           <a href="baixaImoveis.php?parcela_id=<?php echo $dado['parcela_id']?>"> Dar baixa</a>  &nbsp&nbsp&nbsp&nbsp                       
           <a href="buscaClienteImovel.php?cod_cliente=<?php echo $dado['cod_cliente']?>">Ver cliente</a>
         </form> 
                                
          </div> 
      
      </td>
     

      </tr>

      
    <?php 
  }
    ?>
  </table>

<br><br><br><br>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <button type="submit" name="btn-voltar">Voltar 
  </form>
 

</body>
</html>