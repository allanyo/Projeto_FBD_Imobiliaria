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
$i=0;
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/estiloTelasDeCadastro.css" />
  <title>Produtos</title>
</head>
<body>
  <h1 class="text-center">Proprietários</h1><br>


  <table class="table table-hover  text-center">
  <thead class="thead-dark ">
      <tr>
        <th scope="col">#</th>
        <th scope="col">CÓDIGO</th>
        <th scope="col">NOME</th>
        <th scope="col">CPF</th>
        <th scope="col">RUA</th>
        <th scope="col">CIDADE</th>
        <th scope="col">OPÇÕES</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php while ($dado = mysqli_fetch_array($resultado)) { ?>
          

      <tr class="table-secondary">
        <th scope="row"><?php echo $i += 1; ?></th>
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
    <?php }
    ?>

    </tr>

    </tbody>
  </table>


  <br><br><br>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <button type="submit" name="btn-voltar">Voltar</button>
  </form>


  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>


</body>
</html>