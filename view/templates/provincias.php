<label for="provincia">Provincia</label>
<select class="form-select" id="provincia" name="provincia" required>
<option value="">Seleccioná...</option>
<?php 
  require_once("../dao/ProvinciaDAO.php");
  $dao = new ProvinciaDAO();
  $lista = $dao->listarProvincias();  

  foreach ($lista as $objeto) {
    $html = '<option value="' . $objeto->getIdProvincia() . '">' . $objeto->getNombre() . '</option>';
    echo $html;
  }
?>
</select>
<div class="invalid-feedback">Seleccioná una provincia válida.</div>