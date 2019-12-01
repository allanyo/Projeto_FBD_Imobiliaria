<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();



$proprietario_id = isset($_GET['proprietario_id']) ? $_GET['proprietario_id'] : null;
// $proprietario_id = $_GET['proprietario_id'];

$sql = "SELECT * FROM proprietario 
    where proprietario_id = '$proprietario_id' ";
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
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/estiloImovelll.css" />

    <title>Imobiliaria</title>
</head>

<body>



    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="glyphicon glyphicon-user"></i> Cadastro de imóvel</h3>
                </div>
                <div class="card-body">

                    <?php
                    if (!empty($erros)) :
                        foreach ($erros as $erro) :
                            echo $erro;
                        endforeach;
                    endif;
                    ?>



                    <form action="updateImovel.php?proprietario_id=<?php echo $row_proprietario['proprietario_id']; ?>" method="POST">

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="codigo_imovel" placeholder="  Código Imóvel">
                        </div>
                        <h7>Codigo Propietario</h7>
                        <div class="input-group form-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="codigo_proprietario" placeholder="  Código proprietario" readonly=“true” value="
                          <?php echo $row_proprietario['codigo_proprietario']; ?>">

                            <button type="submit" name="btn-buscar">buscar</button><br>
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="tipo" placeholder="Tipo: Casa, Ap ...">
                        </div>


                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="area" placeholder="Área">
                            <input type="text" class="form-control" name="valor" placeholder="Valor">
                        </div>



                        <h5>status: </h5>
                        <select name="status">
                            <option value="Para vender">Para vender</option>
                            <option value="Alugado">Alugado</option>
                            <option value="Para alugar">Para alugar</option>
                            <option value="Vendido">Vendido</option>
                        </select><br><br>



                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="informacoes" placeholder="Informações Adicionais ">
                        </div>


                        
                    <div class="card-header">
                        <h5> <i class="glyphicon glyphicon-user"></i> Endereço</h5>
                    </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="rua" placeholder="Rua">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="bairro" placeholder="Bairro">
                            <input type="text" class="form-control" name="numero" placeholder="Nº">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="cidade" placeholder="Cidade">
                            <input type="text" class="form-control" name="cep" placeholder="CEP">
                        </div>


                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="estado" placeholder="Estado">
                            <input type="text" class="form-control" name="pais" placeholder="País">
                        </div>

                        <center>
                            <button type="submit" name="btn-salvar">Salvar</button>
                            <button type="submit" name="btn-voltar">Voltar</button>

                        </center>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>



</body>

</html>