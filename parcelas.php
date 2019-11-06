<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();



// PEGA A AÇÃO DO BOTÃO ENVIAR 
if(isset($_POST['btn-salvar'])):// NOME DO BOTÃƒO 

    //vão para a tabela endereço



    $quantidade_parcelas = mysqli_escape_string($connect, $_POST['quantidade_parcelas']);
    $data = mysqli_escape_string($connect, $_POST['data']);
    


    if(empty($quantidade_parcelas)or empty($data)):
        $erros[] = "<li> Preecha todos os campos</li>";
    else:
    
     $sqlparcela = " INSERT INTO parcela(quantidade_parcelas,data) values ('$quantidade_parcelas','$data')";

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
    <h2> <i class="glyphicon glyphicon-user"></i> Forma de pagamento</h2><br>
 
    <hr>
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    
    <div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                
                Quantidade de parcelas:   &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="quantidade_parcelas"><br>
                
                Data: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="data"><br>


                
                <center>
                <button type="submit" name="btn-salvar">Salvar</button>
                <button type="submit" name="btn-voltar">Voltar</button>

                </center>
                
        </form>
    </div>


    
</body>
</html>