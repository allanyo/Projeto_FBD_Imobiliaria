<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();

//  $cliente_id = $_GET['cliente_id'];

$cliente_id = $_GET['cliente_id'];

$sql = "SELECT * FROM cliente join endereco 
    where cliente_id = '$cliente_id' and enderecoID = endereco_id";
$resultado = mysqli_query($connect, $sql);
$row_cliente = mysqli_fetch_assoc($resultado);


if (isset($_POST['btn-voltar'])) :
    header('Location: home.php');
endif;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/estiloTelasDeCadastro.css" />


    <title>Imobiliaria</title>
</head>

<body>


    <?php
    if (!empty($erros)) :
        foreach ($erros as $erro) :
            echo $erro;
        endforeach;
    endif;
    ?>

    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="glyphicon glyphicon-user"></i> Editar Cliente</h3>
                </div>


                <form action="update.php?cliente_id=<?php echo $row_cliente['cliente_id']; ?>" method="POST">

                    <label for="">ID: </label>

                    <div class="input-group form-group">
                        <input name cliente_id="cliente_id" type="hidden" value=" <?php echo $row_cliente['cliente_id']; ?>" />
                        <input type="text" name="codigo_cliente" value="  <?php echo $row_cliente['codigo_cliente']; ?>">

                    </div>


                    <div class="input-group form-group">
                        Nome:&nbsp&nbsp<input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $row_cliente['nome']; ?>">
                        &nbsp&nbsp RG: &nbsp&nbsp<input type="text" class="form-control" name="rg" placeholder="RG" value=" <?php echo $row_cliente['rg']; ?>">

                    </div>

                    <label for="CPF">CPF</label>
                    <div class="input-group form-group">
               
                        <input type="text" class="form-control" name="cpf" placeholder="CPF" value=" <?php echo $row_cliente['cpf']; ?>">
                    </div>

                    <label for="Telefone">Telefone</label>
                    <div class="input-group form-group">
            
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone" value="<?php echo $row_cliente['telefone']; ?>">
                    </div>



                    <label for="Celular">Celular</label>
                    <div class="input-group form-group">
                
                        <input type="text" class="form-control" name="celular" placeholder="celular" value="<?php echo $row_cliente['celular']; ?>">
                    </div>


                    <label for="Email">Email</label>
                    <div class="input-group form-group">
 
                        <input type="text" class="form-control" name="email" placeholder="email" value=" <?php echo $row_cliente['email']; ?>">
                    </div>


     
                    <div class="card-header">
                        <h5> <i class="glyphicon glyphicon-user"></i> Endereço</h5>
                    </div>
                 
                 <label for="Pais">Rua</label>
                 <div class="input-group form-group">   
                 <input type="hidden" name="endereco_id" value="<?php echo $row_cliente['endereco_id']; ?>"><br>
                       <input type="text" class="form-control" name="rua" value=" <?php echo $row_cliente['rua']; ?>"> 
                    </div>



                 <label for="Pais">Bairro</label>
                 <div class="input-group form-group">   
                       <input type="text" class="form-control" name="bairro" value="<?php echo $row_cliente['bairro']; ?>">
                    </div>

                 <label for="Pais">Numero</label>
                 <div class="input-group form-group">   
                       <input type="text" class="form-control" name="numero" placeholder="Numero" value="<?php echo $row_cliente['numero']; ?>">
                    </div>


                 <label for="Pais">CEP</label>
                 <div class="input-group form-group">   
                       <input type="text" class="form-control" name="cep" placeholder="País"value="<?php echo $row_cliente['cep']; ?>">
                    </div>

                 <label for="Pais">Cidade</label>
                 <div class="input-group form-group">   
                       <input type="text" class="form-control" name="cidade" placeholder="País" value=" <?php echo $row_cliente['cidade']; ?>">
                    </div>


                 <label for="Pais">Estado</label>
                 <div class="input-group form-group">   
                       <input type="text" class="form-control" name="estado" placeholder="País"value=" <?php echo $row_cliente['estado']; ?>">
                    </div>

                 <label for="Pais">Pais</label>
                 <div class="input-group form-group">   
                       <input type="text" class="form-control" name="pais" placeholder="País"value=" <?php echo $row_cliente['pais']; ?>">
                    </div>

                    <center>
                        <button type="submit" name="btn-editar">Editar</button>
                        <button type="submit" name="btn-voltar">Voltar</button>

                    </center>

                </form>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>


</body>

</html>