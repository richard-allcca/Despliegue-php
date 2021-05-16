<?php

class ControladorFormulario {
  /*  =============================
    registro
  ============================= */
  
  static function control_registro(){
    
    if (isset($_POST["regName"])) {
      
      $tabla = "registros";
      
      $datos = array("nombre"=>$_POST["regName"],"email"=>$_POST["regEmail"],"password"=>$_POST["regPassword"]);
      
      $respuesta = ModeloFormularios::mdlRegistro($tabla,$datos);
      
      return $respuesta;
    }
  }
  /*  =============================
    Seleccionar Registros para pintarlos en pestaña inicio
  ============================= */
  static public function ctrSeleccionarRegistros(){
    
    // 1° enviamos al modelo el parametro de la tabla de la db
    $tabla = "Registros";
    
    // 2° enviamos una respuesta
    $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla,null,null);
    
    // 3° lo que traiga el modelo lo muestre la vista
    return $respuesta;
  }
  /*  =============================
    Ingreso
  ============================= */
  public function ctrIngreso(){
    if (isset($_POST["ingresoEmail"])) {

      $tabla = "registros";
      $item = "email";
      $valor = $_POST["ingresoEmail"];

      $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla,$item,$valor);
        
      if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {
        
        // usamos este metodo para no estar en inicio si no estas logeado
        $_SESSION["validarIngreso"] = "ok";

        echo "Ingreso fue un Exito";
        echo '<script>
          if (window.history.replaceState) {
            window.history.replaceState(null,null,window.location.href);
          }
          
          setTimeout(() => {
          location.reload();
          window.location = "index.php?pagina=inicio";
        }, 3000);
          
        </script>';
      }else{

          echo '<script>
        if (window.history.replaceState) {
          window.history.replaceState(null,null,window.location.href);
        }
        
        setTimeout(() => {
          location.reload();
        }, 3000);
        
        </script>';
        
        echo '<div class="alert alert-danger">Error al ingresar al Sistema, El Email o la Contraseña no son correctos</div>';
        // echo '<pre>';print_r($respuesta);echo'</pre>';
      }
    }
  }
}