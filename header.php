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
	<header>
		<img src="imgs/logo_alpha.png" alt="logo">
	</header>
	<section id="area_container">
		<section id="user_info">
			<a href="index.php"><img src="imgs/usuarioH.jpg" alt="Imagem Usuário" class="user_img"/></a><br/>
			<span id="user_name">Usuário</span> <a href="#" ><img src="imgs/engrenagem.png" alt="Configuração" class="config_img"/></a>
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
					<li><a href="graficos.php">Gráficos</a></li>
				</ul>
			</nav>
		</section>