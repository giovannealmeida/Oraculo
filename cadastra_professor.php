<?php 
require_once "header.php";
require_once "inc/mysql.php";

if (isset($_GET["action"]) && isset($_GET["id"])) {
    $id = $_GET["id"];
    if ($_GET["action"] == "editar") {
      $action = "editar";
      $sql = "SELECT * FROM professores WHERE id={$id}";
      if(!$result = $conexaobd->query($sql)){
        die('Houve um erro na query [' . $conexaobd->error . ']');
      }
      $aux = $result->fetch_assoc();
    }
  }
  else {
    $action = "add";
  }
?>

<script type="text/javascript">
  jQuery(document).ready(function(){
    $("#input_telefone").mask("99-99999999");
    jQuery("#form_professor").validationEngine();

  });
</script>
<section id="conteudo_container">
  <a href="#" id="aba_nome">Novo Professor</a>

  <?php

  if (isset($_GET["sucess"])) {
    if ($_GET["sucess"] == 1) {
      echo "<aside class=\"info_status\" id=\"sucesso\">";
      if ($_GET["action"]=="editar") {
        echo "<h2>Alteração Realizada</h2>";
      }
      if ($_GET["action"]=="add") {
        echo "<h2>Cadastro Realizado</h2>";
      }
    }
    else{
      echo "<aside class=\"info_status\" id=\"falha\">";
      echo "<h2>Falha no Cadastro</h2>";
    }
  ?>
  
  </aside>
  <?php
  }
  ?>

  <div id="form">
   <form id="form_professor" name="cadastro_professor" action="process_professor.php" method="post">
    <label for="input_nome">Nome: </label><input type="text" name="Nome" value=<?php echo $action=="editar" ? '"'.$aux["nome"].'"' : '""'?> class="validate[required] input_text" id="input_nome"><br/>
    <label for="input_email">Email: </label><input type="text" name="Email" value=<?php echo $action=="editar" ? '"'.$aux["email"].'"' : '""'?> class="validate[custom[email]] input_text" id="input_email"><br/>
    <label for="input_telefone">Telefone: </label><input type="text" name="Telefone" value=<?php echo $action=="editar" ? '"'.$aux["telefone"].'"' : '""'?> class="input_text" id="input_telefone"><br/>
    <label for="input_lattes">Lattes: </label><input type="text" name="Lattes" value=<?php echo $action=="editar" ? '"'.$aux["lattes"].'"' : '""'?> class="validate[custom[url]] input_text" id="input_lattes"><br/>
    <label for="input_comentarios">Outras Informações: </label><br/><br/><textarea name="Comentarios" rows="5" cols="40" id="input_comentarios" ><?php echo $action=="editar" ? $aux["info"] : ""?></textarea><br/>
    <input name= "action" type="hidden" value="<?=$action?>">
    <?php
    if(isset($_GET["id"])){
      echo "<input name= \"id\" type=\"hidden\" value=\"{$id}\" ><br/>";
    }
    ?>
    <input class="func_button" id="clean_button" type="button" value="Limpar">
    <input class="func_button" id="save_button" type="submit" value="Salvar">
  </form> 
</div>

</section>
<?php include "footer.php"; ?>
