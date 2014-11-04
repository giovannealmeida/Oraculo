<?php 
function convertDate($data){
  list($ano, $mes, $dia) = explode("-", $data);

  return $dia.'/'.$mes.'/'.$ano;
}

require "header.php";
require "inc/mysql.php"; 

if (isset($_GET["action"]) && isset($_GET["id"])) {
  $id = $_GET["id"];
  if ($_GET["action"] == "editar") {
    $action = "editar";
    $sql = "SELECT * FROM provas WHERE id={$id}";
    if(!$result = $conexaobd->query($sql)){
      die('Houve um erro na query [' . $conexaobd->error . ']');
  }
  $aux = $result->fetch_assoc();
}
}
else {
  $action = "add";
}

$sql2 = "SELECT * FROM materias";

if(!$result2 = $conexaobd->query($sql2)){
  die('Houve um erro na query [' . $conexaobd->error . ']');
}
?>

<script type="text/javascript">
  jQuery(document).ready(function(){
    $("#input_data").mask("99/99/9999");
    jQuery("#form_prova").validationEngine();
});
</script>


<section id="conteudo_container">
  <a href="#" id="aba_nome">Nova Prova</a>

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
   <form id="form_prova" name="cadastro_prova" action="process_prova.php" method="post">
      <label for="input_nome">Nome: </label><input type="text" name="Nome" value=<?php echo $action=="editar" ? '"'.$aux["nome"].'"' : '""'?> class="validate[required] input_text" id="input_nome"><br/>
      <label for="input_data">Data: </label><input type="text" name="Data" value=<?php echo $action=="editar" ? '"'.convertDate($aux["data_prova"]).'"' : '""'?> class="validate[required,custom[date]] input_text" id="input_data"><br/>
      <label for="input_materia">Matéria: </label>
      <select name="Materia" id="input_materia" class="validate[required] input_text">
         <option value ="" <?php echo $action=="editar" ? "" : "selected"?>>--- SELECIONE ---</option>
         <?php

         while($aux2 = $result2->fetch_assoc()) {
            if ( $aux["materia_id"] == $aux2["id"]) {
              $selected = "selected";
          }
          else
              $selected= "";
          echo "<option value=\"{$aux2["id"]}\" ".$selected.">{$aux2["nome"]}</option>";
      }
      ?>
  </select><br/>
  <label for="input_assuntos">Assuntos: </label><br/><br/><textarea name="Assuntos" rows="5" cols="40" id="input_assuntos" ><?php echo $action=="editar" ? $aux["assuntos"] : ""?></textarea><br/>
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