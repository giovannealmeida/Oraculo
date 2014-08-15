<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="google-translate-customization" content="bc3aa2aa36d261df-bf6e938fa458f1a5-gc37e01a6ee087d6c-1b"></meta>
<title>Oráculo</title>
<link rel="stylesheet" type="text/css" href="styles/stylesheet.css" />
<?php
	
	/*
	Tabela de indices
	0 - id_user
	1 - user
	2 - senha
	3 - nome
	4 - sobrenome
	5 - email
	6 - sexo
	*/

	//Verifica se existe sessão
	/*CODIGO AQUI*/
	
	//Valida campos
	
	//Mensagens de erro exibidas nos span
	$msgErroUsuario="";
	$msgErroSenha="";
	$msgErroLogin = "";
	
	$classUsuario = "textBox";
	$classSenha = "textBox";
	
	$valorUsuario = "";
	$valorSenha = "";
	
	if(isset($_POST['btnEntrar'])){
		$valorUsuario = $_POST['usuario'];
		$valorSenha = $_POST['senha'];
		
		if($valorUsuario=="")
		{
			$msgErroUsuario = "Insira o nome de usuário";
			$classUsuario = "obTextBox";
		}
		if($valorSenha=="")
		{
			$msgErroSenha = "Insira a senha";
			$classSenha = "obTextBox";
		}
	
		//Faz login
		include "functions/conecta_banco_local.php";
		
		session_start();
		
		$id_usuario = "";
		$usuario = "";
		$senha = "";
		
		
		$sql = mysql_query("select * from contas");
		
		while($tupla = mysql_fetch_array($sql))
		{
			if(isset($tupla[1]) && isset($tupla[2])&& isset($tupla[3]))
			{
				$id_usuario = $tupla[0];
				$usuario = $tupla[1];
				$senha = $tupla[2];
			}
			else
				$msgErroLogin = "Falta dados no cadastro";
		
			if($usuario == $valorUsuario && $senha == $valorSenha)
			{
				$_SESSION['id'] = $id_usuario;
				header("Location: home_local.php");
			}
			else
				if(($classSenha=="textBox")&&($classUsuario=="textBox"))
					$msgErroLogin = "Usuário ou senha inválidos";
		}
		$valorSenha = "";
	}
?>
</head>
<body>
<div id="login_box">
	<fieldset style="border-color:#060">
    <legend><h1>Login</h1></legend>
	<form name="login" method="post">
    	<input type="text" class="<?=$classUsuario?>" name="usuario" placeholder="Usuário" value="<?=$valorUsuario?>" <?php if($classUsuario!="obTextBox") {echo ("autofocus=\"autofocus\"");}?> />
        <span class="msgErro"><?=$msgErroUsuario?></span>
        <input type="password" class="<?=$classSenha?>" name="senha" placeholder="Senha" value="<?=$valorSenha?>"/>
        <span class="msgErro"><?=$msgErroSenha?></span>
        <span class="msgErro"><?=$msgErroLogin?></span>
        <input class="btnEntrar" type="submit" name="btnEntrar" value="ENTRAR"/>
        <p align="right" style="font-size:12px; font-style:italic; margin-top:0px;">
        	<a href="#">Esqueci minha senha</a>
       	</p>
    </form>
    
    <form align="right" method="post" action="cadastro_local.php">
    	<p style="font-size:14px; font-weight:bold; margin-top:20px">Ainda não possui uma conta?</p>
    	<input class="btnCadastro" type="submit" name="btnCadastro" value="CADASTRE-SE"/>
    </form>
    </fieldset>
</div>
    
<!--
    <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
-->
</body>
</html>