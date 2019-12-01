<?php
//ligação com o arq de conexão db_connect.php
require_once 'db_connect.php';

//sessões 
session_start();


// PEGA A AÇÃO DO BOTÃO ENVIAR 
if (isset($_POST['btn-salvar'])) : // NOME DO BOTÃƒO 

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



    if (
        empty($codigo_proprietario) or empty($nome) or empty($rg) or empty($cpf) or empty($telefone) or empty($celular) or empty($email)
        or empty($rua) or empty($bairro) or empty($numero) or empty($cep) or empty($cidade) or empty($estado) or empty($pais)
    ) :
        $erros[] = "<li> Preecha todos os campos</li>";
    else :

        $sqlendereco = " INSERT INTO endereco(rua,bairro,numero,cep,cidade,estado,pais) values ('$rua','$bairro','$numero','$cep','$cidade','$estado','$pais')";

        if (mysqli_query($connect,  $sqlendereco)) :
            echo 'Cadastrado com sucesso!';
        else :
            echo 'erro';
        endif;


        $sqlproprietario = " INSERT INTO proprietario(codigo_proprietario,nome,rg,cpf,telefone,celular,email,enderecoPId) values ('$codigo_proprietario','$nome','$rg','$cpf','$telefone','$celular','$email', LAST_INSERT_ID())";


        if (mysqli_query($connect, $sqlproprietario)) :
            echo 'Cadastrado com sucesso!';
        else :
            echo 'erro';
        endif;

    endif;

endif;

if (isset($_POST['btn-voltar'])) :
    header('Location: home.php');
endif;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/estiloTelasDeCadastro.css" />

    <title>Imobiliaria</title>
</head>

<body>


    <?php
    if (!empty($erros)) :
        foreach ($erros as $erro) :
            echo $erro;
        endforeach;
    endif;
    ?>


    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="glyphicon glyphicon-user"></i> Cadastro de Proprietario</h3>
                </div>


                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="codigo_proprietario" placeholder="Codigo do  Proprietario ">

                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="nome" placeholder="Nome">
                        <input type="text" class="form-control" name="email" placeholder="Email">

                    </div>


                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="telefone" placeholder="Telefone">
                        <input type="text" class="form-control" name="celular" placeholder="Celular">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="rg" placeholder="RG">
                        <input type="text" class="form-control" name="cpf" placeholder="CPF">
                    </div>



                    <div class="card-header">
                        <h5> <i class="glyphicon glyphicon-user"></i> Endereço</h5>
                    </div>


                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="rua" placeholder="Rua">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="bairro" placeholder="Bairro">
                        <input type="text" class="form-control" name="numero" placeholder="Nº">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="cidade" placeholder="Cidade">
                        <input type="text" class="form-control" name="cep" placeholder="CEP">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="estado" placeholder="Estado">
                        <input type="text" class="form-control" name="pais" placeholder="País">
                    </div>




                    <center>
                        <button type="submit" name="btn-salvar">Salvar</button>
                        <button type="submit" name="btn-voltar">Voltar</button>

                    </center>

                </form>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>




</body>

</html>