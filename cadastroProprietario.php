<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();


// PEGA A AÇÃO DO BOTÃO ENVIAR 
if(isset($_POST['btn-salvar'])):// NOME DO BOTÃƒO 

    $rua = mysqli_escape_string($connect, $_POST['rua']);
    $bairro = mysqli_escape_string($connect, $_POST['bairro']);
    $numero = mysqli_escape_string($connect, $_POST['numero']);
    $cep = mysqli_escape_string($connect, $_POST['cep']);
    $cidade = mysqli_escape_string($connect, $_POST['cidade']);
    $estado = mysqli_escape_string($connect, $_POST['estado']);
    $pais = mysqli_escape_string($connect, $_POST['pais']);

    $codigo_proprietario = mysqli_escape_string($connect, $_POST['codigo_proprietario']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $rg = mysqli_escape_string($connect, $_POST['rg']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);
    $celular = mysqli_escape_string($connect, $_POST['celular']);
    $email = mysqli_escape_string($connect, $_POST['email']);
  


    if(empty($codigo_proprietario)or empty($nome)or empty($rg)or empty($cpf)or empty($telefone)or empty($celular)or empty($email)
    or empty($rua)or empty($bairro)or empty($numero)or empty($cep)or empty($cidade)or empty($estado)or empty($pais)):
        $erros[] = "<li> Preecha todos os campos</li>";
    else:
    
        $sqlendereco = " INSERT INTO endereco(rua,bairro,numero,cep,cidade,estado,pais) values ('$rua','$bairro','$numero','$cep','$cidade','$estado','$pais')";

        if(mysqli_query($connect,  $sqlendereco)):
            echo 'Cadastrado com sucesso!';
        else:
            echo 'erro';
        endif;


     $sqlproprietario = " INSERT INTO proprietario(codigo_proprietario,nome,rg,cpf,telefone,celular,email,enderecoPId) values ('$codigo_proprietario','$nome','$rg','$cpf','$telefone','$celular','$email', LAST_INSERT_ID())";

   
        if(mysqli_query($connect, $sqlproprietario)):
            echo 'Cadastrado com sucesso!';
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
    <h2> <i class="glyphicon glyphicon-user"></i> Cadastro de proprietario</h2><br>
 
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
                
                Código Proprietario: &nbsp<input type="text" name="codigo_proprietario"><br>
                Nome:  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="nome"><br>
                RG:  &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="rg">&nbsp&nbsp&nbsp&nbsp&nbsp
                CPF: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="cpf">&nbsp&nbsp&nbsp&nbsp&nbsp
                Telefone: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="telefone">&nbsp&nbsp&nbsp&nbsp&nbsp
                celular: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="celular"><br>
                E-mail: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="email">
                

                <h2> <i class="glyphicon glyphicon-map-marker"></i> Endereço</h2><br>
                
                Rua: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="rua"> <br>
                Bairro: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="bairro"> &nbsp&nbsp&nbsp&nbsp&nbsp
                Nº:   &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="numero"><br>
                CEP: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cep">&nbsp&nbsp&nbsp&nbsp&nbsp
                Cidade: &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cidade"><br>
                Estado: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="estado">&nbsp&nbsp&nbsp&nbsp&nbsp 
                País: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="pais"><br>
                <center>
                <button type="submit" name="btn-salvar">Salvar</button>
                <button type="submit" name="btn-voltar">Voltar</button>

                </center>
                
        </form>
    </div>


    
</body>
</html>