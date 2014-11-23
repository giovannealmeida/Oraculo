<?php session_start(); 
	if (!isset($_SESSION['id'])) {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Oráculo</title>
	<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.validationEngine-pt_BR.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.maskedinput.js" type="text/javascript" charset="utf-8"></script>

	<link href="styles/estilo.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="js/validationEngine.jquery.css" type="text/css"/>
	<link rel="shortcut icon" href="imgs/logo.ico">
</head>

<body>
	<?php 
	require_once "inc/mysql.php"; 
	$sql = "SELECT * FROM usuario WHERE id={$_SESSION['id']}";
	if(!$result = $conexaobd->query($sql))
		die('Houve um erro na query [' . $conexaobd->error . ']');
	$aux = $result->fetch_assoc();

	?>
		<header>
			<a href="index.php"><img src="imgs/logo_alpha.png" alt="logo"></a>
		</header>
		<section id="area_container">
			<section id="user_info">
				<a href="index.php"><img src="imgs/fotos_usuarios/<?= $aux['img_nome'];?>" alt="Imagem Usuário" class="user_img"/></a><br/>
				<span id="user_name"><?=$aux['nome'];?></span> <br/>
				<a href="edit_usuario.php" ><img src="imgs/engrenagem.png" alt="Configuração" class="user_config_icon"/></a>
				<a href="logout.php" onclick="return confirm('Deseja realizar Logout?')"><img src="imgs/exit.png" alt="Logout" class="user_config_icon"/></a>
				<nav class="nav_links">
					<h2 class="lista_titulo">Listagem</h2>
					<ul>
						<li><a href="lista_professor.php">Professores</a></li>
						<li><a href="lista_materias.php">Matérias</a></li>
						<li><a href="lista_atividades.php">Atividades</a></li>
						<li><a href="lista_provas.php">Provas</a></li>
					</ul>
				</nav>

				<nav class="nav_links">
					<h2 class="list_titulo">Desempenho</h2>
					<ul>
						<li><a href="notas.php">Notas</a></li>
					</ul>
				</nav>
			</section>