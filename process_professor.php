<?php
require_once "inc/mysql.php";
session_start();

if (isset($_POST["Nome"]) && $_POST["Nome"] != "") {
	$nome = $_POST["Nome"];
	$email = $_POST["Email"];
	$lattes = $_POST["Lattes"];
	$telefone = $_POST["Telefone"];
	$comentarios = $_POST["Comentarios"];

	if ($_POST["action"] == "add") {
		$sql = "INSERT INTO professores (nome, email, lattes, telefone, info, usuario_id) 
		VALUES (\"{$nome}\", \"{$email}\", \"{$lattes}\", \"{$telefone}\", \"{$comentarios}\", \"{$_SESSION['id']}\");";

	}elseif ($_POST["action"] == "editar") {
		$id = $_POST["id"];
		$sql = "UPDATE professores SET 
		nome=\"{$nome}\", email=\"{$email}\", lattes=\"{$lattes}\", telefone=\"{$telefone}\", info=\"{$comentarios}\"
		WHERE id={$id};";

	}

	if (!$res = $conexaobd->query($sql)) {
		die('There was an error running the query [' . $conexaobd->error . ']');
	}

	$conexaobd->close();
	header("Location: cadastra_professor.php?sucess=1&action={$_POST["action"]}");

}

if (isset($_GET["action"]) && $_GET["action"] == "excluir") {

	$id = $_GET["id"];
	$sql = "DELETE FROM professores WHERE id={$id};";

	if (!$res = $conexaobd->query($sql)) {
		die('There was an error running the query [' . $conexaobd->error . ']');
	}

	$conexaobd->close();

	header("Location: lista_professor.php");
}
?>