<?php require "header.php" ?>
		
	<section id="itens_container">
		<div id="aba_nome"><h1>Matérias</h1></div>
		<div id="conteudo">
			<table class="table_listagem" border="1">
				<caption id="table_caption">Lista de Matérias</caption>

				<thead>
					<tr>
						<th>Nome</th>
						<th>Professor</th>
						<th>Créditos</th>
						<th>Opções</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Estrutura de Dados</td>
						<td>Paulo Costa</td>
						<td>4</td>
						<td><a href="#" id="opt_ver">Ver</a>  |  <a href="#" id="opt_editar">Editar</a>  |  <a href="#" id="opt_remover">Remover</a></td>
					</tr>
					<tr>
						<td>Inteligência Artificial</td>
						<td>Alvaro Coelho</td>
						<td>4</td>
						<td><a href="#" id="opt_ver">Ver</a>  |  <a href="#" id="opt_editar">Editar</a>  |  <a href="#" id="opt_remover">Remover</a></td>
					</tr>
				</tbody>
			</table>
			<a href="cadastra_materia.php" class="add_button">Nova Matéria</a>
		</div>
		
	</section>
</body>
