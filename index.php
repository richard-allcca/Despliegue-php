<?php

/* el require_once establece que el código del archivo es requerido y se 
cargara solo una VEZ  */

require_once ("controladores/plantilla_controlador.php");

// haciendo este requerimiento desde index cualquier vista puede usar los metodos de este controlador
require_once ("controladores/controlador_formulario.php");

// haciendo este requerimiento desde index cualquier controlador puede usar los metodos de este modelo
require_once ("modelos/formularios_modelo.php");

// esta conexion en el index es peligrosa por eso creamos un modelo donde estara esta conexión
// $conexion = Conexion::conectar();
// echo '<pre>';print_r($conexion);echo'</pre>';

$plantilla = new ControladorPlantilla();

$plantilla-> traerPlantilla();

