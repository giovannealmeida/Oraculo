<?php 

require_once "header.php";
require_once "inc/mysql.php";

function convertDate($data){
	list($ano, $mes, $dia) = explode("-", $data);

	return $dia.'/'.$mes.'/'.$ano;
}
?>

<section id="conteudo_container">
	<div id="aba_nome"><h1>Atividades</h1></div>
	<div id="conteudo">
		<table class="table_listagem" border="1">
			<caption class="table_caption">Lista de Atividades</caption>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Matéria</th>
					<th>Tipo</th>
					<th>Data de Entrega</th>
					<th>Opções</th>

				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT a.id, a.nome, m.nome as materia, a.tipo, a.data_entrega FROM atividades a INNER JOIN materias m ON a.materia_id = m.id WHERE a.usuario_id={$_SESSION['id']}";
					
					if(!$result = $conexaobd->query($sql)){
					die('Houve um erro na query [' . $conexaobd->error . ']');
				}
				while($aux = $result->fetch_assoc()) {
				?>
				<tr>
					<td><?=$aux["nome"];?></td>
					<td><?=$aux["materia"];?></td>
					<td><?=$aux["tipo"];?></td>
					<td><?=convertDate($aux["data_entrega"]);?></td>
					<td><a href="cadastra_atividade.php?action=editar&id=<?=$aux["id"];?>" id="opt_editar">Editar</a>  |  <a href="cadastra_materia.php?action=excluir&id=<?=$aux["id"];?>" id="opt_remover" onclick="return confirm('Confirma a exclusão?');">Remover</a></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<a href="cadastra_atividade.php" class="add_button">Nova Atividade</a>
	</div>

</section>
<?php include "footer.php"; ?>
