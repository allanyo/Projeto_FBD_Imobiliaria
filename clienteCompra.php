<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();


$cliente_id = $_GET['cliente_id'];

    $sql = "SELECT * FROM cliente 
    where cliente_id = '$cliente_id' ";
    $resultado = mysqli_query($connect, $sql);
    $row_cliente = mysqli_fetch_assoc($resultado);



if(isset($_POST['btn-salvar'])):// NOME DO BOTÃƒO 

 
    $cod_cliente = mysqli_escape_string($connect, $_POST['codigo_cliente']);

    

    if(empty($cod_cliente)):
        $erros[] = "<li> Preecha todos os campos</li>";
    else:
       
            $sqlparcela = " UPDATE  parcela SET cod_cliente ='$cod_cliente' ";
            if(mysqli_query($connect,  $sqlparcela)):
                echo 'Venda com sucesso!';
            else:
                echo 'erro';
            endif;
      
         
    
     


    endif;
endif;

if(isset($_POST['btn-voltar'])):
    header('Location: home.php');
endif;


if(isset($_POST['btn-buscar'])):
    header('Location: buscaClienteSimples.php');
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
        
        
        <form action="clienteCompra.php?cliente_id=<?php echo $row_cliente['cliente_id']; ?>" method="POST">
      
        <h2> <i class="glyphicon glyphicon-user"></i> Dados do Cliente</h2><br>

                Código Cliente: <input type="text" name="codigo_cliente" readonly=“true” value = "<?php echo $row_cliente['codigo_cliente'];?>"> &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp
                <button type="submit" name="btn-buscar">buscar</button><br><br><br><br>
                <center>
                <button type="submit" name="btn-salvar">Salvar</button>
                <button type="submit" name="btn-voltar">Voltar</button>

                </center>
                
        </form>
               
    </div>


    
</body>
</html>