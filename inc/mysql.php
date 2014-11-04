<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "oraculo";


$conexaobd = new mysqli($host, $usuario, $senha, $banco);

if($conexaobd->connect_errno > 0){
	die('Unable to connect to database [' . $conexaobd->connect_error . ']');
}

if (!$conexaobd->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conexaobd->error);
}

?>
















