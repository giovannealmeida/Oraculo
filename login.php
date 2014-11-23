<?php session_start(); 
	if (isset($_SESSION['id'])) {
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
	<link href="styles/estilo.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="js/validationEngine.jquery.css" type="text/css"/>
	<link rel="shortcut icon" href="imgs/logo.ico">
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#form_login").validationEngine();
		});
	</script>
</head>
<body>
	<header>
		<a href="index.php"><img src="imgs/logo_alpha.png" alt="logo"></a>
	</header>
	<section id="single_container">
		<?php 
		if (isset($_GET['error'])) {
			echo "<p id='error_msg'>A senha ou email não conferem!</p>";
		}
		else echo "<br/>";
		?>
		<form id="form_login" action="usuario_process.php" method="post">
			<fieldset>
				<legend>Login</legend>
				<label for="login_email">Email:</label><br/><input type="text" name="email" placeholder="Email" id="login_email" class="validate[required] single_input" /><br/>
				<label for="login_senha">Senha:</label><br/><input type="password" name="senha" placeholder="Senha" id="login_senha" class="validate[required] single_input"/>
				<input id="login_button" type="submit" value="ENTRAR" />
				<input name="action" type="hidden" value="login">
			</fieldset>
		</form>
		<br/>
		<br/>
		<p>Ainda não possui uma conta?</p>
		<br/>
		<p><a href="cadastro.php">CADASTRE-SE</a></p>
	</section>
</body>
</html>