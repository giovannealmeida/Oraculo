<?php 
$today = getdate(); 
require_once "header.php";
require_once "inc/mysql.php";

function showNotas(&$media, $creditos, $materia_id, $conexaobd){
	$sql = "SELECT * FROM notas n INNER JOIN materias m ON m.id = n.materia_id WHERE m.id={$materia_id}";
	
	if(!$result2 = $conexaobd->query($sql)){
		die('Houve um erro na query [' . $conexaobd->error . ']');
	}
	$soma=0;
	$aux = $result2->fetch_assoc();
	$soma += $aux['nota'];
	$valor_nota = str_replace('.', ',', $aux['nota']);
	echo "{$valor_nota} | ";

	while($aux = $result2->fetch_assoc()) {
		$soma += $aux['nota'];
		$valor_nota = str_replace('.', ',', $aux['nota']);
		echo "{$valor_nota} | ";
	}

	$media = $soma/$creditos;
}


?>

<section id="conteudo_container">
	<div id="aba_nome"><h1>Bem-vindo [<?=$today['mday']."/".$today['mon']."/".$today['year']?>]</h1></div>
	<div id="conteudo">
		<table class="table_listagem" border="1">
			<caption class="table_caption">Resumo das Notas</caption>

			<thead>
				<tr>
					<th>Matéria</th>
					<th>Créditos</th>
					<th>Notas</th>
					<th>Média</th>
					<th>Opções</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT m.id, m.nome, creditos FROM materias m INNER JOIN professores p ON m.professor_id = p.id WHERE m.usuario_id={$_SESSION['id']}";
				if(!$result = $conexaobd->query($sql)){
					die('Houve um erro na query [' . $conexaobd->error . ']');
				}

				while($aux = $result->fetch_assoc()) {
					?>
					<tr>
						<td><?=$aux["nome"];?></td>
						<td><?=$aux["creditos"];?></td>
						<td><?=showNotas($media,$aux['creditos'], $aux['id'], $conexaobd);?></td>
						<td><?=$media?></td>
						<td><a href="notas_interface.php?id=<?=$aux["id"];?>" id="opt_editar">Editar Notas</a></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		
	</div>		
</section>
<?php include "footer.php"; ?>
