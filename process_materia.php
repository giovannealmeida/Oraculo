<?php
require_once "inc/mysql.php";
session_start();

if (isset($_POST["Nome"]) && $_POST["Nome"] != "") {
	$nome = $_POST["Nome"];
	$creditos = $_POST["Creditos"];
	$professor = $_POST["Professor"];
	$comentarios = $_POST["Comentarios"];

	if ($_POST["action"] == "add") {
		$sql = "INSERT INTO materias (nome, creditos, info, professor_id, usuario_id) 
		VALUES (\"{$nome}\", \"{$creditos}\",  \"{$comentarios}\", \"{$professor}\",\"{$_SESSION['id']}\");";

	}elseif ($_POST["action"] == "editar") {
		$id = $_POST["id"];
		$sql = "UPDATE materias SET 
		nome=\"{$nome}\", creditos=\"{$creditos}\", info=\"{$comentarios}\", professor_id=\"{$professor}\" 
		WHERE id={$id};";

	}
	if (!$res = $conexaobd->query($sql)) {
		die('There was an error running the querY [' . $conexaobd->error . ']');
	}

	if ($_POST["action"] == "add") {
		$sql = "SELECT LAST_INSERT_ID() as id_materia;";
		if (!$res = $conexaobd->query($sql)) {
			die('There was an error running the query 1[' . $conexaobd->error . ']');
		}
		$aux = $res->fetch_assoc();

		$sql = "SELECT creditos FROM materias WHERE id={$aux['id_materia']};";
		if (!$res = $conexaobd->query($sql)) {
			die('There was an error running the query 2[' . $conexaobd->error . ']');
		}
		$aux2 = $res->fetch_assoc();

		for ($i=1; $i <= $aux2['creditos']; $i++) { 
			$sql = "INSERT INTO notas (numero_credito, materia_id, nota) VALUES ({$i}, {$aux['id_materia']}, 0);";
			if (!$res = $conexaobd->query($sql)) {
				die('There was an error running the query 3[' . $conexaobd->error . ']');
			}
		}
	}

	$conexaobd->close();
	header("Location: cadastra_materia.php?sucess=1&action={$_POST["action"]}");
}
if (isset($_GET["action"]) && $_GET["action"] == "excluir") {

	$id = $_GET["id"];
	$sql = "DELETE FROM materias WHERE id={$id};";

	if (!$res = $conexaobd->query($sql)) {
		die('There was an error running the query [' . $conexaobd->error . ']');
	}

	$conexaobd->close();

	header("Location: lista_materia.php");
}
?>