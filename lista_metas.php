<?php require "header.php" ?>
		
	<section id="itens_container">
		<div id="aba_nome"><h1>Metas</h1></div>
		<div id="conteudo">
			<table class="table_listagem" border="1">
            	<caption id="table_caption">Lista de Metas</caption>
				<thead>
					<tr>
						<th>Meta</th>
						<th>Progresso</th>
						<th>Criada em</th>
						<th>Concluída em</th>
						<th>Descrição</th>
					</tr>
				</thead>
				<tbody>
				<tr>
					<td>Lista</td>
					<td>100%</td>
					<td>10/04/2014</td>
					<td>13/04/2014</td>
                    <td>Terminar a lista de cálculo</td>
				</tr>
				<tr>
					<td>Lista2</td>
					<td>70%</td>
					<td>10/04/2014</td>
					<td>----------</td>
                    <td>Terminar a lista de PAA</td>
				</tr>
				</tbody>
			</table>
			<a href="cadastra_metas.php" class="add_button">Nova Meta</a>
		</div>
		
	</section>
</body>
