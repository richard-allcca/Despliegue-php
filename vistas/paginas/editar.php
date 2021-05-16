
<?php 

if (isset($_GET["id"])) {
  $item = "id";
  $valor = $_GET["id"];

  $usuario = ControladorFormulario::ctrSeleccionarRegistros($item,$valor);
  echo'<pre>'; print_r($usuario); echo'</pre>';
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
    <h2 >Registro</h2>
  
    <div class="form-group ">
      <!-- <label for="nombre">Nombre:</label> -->
      
      <div class="input-group">
  
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" class="form-control" id="nombre" value="<?php echo $usuario["nombre"]; ?>" placeholder="Escriba su Nombre" name="actualizarName" >
  
      </div>
    </div>
  
    <div class="form-group ">
      <!-- <label for="email">Correo Electronico:</label> -->
  
      <div class="input-group">
  
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-envelope"></i></span>
        </div>
        <input type="email" class="form-control" id="email" value="<?php echo $usuario["email"]; ?>" placeholder="Escriba su Email" name="actualizarEmail">
  
      </div>
  
    </div>
  
    <div class="form-group ">
      <!-- <label for="pwd">Contraseña:</label> -->
      
      <div class="input-group">
  
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-key"></i></span>
        </div>
        <input type="password" class="form-control" id="pwd" placeholder="Escriba su Password" name="actualizarPassword">

        <input type="hidden" name="passwordAcutal"value="<?php echo $usuario["password"]; ?>" >
  
      </div>
  
    </div>
  
    <div class="form-group btn-enviar ">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>

  
  </form>
</div>
