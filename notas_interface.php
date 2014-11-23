<?php 
if (!isset($_GET['id'])) {
	header("Location: index.php");
}
require_once "header.php";
require_once "inc/mysql.php";
?>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery("#form_notas").validationEngine();

});
</script>
<section id="conteudo_container">
	<div id="aba_nome"><h1>Notas</h1></div>
	<div id="conteudo">
		<?php
		$sql = "SELECT m.nome, p.nome as professor, m.creditos, m.info FROM materias m INNER JOIN professores p ON m.professor_id = p.id WHERE m.id={$_GET['id']} AND m.usuario_id={$_SESSION['id']}";
		// die($sql);
		if(!$result = $conexaobd->query($sql)){
			die('Houve um erro na query [' . $conexaobd->error . ']');
		}
		if ($result->num_rows == 0) {
			header("Location: index.php");
		}
		$aux = $result->fetch_assoc();
		
		?>

		<ul>
			<li><b>Matéria:</b> <?=$aux['nome'];?></li>
			<li><b>Professor:</b> <?=$aux['professor'];?></li>
			<li><b>Quantidade de Créditos:</b> <?=$aux['creditos'];?></li>
			<li><b>Informação Adicional:</b> <?=$aux['info'] == "" ? "-" : $aux['info'];?></li>

		</ul>
		<br/><br/>
		<div id="form">
			<form id="form_notas" method="post" action="process_nota.php">

				<?php

				$sql = "SELECT * FROM notas n INNER JOIN materias m ON m.id = n.materia_id WHERE m.id={$_GET['id']}";
				if(!$result = $conexaobd->query($sql)){
					die('Houve um erro na query [' . $conexaobd->error . ']');
				}

				while($aux = $result->fetch_assoc()) {
					$numero_credito = $aux['numero_credito'];
					?>

					<label class="notas_label" for="notas_credito<?=$numero_credito?>">Crédito <?=$numero_credito?>:</label><input id="notas_credito<?=$numero_credito?>" type="text" value="<?=$aux['nota'];?>" name="credito<?=$numero_credito?>" class="validate[custom[number]] input_text"/><br/>
					<?php
				}
				?>
				<input type="hidden" value="<?=$numero_credito?>" name="numero_creditos" />
				<input type="hidden" value="<?=$_GET['id']?>" name="materia_id" />
				<input class="func_button" id="clean_button" type="reset" value="Limpar"/>
				<input class="func_button" id="save_button" type="submit" value="Salvar"/>
			</form>
		</div>
	</div>

</section>
<?php include "footer.php"; ?>
