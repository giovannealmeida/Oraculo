<?php require "header.php" ?>
		
	<section id="itens_container">
		<div id="aba_nome"><h1>Atividades</h1></div>
		<div id="conteudo">
			<table class="table_listagem" border="1">
				<caption id="table_caption">Lista de Atividades</caption>
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
					<tr>
						<td>Derivadas</td>
						<td>Cálculo 1</td>
						<td>Lista</td>
						<td>20/10/2014</td>
						<td><a href="#" id="opt_ver">Ver</a>  |  <a href="#" id="opt_editar">Editar</a>  |  <a href="#" id="opt_remover">Remover</a></td>
					</tr>
					<tr>
						<td>Lista - Integral</td>
						<td>Cálculo 2</td>
						<td>Lista</td>
						<td>15/11/2014</td>
						<td><a href="#" id="opt_ver">Ver</a>  |  <a href="#" id="opt_editar">Editar</a>  |  <a href="#" id="opt_remover">Remover</a></td>
					</tr>
					<tr>
						<td>Forms e Interação com BD</td>
						<td>Desenvolvimento WEB</td>
						<td>Projeto de Curso</td>
						<td>30/10/2014</td>
						<td><a href="#" id="opt_ver">Ver</a>  |  <a href="#" id="opt_editar">Editar</a>  |  <a href="#" id="opt_remover">Remover</a></td>
					</tr>
				</tbody>
			</table>
			<a href="cadastra_atividade.php" class="add_button">Nova Atividade</a>
		</div>
		
	</section>
</body>
