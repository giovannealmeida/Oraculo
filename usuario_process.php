<?php
require_once "inc/mysql.php";
session_start();

if (!isset($_POST['action'])) {
	header("Location: index.php");
}
else{

	if ($_POST['action'] == "update") {
		$nome = $_POST['input_nome'];
		$foto_nome = $_FILES["input_foto"]["name"];

		$target_dir = "imgs/fotos_usuarios/";
		$target_file = $target_dir . $foto_nome;
		move_uploaded_file($_FILES['input_foto']['tmp_name'], $target_dir . $foto_nome);

		if ($_FILES["input_foto"]["size"] > 500000) {
			echo "Desculpe, a imagem é muito grande, escolha outra. Limite de 500Kb";
			$uploadOk = 0;
		}

		$sql = "UPDATE usuario SET nome=\"{$nome}\", img_nome=\"{$foto_nome}\" WHERE id={$_SESSION['id']}";
		if(!$result = $conexaobd->query($sql))
			die('Houve um erro na query [' . $conexaobd->error . ']');
		
		header("Location: index.php");
	}

	if ($_POST['action'] == "login") {
		if ($_POST['email'] == "" || $_POST['senha'] == "") {
			header("Location: login.php?error=1");
		}

		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$sql = "SELECT * FROM usuario WHERE email=\"{$email}\" AND senha=\"{$senha}\"";

		if(!$result = $conexaobd->query($sql))
			die('Houve um erro na query [' . $conexaobd->error . ']');

		if ($result->num_rows == 1) {
			$aux = $result->fetch_assoc();
			
			$_SESSION['id'] = $aux['id'];
			header("Location: index.php");
		}
		else{
			header("Location: login.php?error=1");
		}
	}

	if ($_POST['action'] == "insert") {
		$email = $_POST['email'];
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];


		$sql = "INSERT INTO usuario (email, senha, nome, img_nome) VALUES (\"{$email}\", \"{$senha}\", \"{$nome}\", 'usuarioM.jpg');";
		if(!$result = $conexaobd->query($sql))
			die('Houve um erro na query [' . $conexaobd->error . ']');

		$sql = "SELECT LAST_INSERT_ID() as id;";
		if(!$result = $conexaobd->query($sql))
			die('Houve um erro na query [' . $conexaobd->error . ']');
		$aux = $result->fetch_assoc();

		$_SESSION['id'] = $aux['id'];
		header("Location: index.php");
	}

}


?>