<?php require "header.php" ?>
		
	<section id="itens_container">
		<a href="#" id="aba_nome">Novo Professor</a>
		
		<div class="conteudo">
			<form name="cadastro_professor" action="#" method="get">
			<label for="Nome">Nome: </label><input type="text" name="Nome" value=""><br>
			<label for="Email">Email: </label><input type="text" name="Email" value=""><br>
			<label for="Telefone">Telefone: </label><input type="text" name="Telefone" value=""><br>
			<label for="Lattes">Lattes: </label><input type="text" name="Lattes" value=""><br>
			<label for="Comentarios">Comentário: </label><input type="textarea" name="Comentarios" value=""><br>
			
			<input type="button" value="Limpar">
			<input type="button" value="Voltar">
			<input type="submit" value="Salvar">
			</form> 
		</div>
	</section>
</body>
