<?php

include "conecta_banco_local.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];

$sql = mysql_query("insert into contas(user, senha, nome, sobrenome, email, sexo) values('$usuario', '$senha', '$nome', '$sobrenome', '$email', '$sexo')");
header("Location: index.php");
?>