<?php
	if(!($conexao = mysql_connect("localhost", "oraculo", ""))){
		echo "Falha na conexao com o banco de dados";
		exit;
	}
	
	if(!($banco = mysql_select_db("test",$conexao)))
		echo "Falha ao selecionar banco de dados";
?>