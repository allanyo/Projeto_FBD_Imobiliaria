<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();


// PEGA A AÇÃO DO BOTÃO ENVIAR 
if(isset($_POST['btn-salvar'])):// NOME DO BOTÃƒO 
       
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if(empty($nome)or empty($sobrenome)or empty($email)or empty($login)or empty($senha)):
        $erros[] = "<li> Preecha todos os campos</li>";
    else:

    $sql = " INSERT INTO usuarios(nome,sobrenome,email,login,senha) values ('$nome','$sobrenome','$email','$login',md5('$senha'))";
    if(mysqli_query($connect, $sql)):
        echo 'Cadastrado com sucesso!';
    else:
        echo 'erro';
    endif;

    endif;
endif;
if(isset($_POST['btn-voltar'])):
    header('Location: index.php');
endif;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilocadastro.css" />
    
    <title>Imobiliaria</title>
</head>
<body>
    <h1> Imobiliaria Rocha <i class="glyphicon glyphicon-map-marker"></i></h1>
    <h2> <i class="glyphicon glyphicon-user"></i> Cadastre seu login</h2><br>
 
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
                Nome: <input type="text" name="nome"><br>
                Sobrenome: <input type="text" name="sobrenome"><br>
                E-mail: <input type="text" name="email"><br>
                Login: <input type="text" name="login"><br>
                Senha: <input type="password" name="senha"><br><br><br>
                <button type="submit" name="btn-salvar">Salvar</button>
                <button type="submit" name="btn-voltar">Voltar</button>

        </form>
    </div>
   
    
</body>
</html>