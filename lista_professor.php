<?php 
require_once "header.php";
require_once "inc/mysql.php";

?>

<section id="conteudo_container">
	<div id="aba_nome"><h1>Professores</h1></div>
	<div id="conteudo">
		<table class="table_listagem" border="1">
			<caption class="table_caption">Lista de Professores</caption>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Telefone</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM professores p WHERE p.usuario_id={$_SESSION['id']}";
				if(!$result = $conexaobd->query($sql)){
					die('Houve um erro na query [' . $conexaobd->error . ']');
				}
				while($aux = $result->fetch_assoc()) {

				?>
				<tr>
					<td><?=$aux["nome"];?></td>
					<td><?=$aux["email"] == "" ? '-': $aux["email"];?></td>
					<td><?=$aux["telefone"] == "" ? '-': $aux["telefone"];?></td>
					<td><a href="cadastra_professor.php?action=editar&id=<?=$aux["id"];?>" id="opt_editar">Editar</a>  |  
					<a href="process_professor.php?action=excluir&id=<?=$aux["id"];?>" id="opt_remover" onclick="return confirm('Confirma a exclusão?');">Remover</a></td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<a href="cadastra_professor.php" class="add_button">Novo Professor</a>
	</div>

</section>
<?php include "footer.php"; ?>
