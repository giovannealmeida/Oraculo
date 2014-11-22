<?php
require_once "inc/mysql.php";
session_start();

if (isset($_POST["Nome"]) && $_POST["Nome"] != "") {
	$nome = $_POST["Nome"];
	$data = $_POST["Data"];
	$materia = $_POST["Materia"];
	$assuntos = $_POST["Assuntos"];


	list($dia,$mes,$ano) = explode("/", $data);
	$data = $ano."-".$mes."-".$dia;

	if ($_POST["action"] == "add") {
		$sql = "INSERT INTO provas (nome, data_prova, assuntos, materia_id, usuario_id) 
				VALUES (\"{$nome}\", \"{$data}\", \"{$assuntos}\", \"{$materia}\",\"{$_SESSION['id']}\");";
	}elseif ($_POST["action"] == "editar") {
		$id = $_POST["id"];
		$sql = "UPDATE provas SET 
				nome=\"{$nome}\", data_prova=\"{$data}\", assuntos=\"{$assuntos}\", materia_id=\"{$materia}\" 
				WHERE id={$id};";

	}


	if (!$res = $conexaobd->query($sql)) {
		die('There was an error running the query [' . $conexaobd->error . ']'.$sql);
	}

	$conexaobd->close();
	header("Location: cadastra_atividade.php?sucess=1&action={$_POST["action"]}");
}
if (isset($_GET["action"]) && $_GET["action"] == "excluir") {

	$id = $_GET["id"];
	$sql = "DELETE FROM provas WHERE id={$id};";

	if (!$res = $conexaobd->query($sql)) {
		die('There was an error running the query [' . $conexaobd->error . ']');
	}

	$conexaobd->close();

	header("Location: lista_atividade.php");
}
?>