<?php

function convertDate($data){
  list($ano, $mes, $dia) = explode("-", $data);

  return $dia.'/'.$mes.'/'.$ano;
}

require_once "header.php";
require_once "inc/mysql.php";

if (isset($_GET["action"]) && isset($_GET["id"])) {
  $id = $_GET["id"];
  if ($_GET["action"] == "editar") {
    $action = "editar";
    $sql = "SELECT * FROM atividades WHERE id={$id}";
    if(!$result = $conexaobd->query($sql)){
      die('Houve um erro na query [' . $conexaobd->error . ']');
    }
    $aux = $result->fetch_assoc();
  }
}
else {
  $action = "add";
}

$sql2 = "SELECT * FROM materias WHERE usuario_id={$_SESSION['id']}";
if(!$result2 = $conexaobd->query($sql2)){
  die('Houve um erro na query [' . $conexaobd->error . ']');
}
?>

<script type="text/javascript">
  jQuery(document).ready(function(){
    $("#input_data").mask("99/99/9999");
    jQuery("#form_atividade").validationEngine();
  });
</script>
<section id="conteudo_container">
  <a href="#" id="aba_nome">Nova Atividade</a>
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
 <form id="form_atividade" name="cadastro_atividade" action="process_atividade.php" method="post">
  <label for="input_nome">Nome: </label><input type="text" name="Nome" value=<?php echo $action=="editar" ? '"'.$aux["nome"].'"' : '""'?> class="validate[required] input_text" id="input_nome"><br/>
  <label for="input_tipo">Tipo: </label><input type="text" name="Tipo" value=<?php echo $action=="editar" ? '"'.$aux["tipo"].'"' : '""'?> class="validate[required] input_text" id="input_tipo"><br/>
  <label for="input_data">Data de Entrega: </label><input type="text" name="Data" value=<?php echo $action=="editar" ? '"'.convertDate($aux["data_entrega"]).'"' : '""'?> class="validate[required,custom[date]] input_text" id="input_data"><br/>
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

