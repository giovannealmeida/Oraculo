<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastro</title>
<link rel="stylesheet" type="text/css" href="styles/stylesheet.css" />
<?php
	$msgErroNome = "";
	$msgErroSobrenome = "";
	$msgErroSexo = "";
	$msgErroEmail = "";
	$msgErroUsuario = "";
	$msgErroSenha = "";
	$msgErroSenha_repete = "";
	
	$classNome = "textBox";
	$classSobrenome = "textBox";
	$classEmail = "textBox";
	$classUsuario = "textBox";
	$classSenha = "textBox";
	$classSenha_repete = "textBox";
	
	$valorNome = "";
	$valorSobrenome = "";
	$valorEmail = "";
	$valorUsuario = "";
	$valorSenha = "";
	$valorSenha_repete = "";
	
	$flagReady = 0;
		
	if(isset($_POST['btnCadastrar'])){
		//Pega valor campos
		$valorNome = $_POST['nome'];
		$valorEmail = $_POST['email'];
		$valorUsuario = $_POST['usuario'];
		$valorSenha = $_POST['senha'];
		$valorSenha_repete = $_POST['senha_repete'];
		
		//Campos vazios
		if(!$valorNome){$msgErroNome = "Insira um nome"; $classNome = "obTextBox";$flagReady++;}
		if(!$valorEmail){$msgErroEmail = "Inaira um e-mail"; $classEmail = "obTextBox";$flagReady++;}
		if(!$valorUsuario){$msgErroUsuario = "Insira um nome de usuário de 4 a 20 caracteres"; $classUsuario = "obTextBox";$flagReady++;}
		if(!$valorSenha){$msgErroSenha = "Insira uma senha de 4 a 20 caracteres"; $classSenha = "obTextBox"; if(!$valorSenha_repete) $msgErroSenha_repete = "Repita a senha aqui"; $classSenha_repete = "obTextBox";$flagReady++;}
		if($valorSenha && !$valorSenha_repete){$msgErroSenha_repete = "Repita a senha"; $classSenha_repete = "obTextBox";$flagReady++;}
		if(!isset($_POST['sexo'])){$msgErroSexo = "Selecione uma opção";}
		
		//Senha e senha repetida não são iguais
		if($valorSenha!=$valorSenha_repete&&$valorSenha_repete!=""){$msgErroSenha_repete = "As senhas não são iguais"; $classSenha_repete = "obTextBox";$flagReady++;}
		
		//Valores muito curtos ou muito longos
		if(strlen($valorNome)>30){$msgErroNome = "Seu nome é longo demais. Tem um apelido?"; $classNome = "obTextBox";$flagReady++;}
		if(strlen($valorSobrenome)>20){$msgErroSobrenome = "Seu sobrenome é longo demais. Use iniciais"; $classSobrenome = "obTextBox";$flagReady++;}
		if(!filter_var($valorEmail, FILTER_VALIDATE_EMAIL)){$msgErroEmail = "Insira um e-mail válido"; $classEmail = "obTextBox";$flagReady++;}
		if(strlen($valorUsuario)<4 || strlen($valorUsuario)>20){$msgErroUsuario = "Insira um nome de usuário de 4 a 20 caracteres"; $classUsuario = "obTextBox";$flagReady++;}
		if(strlen($valorSenha)<4 || strlen($valorSenha)>20){$msgErroSenha = "Insira uma senha de 4 a 20 caracteres"; $classSenha = "obTextBox";$flagReady++;}
		
		//Verifica a existência de cadastros
		include "functions/conecta_banco_local.php";
		if(strlen($valorUsuario)>4)
		{
			$sql = mysql_query("select user from contas where user='$valorUsuario'");
			while($tupla = mysql_fetch_array($sql)){
				if($tupla[0] == $valorUsuario)
					$msgErroUsuario = "O nome de usuário já existe";
					$classUsuario = "obTextBox";
					$flagReady++;
			}
		}
		if(!$flagReady) include "functions/cadastra_dados_local.php";
		$flagReady = 0;
	}
?>
</head>

<body>
<div id=painel_cadastro>
    <fieldset style="border-color:#FC0">
    <legend><h1>Cadastro</h1></legend>
    <form name="cadastro" method="post" >
        <label>Nome</label><br />
        <input type="text" name="nome" class="<?=$classNome?>" value="<?=$valorNome?>" placeholder="(campo obrigatório)" />       
        <span class="msgErro"><?=$msgErroNome?></span><br />
        
        <label>Sobrenome</label><br />
        <input type="text" name="sobrenome" class="<?=$classSobrenome?>" value="<?=$valorSobrenome?>" placeholder="(campo opcional)"/><br />
        <span class="msgErro"><?=$msgErroSobrenome?></span><br />
        
        <label>Sexo</label><br />
        <span class="msgErro"><?=$msgErroSexo?></span><br />
        <input type="radio" name="sexo" value="masculino" ><label>Masculino</label></input><br />
        <input type="radio" name="sexo" value="feminino" ><label>Feminino</label></input><br /><br />
        
        
        <label>E-mail</label><br />
      	<input type="text" name="email" class="<?=$classEmail?>" value="<?=$valorEmail?>" placeholder="email@exemplo.com" />
		<span class="msgErro"><?=$msgErroEmail?></span><br />
        
        <label>Nome de usuário</label><br />
        <input type="text" name="usuario" class="<?=$classUsuario?>" value="<?=$valorUsuario?>" placeholder="(campo obrigatório)" />
        <span class="msgErro"><?=$msgErroUsuario?></span><br />
        
        <label>Senha</label><br />
      	<input type="password" name="senha" class="<?=$classSenha?>" value="<?=$valorSenha?>" placeholder="(campo obrigatório)" />
		<span class="msgErro"><?=$msgErroSenha?></span><br />
        
        <label>Repita a senha</label><br />
      	<input type="password" name="senha_repete" class="<?=$classSenha_repete?>" placeholder="(campo obrigatório)" />
        <span class="msgErro"><?=$msgErroSenha_repete?></span><br />
        
        <input style="margin-top:20px;height:30px; float:right"  class="btnCadastro" type="submit" name="btnCadastrar" value="CADASTRAR"/>
    </form>
    <form method="post" action="index_local.php">
    	 <input style="margin-top:20px;height:30px; float:left"  class="btnVoltar" type="submit" name="btnVoltar" value="VOLTAR"/>
    </form>
    </fieldset>
    
    
</div>
</body>
</html>