<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Oráculo</title>
<link href="styles/stylesheet.css" rel="stylesheet" type="text/css" />
</head>
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
	require_once "functions/verifica_credenciais_local.php";
	include "functions/conecta_banco_local.php";
	
	$id_usuario = $_SESSION['id'];
	
	$sql = mysql_query("select * from contas where id_user='$id_usuario'");
	$dados_usuario = mysql_fetch_row($sql);
	$nome = $dados_usuario[3];
	$sexo = $dados_usuario[6];
?>
<body>
   	<h1><?php if($sexo == "masculino") echo "Bem-vindo, "; else echo "Bem-vinda, ";echo $nome?>!</h1>
    
    <form name="logout" action="functions/logout_local.php">
    	<input type="submit" class="btnCadastro" value="Logoff" />
    </form>
    
    <div id="menu_rapido">
    </div>
    
    <div id="conteudo">
    	<div class="cabecalho_tabela">
        	Próximas provas
        </div>
        <div style="float:left">
            <div class="celula" style="font-weight:bold" align="center">
                Nome
            </div>
            <div class="celula" align="center">
                Cálculo II
            </div>
            <div class="celula" align="center">
                Banco de dados
            </div>
		</div>
        <div style="float:left">
            <div class="celula" style="font-weight:bold" align="center">
                Data
            </div>
            <div class="celula" align="center">
                Amanhã
            </div>
            <div class="celula" align="center">
                22/11
            </div>
		</div>
    </div>
    
</body>
</html>