<?php

require_once 'db_connect.php';

session_start();


$sql = "SELECT proprietario_id,nome,codigo_proprietario  FROM proprietario";
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
  <h1>Proprietário</h1><br>


  <div>
  
</div><br><br><br>
  <table >
    <tr>
      <td>NOME</td>
      <td>CODIGO</td>
     

    </tr>
    <?php while($dado = mysqli_fetch_array($resultado)) { ?>
      
    <tr>
      
      <td><?php echo $dado['nome']; ?></td>
      <td><?php echo $dado['codigo_proprietario']; ?></td>
      
      
      <td>
         <div>
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                       
           <a href="cadastroImovel.php?proprietario_id=<?php echo $dado['proprietario_id']?>"> aplicar</a>  &nbsp&nbsp&nbsp&nbsp                       
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