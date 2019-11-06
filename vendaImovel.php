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

if(isset($_POST['btn-salvar'])):// NOME DO BOTÃƒO 

 
    $codigo_imovel = mysqli_escape_string($connect, $_POST['codigo_imovel']);
    $tipo = mysqli_escape_string($connect, $_POST['tipo']);
    $area = mysqli_escape_string($connect, $_POST['area']);
    $valor = mysqli_escape_string($connect, $_POST['valor']);
    $status = mysqli_escape_string($connect, $_POST['status']);
    $codigoP = mysqli_escape_string($connect, $_POST['codigo_parcelas']);

    $cod_cliente = mysqli_escape_string($connect, $_POST['cod_cliente']);
    $codigo_parcelas = mysqli_escape_string($connect, $_POST['codigo_parcelas']);
    $quantidade_parcelas = mysqli_escape_string($connect, $_POST['quantidade_parcelas']);
   

    if(empty($status)):
        $erros[] = "<li> Preecha todos os campos</li>";
    else:
       
        $controle = 0;
        $valorDividido = $valor /$quantidade_parcelas;

        while($controle < $quantidade_parcelas)  {
            $sqlparcela = " INSERT INTO parcela(cod_cliente,codigo_parcelas,quantidade_parcelas,valor) values ('$cod_cliente','$codigo_parcelas','$quantidade_parcelas', $valorDividido)";
            if(mysqli_query($connect,  $sqlparcela)):
                echo 'Venda com sucesso!';
            else:
                echo 'erro';
            endif;
            $controle = $controle +1;
        }
         
       
     $sqlvenda = " UPDATE imovel SET codigo_imovel='$codigo_imovel',codigoP = '$codigo_parcelas',tipo='$tipo',area='$area',valor='$valor',
     status='$status',informacoes='$informacoes' where imovel_id = '$imovel_id' ";

        if(mysqli_query($connect,  $sqlvenda)):
            echo 'venda com sucesso!';
        else:
            echo 'erro';
        endif;
    endif;

    header('Location: buscaImovel.php');



endif;

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
    <link rel="stylesheet" type="text/css" href="css/estiloImovelll.css" />
    
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
        
        
        <form action="vendaImovel.php?imovel_id=<?php echo $row_imovel['imovel_id']; ?>" method="POST">
      
        <h2> <i class="glyphicon glyphicon-user"></i> Dados do Imovel</h2><br>
        Código Imóvel: &nbsp<input type="text" name="codigo_imovel" readonly=“true” value = "<?php echo $row_imovel['codigo_imovel'];?>"><br>
    
                Tipo:  &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="tipo" readonly=“true” value = "<?php echo $row_imovel['tipo'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                Área:  &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="area" readonly=“true” value = "<?php echo $row_imovel['area'];?>"><br>
                Valor: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="valor" readonly=“true” value = "<?php echo $row_imovel['valor'];?>">&nbsp&nbsp&nbsp&nbsp&nbsp<br>
              
            <br><br>
            <p> Altere o status do imovel</p>
              <h5>status: </h5>
                <select name = "status">
                    <option value="Vendido">Vendido</option>
                    <option value="Para vender">Para veder</option>
                    <option value="Alugado">Alugado</option>
                    <option value="Para alugar">Para alugar</option>
                </select><br>
                <h2> Pagamento</h2><br>
                Codigo cliente:  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cod_cliente"><br>
                Codigo parcelas:  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="codigo_parcelas"><br>
                Quantidade de parcelas:   &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="quantidade_parcelas"><br>
                
                <center>
                <button type="submit" name="btn-salvar">Salvar</button>
                <button type="submit" name="btn-voltar">Voltar</button>

                </center>
                
        </form>
               
    </div>


    
</body>
</html>