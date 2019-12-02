<?php

require_once 'db_connect.php';

session_start();

$sql = "SELECT  imovel.codigo_imovel,imovel.codigo_proprietario,imovel.codigoP,imovel.tipo,imovel.area,imovel.status,
imovel.valor,endereco.rua,endereco.cidade,imovel.imovel_id FROM imovel JOIN endereco on endereco.endereco_id = imovel.enderecoimoID";
$resultado = mysqli_query($connect, $sql);

if (isset($_POST['btn-voltar'])) :
  header('Location: home.php');
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
  <title>Produtos</title>
</head>

<body>

  <h1 class="text-center">Imóveis</h1>

  <table class="table table-hover  text-center">
    <thead>
      <tr >
        <th scope="col">#</th>
        <td scope="col">CÓDIGO IMÓVEL</td>
        <td scope="col">CÓDIGO PROPRIETARIO</td>
        <td scope="col">CÓDIGO PARCELA</td>
        <td scope="col">TIPO</td>
        <td scope="col">AREA</td>
        <td scope="col">STATUS</td>
        <td scope="col">VALOR</td>
        <td scope="col">RUA</td>
        <td scope="col">CIDADE</td>
        <td scope="col">OPÇÕES </td>

      </tr>

    </thead>
    <tbody>
      <tr>
        <?php while ($dado = mysqli_fetch_array($resultado)) { ?>

      <tr class="table-secondary">
        <th scope="row"><?php echo $i += 1; ?></th>
        <td><?php echo $dado['codigo_imovel']; ?></td>
        <td><?php echo $dado['codigo_proprietario']; ?></td>
        <td><?php echo $dado['codigoP']; ?></td>
        <td><?php echo $dado['tipo']; ?></td>
        <td><?php echo $dado['area']; ?></td>
        <td><?php echo $dado['status']; ?></td>
        <td><?php echo $dado['valor']; ?></td>
        <td><?php echo $dado['rua']; ?></td>
        <td><?php echo $dado['cidade']; ?></td>

        <td>
          <div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <a href="vendaImovel.php?imovel_id=<?php echo $dado['imovel_id'] ?>"> Vender </a> &nbsp&nbsp&nbsp&nbsp
              <a href="buscarParcelas.php?codigoP=<?php echo $dado['codigoP'] ?>"> Ver parcelas</a>
            </form>
          </div>
        </td>

      </tr>
    <?php }
    ?>
    </tbody>
  </table>

  <br>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <button type="submit" name="btn-voltar">Voltar</button>
  </form>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>


</body>

</html>