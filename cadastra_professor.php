<?php require "header.php" ?>
		
	<section id="itens_container">
		<a href="#" id="aba_nome">Novo Professor</a>
		
		<div id="form">
			<form name="cadastro_professor" action="#" method="get">
                <label for="Nome">Nome: </label><input type="text" name="Nome" value=""><br>
                <label for="Email">Email: </label><input type="text" name="Email" value=""><br>
                <label for="Telefone">Telefone: </label><input type="text" name="Telefone" value=""><br>
                <label for="Lattes">Lattes: </label><input type="text" name="Lattes" value=""><br>
                <label for="Comentarios">Comentário: </label><br><textarea name="Comentarios" rows="5" cols="40"></textarea><br>
                <input class="clean_button" type="button" value="Limpar"><br>
                <input class="back_button" type="button" value="Voltar">
                <input class="save_button" type="submit" value="Salvar">
			</form> 
		</div>
	</section>
</body>
