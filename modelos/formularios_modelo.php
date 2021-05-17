<?php

require_once("conexion.php");

class ModeloFormularios
{

  static public function mdlRegistro($tabla, $datos)
  {

    // statement:declaración
    // prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener 0 o mas marcadores de parámetros con nombre(:nombre) o signos de interrogacion(?) por los cuales los valores reales serán sustituidos cuando la sentencia seea ejecutable, Ayuda a prevenir inyecciones SQL eliminando la nececidad de entrecomillar manualmente parámetros
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)");

    // bindParam(":marcador","$variable ","el tipo de dato") para enlazar una variable php a un parámetro 
    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

    if ($stmt->execute()) {

      return "ok";
    } else {
      print_r(Conexion::conectar()->errorInfo());
    }

    // con esto cerramos la conexion que exista en ese momento 
    // $stmt->close();//anterior forma de cerrar la conexion
    $link = null; //* nueva forma de cerrar la conexion

    // luego de cerrar conexión vaciamos el formulario
    $stmt = null;
  }

  /*  =============================
  *  Seleccionar Registros
  ============================= */
  static public function mdlSeleccionarRegistros($tabla, $item, $valor)
  {

    if ($item == null && $valor == null) {

      // hacemos una conexion y preparamos una sentencia SQL, de la operacion "seleccionar" de la db ($tabla contiene los datos de registros y esta declarado en controlador_formulario)
      $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM $tabla");
      // aqui damos formato a la fecha personalizado,ademas se puede ordenar los registros agregando luego de $tabla ORDER BY id DESC

      // ejecutamos el statement
      $stmt->execute();

      // retornamos fetchAll, significa devolver todos los registros
      return $stmt->fetchAll();
    } else {
      // este fragmento de código es igual al de arriba
      $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item");

      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

      $stmt->execute();

      return $stmt->fetch();
    }

    // por seguridad agregamos
    // y vaciamos el formulario
    // $stmt->close();
    $link = null;

    $stmt = null;
  }

  /*  =============================
  *  Actualizar Registros
  ============================= */
  static public function mdlActualizarRegistros($tabla, $datos)
  {

    $stmt = Conexion::conectar()->prepare("UPDATE  $tabla SET nombre=:nombre, email=:email, password=:password WHERE id=:id");

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

    if ($stmt->execute()) {

      return "ok";
    } else {
      print_r(Conexion::conectar()->errorInfo());
    }

    // con esto cerramos la conexion que exista en ese momento 
    // $stmt->close();//anterior forma de cerrar la conexion
    $link = null; //* nueva forma de cerrar la conexion

    // luego de cerrar conexión vaciamos el formulario
    $stmt = null;
  }
}
