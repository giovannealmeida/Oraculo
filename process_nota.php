<?php
require_once "inc/mysql.php";

if (!isset($_POST['numero_creditos'])) {
	header("Location: index.php");
}
$numero_creditos = $_POST['numero_creditos'];


for ($i=1; $i <= $numero_creditos; $i++) { 
	$vetor_creditos[]= $_POST["credito".$i];
}

for ($i=0,$j=1; $i < $numero_creditos; $i++,$j++) {
	$valor_credito = str_replace(",", ".", $vetor_creditos[$i]);
	$sql = "UPDATE notas SET nota=\"{$valor_credito}\" WHERE materia_id={$_POST['materia_id']} AND numero_credito={$j}";
	
	if(!$result = $conexaobd->query($sql)){
		die("Houve um erro na query {$i} [" . $conexaobd->error . "]");
	}
}

header("Location: index.php");

?>