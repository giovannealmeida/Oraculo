<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: ../index_local.php");
?>