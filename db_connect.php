
<?php
define('HOST', 'localhost');
define("USUARIO", 'root');
define('SENHA','');
define('DB', 'imobiliaria');

$connect = mysqli_connect(HOST,USUARIO,SENHA,DB) or die ("Não foi possivel conectar ao banco, verifique o arquivo db_connect.php");
