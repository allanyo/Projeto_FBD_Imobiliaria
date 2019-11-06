<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();

//dsds
// PEGA A AÇÃO DO BOTÃO ENVIAR 
    if(isset($_POST['btn-entrar'])):// NOME DO BOTÃO 
        $erros = array();
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);

        if(empty($login)or empty($senha)):
            $erros[] = "<li>  O campo login ou senha estão vazios</li>";
        else:
            // seleciona o campo login de  onde (where) ?, da tabela usuarios onde o campo login for igual ao login digitado no formulario
            $sql = "SELECT login FROM usuarios  WHERE  login  = '$login'";
            $resultado = mysqli_query($connect, $sql);
            echo (mysqli_num_rows($resultado));

            //verifica se o login digitado existe no banco de dados 
            if(mysqli_num_rows($resultado)> 0 ):
                $senha = md5($senha);
                $sql = "SELECT * FROM usuarios  WHERE  login  = '$login' AND senha = '$senha'";
                 $resultado = mysqli_query($connect, $sql);
                 if(mysqli_num_rows($resultado) == 1 ):
                    $dados = mysqli_fetch_array($resultado);
                    $_SESSION['logado']= true;
                    $_SESSION['id_usuario'] = $dados['id'];
                    header('Location: home.php');

                 else:
                    $erros[] = "<li>  Usuario e senha não conferem </li>";

                 endif;

                //se houver alguma linha preechida no banco 
            else:
                $erros[] = "<li> Usuario inexistente </li>";
            endif;
            //
        endif;
    endif;

    if(isset($_POST['btn-cadastrar'])):
        header('Location: cadastro.php');
    endif;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    
    <title>Imobiliaria</title>
</head>
<body>
    <h1> Imobiliaria Rocha <i class="glyphicon glyphicon-map-marker"></i></h1><br>
  
    
    <div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <i class="glyphicon glyphicon-user"></i>
                Login: <input type="text" name="login"><br>
                <i class="glyphicon glyphicon-lock"></i>
                Senha: <input type="password" name="senha"><br><br><br>
                <button type="submit" name="btn-entrar">Entrar</button>
                <button type="submit" name="btn-cadastrar">Cadastrar</button>

        </form>
    </div>
    <hr>
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
</body>
</html>