<?php

require_once 'db_connect.php';

session_start();


$sql = "SELECT proprietario.codigo_proprietario,proprietario.nome,proprietario.cpf,
endereco.rua,endereco.cidade,proprietario.proprietario_id  
FROM proprietario JOIN endereco on endereco.endereco_id = proprietario.enderecoPId";


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
  <h1>Proprietários</h1>
  <table>
    <tr>
      <td>CÓDIGO</td>
      <td>NOME</td>
      <td>CPF</td>
      <td>rua</td>
      <td>CIDADE</td>
    </tr>
    <?php while($dado = mysqli_fetch_array($resultado)) { ?>
      
      <tr>
      
      <td><?php echo $dado['codigo_proprietario']; ?></td>
      <td><?php echo $dado['nome']; ?></td>
      <td><?php echo $dado['cpf']; ?></td>
      <td><?php echo $dado['rua']; ?></td>
      <td><?php echo $dado['cidade']; ?></td>
      <td>
           <div>
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">                       
           <a href="editarProprietarios.php?proprietario_id=<?php echo $dado['proprietario_id']?>"> Editar</a>  &nbsp&nbsp&nbsp&nbsp                       
           <a href="buscaProprietarioImovel.php?codigo_proprietario=<?php echo $dado['codigo_proprietario']?>">Ver imoveis</a>
         </form> 
                                
          </div> 
      
      </td>
      </tr>
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