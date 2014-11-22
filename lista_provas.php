<?php 
require "header.php";
require "inc/mysql.php";

function convertDate($data){
	list($ano, $mes, $dia) = explode("-", $data);

	return $dia.'/'.$mes.'/'.$ano;
}
?>

<section id="conteudo_container">
	<div id="aba_nome"><h1>Provas</h1></div>
	<div id="conteudo">
		<table class="table_listagem" border="1">
			<caption class="table_caption">Lista de Provas</caption>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Matéria</th>
					<th>Data</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT p.id, p.nome, m.nome as materia, p.data_prova FROM provas p INNER JOIN materias m ON p.materia_id=m.id WHERE p.usuario_id={$_SESSION['id']}";
				if(!$result = $conexaobd->query($sql)){
					die('Houve um erro na query [' . $conexaobd->error . ']');
				}
				while($aux = $result->fetch_assoc()) {
					?>
					<tr>
						<td><?=$aux["nome"];?></td>
						<td><?=$aux["materia"];?></td>
						<td><?=convertDate($aux["data_prova"]);?></td>
						<td><a href="cadastra_prova.php?action=editar&id=<?=$aux["id"];?>" id="opt_editar">Editar</a>  |  <a href="cadastra_prova.php?action=excluir&id=<?=$aux["id"];?>" id="opt_remover" onclick="return confirm('Confirma a exclusão?');">Remover</a></td>
					</tr>
					<?php
				}
				?>

			</tbody>
		</table>
		<a href="cadastra_prova.php" class="add_button">Nova Prova</a>
	</div>

</section>
<?php include "footer.php"; ?>
