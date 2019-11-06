<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();


    $proprietario_id = $_GET['proprietario_id'];

    $sql = "SELECT * FROM proprietario 
    where proprietario_id = '$proprietario_id' ";
    $resultado = mysqli_query($connect, $sql);
    $row_proprietario = mysqli_fetch_assoc($resultado);

   

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
    <h2> <i class="glyphicon glyphicon-user"></i> Cadastro de imóvel</h2><br>
 
    <hr>
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    
    <div>
    <form action="updateImovel.php?proprietario_id=<?php echo $row_proprietario['proprietario_id']; ?>" method="POST">
    
                Código Imóvel: &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="codigo_imovel"><br>
                Código proprietario: <input type="text" name="codigo_proprietario" readonly=“true” value = "
                <?php echo $row_proprietario['codigo_proprietario'];?>"> &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp
                <button type="submit" name="btn-buscar">buscar</button><br>
                Tipo:  &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="tipo">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                Área:  &nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="area"><br>
                Valor: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="valor">&nbsp&nbsp&nbsp&nbsp&nbsp
              
              <h5>status: </h5>
                <select name = "status">
                    <option value="Vendido">Vendido</option>
                    <option value="Para vender">Para veder</option>
                    <option value="Alugado">Alugado</option>
                    <option value="Para alugar">Para alugar</option>
                </select><br>
              
               
                
                
 
                Informações: &nbsp&nbsp&nbsp<input type="text" name="informacoes">
                

                <h2> <i class="glyphicon glyphicon-map-marker"></i> Localizção</h2><br>
                
                Rua: &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="rua"> <br>
                Bairro: &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="bairro"> &nbsp&nbsp&nbsp&nbsp&nbsp
                Nº:  &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="numero"><br>
                CEP: &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cep">&nbsp&nbsp&nbsp&nbsp&nbsp
                Cidade: &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cidade"><br>
                Estado: &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="estado">&nbsp&nbsp&nbsp&nbsp&nbsp 
                País:   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="pais"><br>
                <center>
                <button type="submit" name="btn-salvar">Salvar</button>
                <button type="submit" name="btn-voltar">Voltar</button>

                </center>
                
        </form>
    </div>


    
</body>
</html>