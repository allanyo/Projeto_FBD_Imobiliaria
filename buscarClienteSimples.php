<?php

require_once 'db_connect.php';

session_start();


$sql = "SELECT cliente.codigo_cliente,cliente.nome,cliente.cpf,endereco.rua,endereco.cidade,cliente.cliente_id  
FROM cliente JOIN endereco on endereco.endereco_id = cliente.enderecoId";
$resultado = mysqli_query($connect, $sql);

if(isset($_POST['btn-voltar'])):
  header('Location: home.php');
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
  <h1>Clientes</h1><br>

 
  <div>
  
</div><br><br><br>
  <table >
    <tr>
      <td>CÓDIGO</td>
      <td>NOME</td>
      <td>CPF</td>
      <td>RUA</td>
      <td>CIDADE</td>
      <td>OPÇÕES</td>

    </tr>
    <?php while($dado = mysqli_fetch_array($resultado)) { ?>
      
    <tr>
      
      <td><?php echo $dado['codigo_cliente']; ?></td>
      <td><?php echo $dado['nome']; ?></td>
      <td><?php echo $dado['cpf']; ?></td>
      <td><?php echo $dado['rua']; ?></td>
      <td><?php echo $dado['cidade']; ?></td>
    
      
      <td>
         <div>
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                       
           <a href="vendaImovel.php?cliente_id=<?php echo $dado['cliente_id']?>"> aplicar</a>  &nbsp&nbsp&nbsp&nbsp                       
            </form> 
                                
          </div> 
       </td>

      </tr>

   
    <?php } 
    ?>
  </table>

<br><br><br><br>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <button type="submit" name="btn-voltar">Voltar 
  </form>
 

</body>
</html>