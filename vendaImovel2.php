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

if(isset($_POST['btn-voltar'])):
    header('Location: home.php');
endif;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estiloImovell.css" />
    
    <title>Imobiliaria</title>
</head>
<body>
    <h1> Imobiliaria Rocha <i class="glyphicon glyphicon-map-marker"></i></h1>
    <h2>  Venda</h2><br>
 
    <hr>
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    
    <div>
        
        <h2> <i class="glyphicon glyphicon-user"></i> Dados do Imovel</h2><br>
        <form action="updateVenda.php?imovel_id=<?php echo $row_imovel['imovel_id']; ?>" method="POST">
                Tipo imóvel: &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="tipo" value = "<?php echo  $row_imovel['tipo'];?>"><br>
                Área:  &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="area" value = "
                <?php echo $row_imovel['area'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp
                Valor: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="valor" value = "
                <?php echo $row_imovel['valor'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp
               

                <h2> <i class="glyphicon glyphicon-map-marker"></i> Pagamento</h2><br>
                Valor: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="rua"> <br>
                Nº de parcelas: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="bairro"> &nbsp&nbsp&nbsp&nbsp&nbsp
                
                <center>
                <button type="submit" name="btn-salvar">Salvar</button>
                <button type="submit" name="btn-voltar">Voltar</button>

                </center>
                
        </form>
               
    </div>


    
</body>
</html>