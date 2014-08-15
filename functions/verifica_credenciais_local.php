<?php
	session_start();
	
	if(!$_SESSION["id"]){
		header("Location: index_local.php");
	}
?>