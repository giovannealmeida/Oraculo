<?php require "header.php" ?>
		
	<section id="itens_container">
		<div id="aba_nome"><h1>Provas</h1></div>
		<div id="conteudo">
			<table class="table_listagem" border="1">
				<caption id="table_caption">Lista de Provas</caption>
				<thead>
					<tr>
						<th>Matéria</th>
						<th>Data</th>
						<th>Assuntos</th>
						<th>Opções</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Teoria da Computação</td>
						<td>30/09/2014</td>
						<td>Linguagens não sensí...</td>
						<td><a href="#" id="opt_ver">Ver</a>  |  <a href="#" id="opt_editar">Editar</a>  |  <a href="#" id="opt_remover">Remover</a></td>
					</tr>
					<tr>
						<td>Redes 1</td>
						<td>30/09/2014</td>
						<td>Camada de Aplicação</td>
						<td><a href="#" id="opt_ver">Ver</a>  |  <a href="#" id="opt_editar">Editar</a>  |  <a href="#" id="opt_remover">Remover</a></td>
					</tr>
				</tbody>
			</table>
			<a href="cadastra_professor.php" class="add_button">Nova Prova</a>
		</div>
		
	</section>
</body>
