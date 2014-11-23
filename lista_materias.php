<?php 
require_once "header.php";
require_once "inc/mysql.php";
?>

<section id="conteudo_container">
	<div id="aba_nome"><h1>Matérias</h1></div>
	<div id="conteudo">
		<table class="table_listagem" border="1">
			<caption class="table_caption">Lista de Matérias</caption>

			<thead>
				<tr>
					<th>Nome</th>
					<th>Professor</th>
					<th>Créditos</th>
					<th>Opções</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT m.id, m.nome, p.nome as professor, creditos FROM materias m INNER JOIN professores p ON m.professor_id = p.id WHERE m.usuario_id={$_SESSION['id']}";
				if(!$result = $conexaobd->query($sql)){
					die('Houve um erro na query [' . $conexaobd->error . ']');
				}
				while($aux = $result->fetch_assoc()) {
					?>
					<tr>
						<td><?=$aux["nome"];?></td>
						<td><?=$aux["professor"];?></td>
						<td><?=$aux["creditos"];?></td>
						<td><a href="cadastra_materia.php?action=editar&id=<?=$aux["id"];?>" id="opt_editar">Editar</a>  |  <a href="cadastra_materia.php?action=excluir&id=<?=$aux["id"];?>" id="opt_remover" onclick="return confirm('Confirma a exclusão?');">Remover</a></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<a href="cadastra_materia.php" class="add_button">Nova Matéria</a>
	</div>

</section>
<?php include "footer.php"; ?>
