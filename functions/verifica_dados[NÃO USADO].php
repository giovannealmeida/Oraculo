<?php
	include "conecta_banco.php";
	
	session_start();
	
	$user = "";
	$password = "";
	$login = false;
	
	$sql = "select * from contas";
	$sql = mysql_query($sql);
	
	while($tupla = mysql_fetch_array($sql))
	{
		if(isset($tupla[0]) && isset($tupla[1]))
		{
			$user = $tupla[0];
			$password = $tupla[1];
		}
		else
			echo "Usuário não cadastrado";
	}
	
	if($user == $_POST['user'] && $password == $_POST['password'])
	{
		$login = true;
		$_SESSION['user'] = $user;
		echo "Login efetuado";
	}
	else
		echo "Usuário ou senha inválidos";
	
?>