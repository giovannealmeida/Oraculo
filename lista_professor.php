<?php require "header.php" ?>
		
	<section id="itens_container">
		<div id="aba_nome">Professores</div>
		<div id="conteudo">
			<table class="table_listagem" border="1">
				<tr>
					<th>Nome</th>
					<th>Matéria</th>
					<th>Email</th>
					<th>Opções</th>

				</tr>
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
			</table>
			<a href="cadastra_professor.php" class="add_button">Novo Professor</a>
		</div>
		
	</section>
</body>
