<?php 
require_once "header.php";
require_once "inc/mysql.php";

$sql = "SELECT nome FROM usuario WHERE id={$_SESSION['id']}";
if(!$result = $conexaobd->query($sql))
  die('Houve um erro na query [' . $conexaobd->error . ']');
$aux = $result->fetch_assoc();

?>

<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery("#form_usuario").validationEngine();

  });
</script>


<section id="conteudo_container">
  <a href="#" id="aba_nome">Editar Cadastro</a>
  <div id="form">
    <form enctype="multipart/form-data" id="form_usuario" name="editar_usuario" action="usuario_process.php" method="post">  
      <label for="input_nome">Nome: </label><input type="text" name="input_nome" value=<?= '"'.$aux["nome"].'"'?> class="validate[required] input_text" id="input_nome"><br/>
      <label for="input_foto">Foto: </label><input type="file" name="input_foto" id="input_foto" class="input_text"><br/>
      <input name="action" type="hidden" value="update">
      <input class="func_button" id="clean_button" type="button" value="Limpar">
      <input class="func_button" id="save_button" type="submit" value="Salvar">
    </form>
  </div>
</section>
<?php include "footer.php"; ?>
