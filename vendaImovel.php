<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();


$imovel_id = $_GET['imovel_id'];

$sql = "SELECT * FROM imovel 
where imovel_id = '$imovel_id' ";
$resultado = mysqli_query($connect, $sql);
$row_imovel = mysqli_fetch_assoc($resultado);

if (isset($_POST['btn-salvar'])) : // NOME DO BOTÃƒO 


    $codigo_imovel = mysqli_escape_string($connect, $_POST['codigo_imovel']);
    $tipo = mysqli_escape_string($connect, $_POST['tipo']);
    $area = mysqli_escape_string($connect, $_POST['area']);
    $valor = mysqli_escape_string($connect, $_POST['valor']);
    $status = mysqli_escape_string($connect, $_POST['status']);
    $codigoP = mysqli_escape_string($connect, $_POST['codigo_parcelas']);

    $cod_cliente = mysqli_escape_string($connect, $_POST['cod_cliente']);
    $codigo_parcelas = mysqli_escape_string($connect, $_POST['codigo_parcelas']);
    $quantidade_parcelas = mysqli_escape_string($connect, $_POST['quantidade_parcelas']);


    if (empty($status)) :
        $erros[] = "<li> Preecha todos os campos</li>";
    else :

        $controle = 0;
        $valorDividido = $valor / $quantidade_parcelas;

        while ($controle < $quantidade_parcelas) {
            $sqlparcela = " INSERT INTO parcela(cod_cliente,codigo_parcelas,quantidade_parcelas,valor) values ('$cod_cliente','$codigo_parcelas','$quantidade_parcelas', $valorDividido)";
            if (mysqli_query($connect,  $sqlparcela)) :
                echo 'Venda com sucesso!';
            else :
                echo 'erro';
            endif;
            $controle = $controle + 1;
        }


        $sqlvenda = " UPDATE imovel SET codigo_imovel='$codigo_imovel',codigoP = '$codigo_parcelas',tipo='$tipo',area='$area',valor='$valor',
     status='$status',informacoes='$informacoes' where imovel_id = '$imovel_id' ";

        if (mysqli_query($connect,  $sqlvenda)) :
            echo 'venda com sucesso!';
        else :
            echo 'erro';
        endif;
    endif;

    header('Location: buscaImovel.php');



endif;

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

    <title>Venda </title>
</head>

<body>

    <h2 class="text-center"> Venda</h2><br>

    <hr>
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
                    <h3> <i class="glyphicon glyphicon-user"></i>Dados do Imovel </h3>
                </div>


                <form action="vendaImovel.php?imovel_id=<?php echo $row_imovel['imovel_id']; ?>" method="POST">

                  
                    <div class="input-group form-group">
                    Código : &nbsp&nbsp&nbsp  <input type="text" class="form-control" name="codigo_imovel" placeholder="CPF" readonly=“true” value="<?php echo $row_imovel['codigo_imovel']; ?>"><br>
                    </div>

                    <div class="input-group form-group">
                       Tipo: &nbsp&nbsp&nbsp  <input type="text" class="form-control" name="tipo" readonly=“true” value="<?php echo $row_imovel['tipo']; ?>">
                    </div>

                   
                    <div class="input-group form-group">
                    Área: &nbsp&nbsp&nbsp<input type="text" class="form-control" name="area" readonly=“true” value="<?php echo $row_imovel['area']; ?>"><br>
                    </div>
                  
                    <div class="input-group form-group">
                    Valor: &nbsp&nbsp&nbsp <input type="text" class="form-control" name="valor" readonly=“true” value="<?php echo $row_imovel['valor']; ?>">
                    </div>


                    <div class="card-header">
                        <h5> <i class="glyphicon glyphicon-user"></i> Altere o status do imovel</h5>
                    </div>


                    <h5>status: </h5>
                    <select name="status">
                        <option value="Vendido">Vendido</option>
                        <option value="Para vender">Para veder</option>
                        <option value="Alugado">Alugado</option>
                        <option value="Para alugar">Para alugar</option>
                    </select><br>

                    <div class="card-header">
                        <h5> <i class="glyphicon glyphicon-user"></i> Pagamento</h5>
                    </div><br>



                    <div class="input-group form-group">
                        Codigo cliente: &nbsp&nbsp&nbsp <input type="text" name="cod_cliente" class="form-control" >
                    </div>



                    <div class="input-group form-group">
                        Codigo parcelas:&nbsp&nbsp&nbsp<input type="text" name="codigo_parcelas" class="form-control"  >
                    </div>
                    <div class="input-group form-group">
                        Quantidade de parcelas:&nbsp&nbsp&nbsp <input type="text" name="quantidade_parcelas" class="form-control" >
                    </div>



                    <center>
                        <button type="submit" name="btn-salvar">Salvar</button>
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