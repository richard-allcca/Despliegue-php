
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
      <label for="nombre">Nombre:</label>
      
      <div class="input-group">
  
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" class="form-control" id="nombre" name="regName">
  
      </div>
    </div>
  
    <div class="form-group ">
      <label for="email">Correo Electronico:</label>
  
      <div class="input-group">
  
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-envelope"></i></span>
        </div>
        <input type="email" class="form-control" id="email" name="regEmail">
  
      </div>
  
    </div>
  
    <div class="form-group ">
      <label for="pwd">Contraseña:</label>
      
      <div class="input-group">
  
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-key"></i></span>
        </div>
        <input type="password" class="form-control" id="pwd" name="regPassword">
  
      </div>
  
    </div>
  
    <div class="form-group btn-enviar ">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>

    <?php

    /* =============================
    NO ESTATICO forma en que se instancia  
    el metodo en el controlador debe ser public
    y debes usar un "echo" para retornar el valor
    ============================= */

    // $registro = new ControladorFormulario;
    // $registro -> control_registro();
    
    /* =============================
    ESTATICO forma en que se instancia  
    el metodo en el controlador debe cambiar de public a static
    y debes usar un "return" para retornar el valor
    ============================= */

    // esta esperando la respuesta del controladorformulario en controladores
    $registro = ControladorFormulario::control_registro();
     
    if ($registro == "ok") {

      // este script elimina los datos de local storage
      echo '<script>
      if (window.history.replaceState) {
        window.history.replaceState(null,null,window.location.href);
      }
      
      
      setTimeout(() => {
        location.reload();
      }, 1500);
      </script>';
      
      echo '<div class="alert alert-success">El Usuario ha sido Registrado</div>';
    }

    ?> 
  
  </form>
</div>
