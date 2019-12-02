<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();

$proprietario_id = $_GET['proprietario_id'];

$sql = "SELECT * FROM proprietario join endereco 
where proprietario_id = '$proprietario_id' and enderecoPId = endereco_id";
$resultado = mysqli_query($connect, $sql);
$row_proprietario = mysqli_fetch_assoc($resultado);


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



    <br><br>
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
                    <h3 class="text-center"> <i class="glyphicon glyphicon-user"></i> Editar de Proprietario</h3>
                </div>

                <form action="updateProprietario.php?proprietario_id=<?php echo $row_proprietario['proprietario_id']; ?>" method="POST">

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Código Proprietario</label>
                            <input type="text" class="form-control" name="codigo_proprietario" value=" <?php echo $row_proprietario['codigo_proprietario']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="inputEmail4">Nome</label>
                            <input type="text" class="form-control" name="nome" value="<?php echo $row_proprietario['nome']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">RG</label>
                            <input type="text" class="form-control" name="rg" value="<?php echo $row_proprietario['rg']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">CPF</label>
                            <input type="text" class="form-control" name="cpf" value="<?php echo $row_proprietario['cpf']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Telefone</label>
                            <input type="text" class="form-control" name="telefone" value="<?php echo $row_proprietario['telefone']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Celular</label>
                            <input type="text" class="form-control" name="celular" value="<?php echo $row_proprietario['celular']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="inputEmail4">Emial</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $row_proprietario['email']; ?>">
                        </div>

                    </div>


                    <div class="card-header">
                        <h3 class="text-center"> <i class="glyphicon glyphicon-user"></i> Endereço</h3>
                    </div>





                    <input type="hidden" name="endereco_id" value=" <?php echo $row_proprietario['endereco_id']; ?>"><br>

                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="inputEmail4">Rua</label>
                            <input type="text" class="form-control" name="rua" value="<?php echo $row_proprietario['rua']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Bairro</label>
                            <input type="text" class="form-control" name="bairro" value="<?php echo $row_proprietario['bairro']; ?>">
                        </div>

                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Numero</label>
                            <input type="text" class="form-control" name="numero" value="<?php echo $row_proprietario['numero']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">CEP</label>
                            <input type="text" class="form-control" name="cep" value="<?php echo $row_proprietario['cep']; ?>">
                        </div>

                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Cidade</label>
                            <input type="text" class="form-control" name="cidade" value="<?php echo $row_proprietario['cidade']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Estado</label>
                            <input type="text" class="form-control" name="estado" value="<?php echo $row_proprietario['estado']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">País</label>
                            <input type="text" class="form-control" name="pais" value="<?php echo $row_proprietario['pais']; ?>">
                        </div>

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