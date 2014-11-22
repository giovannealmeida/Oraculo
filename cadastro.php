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
			jQuery("#form_cadastro").validationEngine({'custom_error_messages' : {
				'#cadastro_senha2': {
					'equals': {
						'message': "As senhas não correspondem."
					}
				}
			}
		});
		});
	</script>
</head>
<body>
	<header>
		<a href="index.php"><img src="imgs/logo_alpha.png" alt="logo"></a>
	</header>
	<section id="single_container">
		<form id="form_cadastro" action="usuario_process.php" method="post">
			<fieldset>
				<legend>Cadastro</legend>
				<label for="cadastro_nome">Nome:</label><br/><input type="text" name="nome" placeholder="Nome" id="cadastro_nome" class="validate[required] single_input" /><br/>
				<label for="cadastro_email">Email:</label><br/><input type="text" name="email" placeholder="Email" id="cadastro_email" class="validate[required] single_input" /><br/>
				<label for="cadastro_senha">Senha:</label><br/><input type="password" name="senha" placeholder="Senha" id="cadastro_senha" class="validate[required] single_input"/>
				<label for="cadastro_senha2">Digite a Senha Novamente:</label><br/><input type="password" name="senha" placeholder="Senha" id="cadastro_senha2" class="validate[required,equals[cadastro_senha]] single_input"/>
				
				<input id="login_button" type="submit" value="ENTRAR" />
				<input name="action" type="hidden" value="insert">
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