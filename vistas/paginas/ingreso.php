
<?php

if (isset($_GET["id"])) {
  
  $item = "id";
  $valor = $GET["id"];

  $usuario = ControladorFormulario::ctrSeleccionarRegistros($item,$valor);
  echo "<pre>"; print_r($usuario); echo "</pre>";
}
?>

<style>
  h2{
    margin-bottom: 1em;
  }
  .btn-enviar{
    padding-left: 2em;
  }
</style>
<div class="d-flex justify-content-center text-center">

  <form class="p-5 bg-light" method="post">
    <h2 >Ingreso</h2>
  
    <div class="form-group ">
      <label for="email">Correo Electronico:</label>
  
      <div class="input-group">
  
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-envelope"></i></span>
        </div>
        <input type="email" class="form-control" id="email" name="ingresoEmail">
  
      </div>
  
    </div>
  
    <div class="form-group ">
      <label for="pwd">Contraseña:</label>
      
      <div class="input-group">
  
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-key"></i></span>
        </div>
        <input type="password" class="form-control" id="pwd" name="ingresoPassword">
  
      </div>
  
    </div>
  
    <?php

    $ingreso = new ControladorFormulario();
    $ingreso -> ctrIngreso();

    ?> 

    <div class="form-group btn-enviar ">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Ingresar</button>
      </div>
    </div>

  
  </form>
</div>
