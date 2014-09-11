<?php require "header.php" ?>
		
	<section id="itens_container">
		<a href="#" id="aba_nome">Professores</a>
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
					<td><a href="#">Ver</a>  |  <a href="#">Editar</a>  |  <a href="#">Remover</a></td>
				</tr>
				<tr>
					<td>Flavio Yamamoto</td>
					<td>Inteligência Artificial</td>
					<td>yamamoto@email.com</td>
					<td><a href="#">Ver</a>  |  <a href="#">Editar</a>  |  <a href="#">Remover</a></td>
				</tr>
			</table>
			<a href="cadastra_professor.php" class="add_button">Novo Professor</a>
		</div>
		
	</section>
</body>
