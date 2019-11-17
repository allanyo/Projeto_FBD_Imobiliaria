<?php
//ligação com o arq de conexão db_connect.php - teste de commit
require_once 'db_connect.php';

//sessões 
session_start();


$parcela_id = $_GET['parcela_id'];

$sql = "SELECT * FROM parcela 
where parcela_id = '$parcela_id' ";
$resultado = mysqli_query($connect, $sql);
$row_parcela = mysqli_fetch_assoc($resultado);

if(isset($_POST['btn-salvar'])):// NOME DO BOTÃƒO 

    $status = mysqli_escape_string($connect, $_POST['status']);

    if(empty($status)):
        $erros[] = "<li> Preecha todos os campos</li>";
    else:
    
        $sqlparcela = " UPDATE parcela SET status='$status' where parcela_id = $parcela_id";

        if(mysqli_query($connect,  $sqlparcela)):
            echo 'alteração com sucesso!';
        else:
            echo 'erro';
        endif;

    endif;
    

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
        
        
        <form action="baixaImoveis.php?parcela_id=<?php echo $row_parcela['parcela_id']; ?>" method="POST">
      
        <h2> <i class="glyphicon glyphicon-user"></i> Parcelas</h2><br>
       
        Quantidade de parcelas:   &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="quantidade_parcelas" value = "<?php echo $row_parcela['quantidade_parcelas'];?>"><br>
                
        
                
            <p> Altere o status da parcela</p>
              <h5>status: </h5>
                <select name = "status">
                    <option value="Paga">paga</option>
                    <option value="n_paga">não paga</option>
                   
                </select><br><br>
                
                
                <center>
                <button type="submit" name="btn-salvar">Salvar</button>
                <button type="submit" name="btn-voltar">Voltar</button>

                </center>
                
        </form>
               
    </div>


    
</body>
</html>