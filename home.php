<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();


// PEGA A AÇÃO DO BOTÃO ENVIAR 
if (isset($_POST['btn-entrar'])) : // NOME DO BOTÃO 
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    if (empty($login) or empty($senha)) :
        $erros[] = "<li>  O campo login ou senha estão vazios</li>";
    else :
        // seleciona o campo login de  onde (where) ?, da tabela usuarios onde o campo login for igual ao login digitado no formulario
        $sql = "SELECT login FROM usuarios  WHERE  login  = '$login'";
        $resultado = mysqli_query($connect, $sql);
        echo (mysqli_num_rows($resultado));

        //verifica se o login digitado existe no banco de dados 
        if (mysqli_num_rows($resultado) > 0) :
            $senha = md5($senha);
            $sql = "SELECT * FROM usuarios  WHERE  login  = '$login' AND senha = '$senha'";
            $resultado = mysqli_query($connect, $sql);
            if (mysqli_num_rows($resultado) == 1) :
                $dados = mysqli_fetch_array($resultado);
                $_SESSION['logado'] = true;
                $_SESSION['id_usuario'] = $dados['id'];
                header('Location: home.php');

            else :
                $erros[] = "<li>  Usuario e senha não conferem </li>";

            endif;

        //se houver alguma linha preechida no banco 
        else :
            $erros[] = "<li> Usuario inexistente </li>";
        endif;
    //
    endif;
endif;

if (isset($_POST['btn-cadastrar'])) :
    header('Location: cadastro.php');
endif;

?>



<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Home</title>
    <style>


        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>
    <br>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="home.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cadastro</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="cadastroImovel.php">Imóvel</a>
                            <a class="dropdown-item" href="cadastroProprietario.php">Proprietário</a>
                            <a class="dropdown-item" href="cadastroCliente.php">Cliente</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Buscar</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="buscaImovel.php">Imóvel</a>
                            <a class="dropdown-item" href="buscaProprietario.php">Proprietário</a>
                            <a class="dropdown-item" href="buscaCliente.php">Cliente</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Sair</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>

    <div id="nav">
  
            <main role="main">

                <div class="container marketing">


                    <hr class="container">

 <!--
                    <div class="col-md-12">
                        <h2 class="featurette-heading">Seja bem vindo <span class="text-muted">.</span></h2>
                        <p class="lead">Ao menur administrativo, aqui você podera cadastrar e buscar por : Imovel, Proprietário e Cliente .
                        </p>
                    </div>

                    <!-- <div class="col-md-8 ">
                            <img src="imagens/img7.jpg" alt="Smiley face" height="400" width="400">
                        </div>
                         -->
                </div>

        </main>
        <br><br>
    
        <?php
        if (!empty($erros)) :
            foreach ($erros as $erro) :
                echo $erro;
            endforeach;
        endif;
        ?>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>



</html>