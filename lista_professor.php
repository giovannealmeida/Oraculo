<?php require "header.php" ?>
		
	<section id="conteudo_container">
		<div id="aba_nome"><h1>Professores</h1></div>
		<div id="conteudo">
			<table class="table_listagem" border="1">
				<caption class="table_caption">Lista de Professores</caption>
				<thead>
					<tr>
						<th>Nome</th>
						<th>Matéria</th>
						<th>Email</th>
						<th>Opções</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Dany Sanchez</td>
						<td>Desenvolvimento WEB</td>
						<td>dany@email.com</td>
						<td><a href="#" id="opt_ver">Ver</a>  |  <a href="#" id="opt_editar">Editar</a>  |  <a href="#" id="opt_remover">Remover</a></td>
					</tr>
					<tr>
						<td>Flavio Yamamoto</td>
						<td>Inteligência Artificial</td>
						<td>yamamoto@email.com</td>
						<td><a href="#" id="opt_ver">Ver</a>  |  <a href="#" id="opt_editar">Editar</a>  |  <a href="#" id="opt_remover">Remover</a></td>
					</tr>
				</tbody>
			</table>
			<a href="cadastra_professor.php" class="add_button">Novo Professor</a>
		</div>
		
	</section>
<?php include "footer.php"; ?>
