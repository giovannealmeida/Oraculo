<?php 
require_once "header.php";
require_once "inc/mysql.php";

if (isset($_GET["action"]) && isset($_GET["id"])) {
  $id = $_GET["id"];
  if ($_GET["action"] == "editar") {
    $action = "editar";
    $sql = "SELECT * FROM materias WHERE id={$id}";
    if(!$result = $conexaobd->query($sql)){
      die('Houve um erro na query [' . $conexaobd->error . ']');
    }
  $aux = $result->fetch_assoc();
}
}
else {
  $action = "add";
}

$sql2 = "SELECT * FROM professores";
    if(!$result2 = $conexaobd->query($sql2)){
      die('Houve um erro na query [' . $conexaobd->error . ']');
    }
?>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery("#form_materia").validationEngine();

});
</script>
<section id="conteudo_container">
  <a href="#" id="aba_nome">Nova Matéria</a>

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
   <form id="form_materia" name="cadastro_materia" action="process_materia.php" method="post">
      <label for="input_nome">Nome: </label><input type="text" name="Nome" value=<?php echo $action=="editar" ? '"'.$aux["nome"].'"' : '""'?> class="validate[required] input_text" id="input_nome"><br/>
      <label for="input_creditos">Créditos: </label><input type="text" name="Creditos" value=<?php echo $action=="editar" ? '"'.$aux["creditos"].'"' : '""'?> class="validate[required,custom[number]] input_text" id="input_creditos"><br/>
      <label for="input_professor">Professor: </label>
      <select name="Professor" id="input_professor" class="validate[required] input_text">
         <option value ="" <?php echo $action=="editar" ? "" : "selected"?>>--- SELECIONE ---</option>
         <?php

         while($aux2 = $result2->fetch_assoc()) {
            if ( $aux["professor_id"] == $aux2["id"]) {
                $selected = "selected";
            }
            else
              $selected= "";
            echo "<option value=\"{$aux2["id"]}\" ".$selected.">{$aux2["nome"]}</option>";
        }
        ?>
    </select>
    <br/>
    <label for="input_comentarios">Outras Informações: </label><br/><br/><textarea name="Comentarios" rows="5" cols="40" id="input_comentarios" ><?php echo $action=="editar" ? $aux["info"] : ""?></textarea><br/>
    <input name= "action" type="hidden" value="<?=$action?>">
    <?php
    if(isset($_GET["id"])){
      echo "<input name= \"id\" type=\"hidden\" value=\"{$id}\" ><br/>";
    }
    ?>
    <input class="func_button" id="clean_button" type="reset" value="Limpar">
    <input class="func_button" id="save_button" type="submit" value="Salvar">
</form> 
</div>
</section>
<?php include "footer.php"; ?>
