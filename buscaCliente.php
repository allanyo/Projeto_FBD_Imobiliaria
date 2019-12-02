<?php

require_once 'db_connect.php';

session_start();


$sql = "SELECT cliente.codigo_cliente,cliente.nome,cliente.cpf,endereco.rua,endereco.cidade,cliente.cliente_id  
FROM cliente JOIN endereco on endereco.endereco_id = cliente.enderecoId";
$resultado = mysqli_query($connect, $sql);

if (isset($_POST['btn-voltar'])) :
  header('Location: home.php');
endif;

if (isset($_POST['editar'])) :
  header('Location: editarCliente.php');
endif;
$i = 0;

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/estiloTelasDeCadastro.css" />
  <title>Alterações de Dados </title>
</head>

<body>
  <h1 class="text-center">Clientes</h1>

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
        <td><?php echo $dado['codigo_cliente']; ?></td>
        <td><?php echo $dado['nome']; ?></td>
        <td><?php echo $dado['cpf']; ?></td>
        <td><?php echo $dado['rua']; ?></td>
        <td><?php echo $dado['cidade']; ?></td>

        <td>
          <div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <a href="editarClientes.php?cliente_id=<?php echo $dado['cliente_id'] ?>"> Editar</a> &nbsp&nbsp&nbsp&nbsp
            </form>
          </div>
        </td>

      </tr>
    <?php }
    ?>

    </tr>

    </tbody>
  </table>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <button type="submit" name="btn-voltar">Voltar
  </form>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>


</body>

</html>