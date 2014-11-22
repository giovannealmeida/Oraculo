<?php
require_once "inc/mysql.php";
session_start();

if (isset($_POST["Nome"]) && $_POST["Nome"] != "") {
	$nome = $_POST["Nome"];
	$tipo = $_POST["Tipo"];
	$data = $_POST["Data"];
	$materia = $_POST["Materia"];
	$comentarios = $_POST["Comentarios"];


	list($dia,$mes,$ano) = explode("/", $data);
	$data = $ano."-".$mes."-".$dia;

	if ($_POST["action"] == "add") {
		$sql = "INSERT INTO atividades (nome, tipo, data_entrega, info, materia_id, usuario_id) 
				VALUES (\"{$nome}\", \"{$tipo}\", \"{$data}\", \"{$comentarios}\", \"{$materia}\",\"{$_SESSION['id']}\");";
	}elseif ($_POST["action"] == "editar") {
		$id = $_POST["id"];
		$sql = "UPDATE atividades SET 
				nome=\"{$nome}\", tipo=\"{$tipo}\", data_entrega=\"{$data}\", info=\"{$comentarios}\", materia_id=\"{$materia}\" 
				WHERE id={$id};";

	}

	if (!$res = $conexaobd->query($sql)) {
		die('There was an error running the query [' . $conexaobd->error . ']');
	}

	$conexaobd->close();
	header("Location: cadastra_materia.php?sucess=1&action={$_POST["action"]}");
}
if (isset($_GET["action"]) && $_GET["action"] == "excluir") {

	$id = $_GET["id"];
	$sql = "DELETE FROM atividade WHERE id={$id};";

	if (!$res = $conexaobd->query($sql)) {
		die('There was an error running the query [' . $conexaobd->error . ']');
	}

	$conexaobd->close();

	header("Location: lista_atividade.php");
}
?>