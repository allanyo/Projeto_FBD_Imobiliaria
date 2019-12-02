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

if (isset($_POST['btn-voltar'])) :
  header('Location: buscaImovel.php');
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

  <title>Parcelas</title>
</head>

<body>
  <br>
  <h1 class="text-center">Parcelas</h1><br>




  <table class="table table-hover  text-center">
    <thead class="thead-dark ">
      <tr>
        <th scope="col">#</th>
        <th scope="col">CODIGO DA PARCELA</th>
        <th scope="col">VALOR</th>
        <th scope="col">STATUS</th>
        <th scope="col">OPCÕES</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <?php while ($dado = mysqli_fetch_array($resultado)) { ?>

      <tr class="table-secondary">
        <th scope="row"><?php echo $i += 1; ?></th>
        <td><?php echo $dado['codigo_parcelas']; ?></td>
        <td><?php echo $dado['valor']; ?></td>
        <td><?php echo $dado['status']; ?></td>

        <td>
          <div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
              <a href="baixaImoveis.php?parcela_id=<?php echo $dado['parcela_id'] ?>"> Dar baixa</a> &nbsp&nbsp&nbsp&nbsp
              <a href="buscaClienteImovel.php?cod_cliente=<?php echo $dado['cod_cliente'] ?>">Ver cliente</a>
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