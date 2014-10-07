<?php require "header.php" ?>
		
	<section id="conteudo_container">
		<a href="#" id="aba_nome">Novo Professor</a>
		
		<div id="form">
			<form id="form_professor" name="cadastro_professor" action="#" method="get">
                <label for="input_nome">Nome: </label><input type="text" name="Nome" value="" class="input_text" id="input_nome"><br/>
                <label for="input_email">Email: </label><input type="text" name="Email" value="" class="input_text" id="input_email"><br/>
                <label for="input_telefone">Telefone: </label><input type="text" name="Telefone" value="" class="input_text" id="input_telefone"><br/>
                <label for="input_lattes">Lattes: </label><input type="text" name="Lattes" value="" class="input_text" id="input_lattes"><br/>
                <label for="input_comentarios">Outras Informações: </label><br/><br/><textarea name="Comentarios" rows="5" cols="40" id="input_comentarios" ></textarea><br/>
                <input class="clean_button" type="button" value="Limpar"><br/>
                <input class="back_button" type="button" value="Voltar">
                <input class="save_button" type="submit" value="Salvar">
			</form> 
		</div>
	</section>
<?php include "footer.php"; ?>
</html>
