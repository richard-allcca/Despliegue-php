 <?php
  if (!isset($_SESSION["validarIngreso"])) {

    echo '<script>window.location = "index.php?pagina=ingreso";</script>';

    return;
  } else {

    if ($_SESSION["validarIngreso"] != "ok") {

      echo '<script>window.location = "index.php?pagina=ingreso";</script>';

      return;
    }
  }


  //? si es un metodo static hacemos la peticion al controlador Formularios,instanciando  la classe y su metodo
  $usuarios = ControladorFormulario::ctrSeleccionarRegistros(null, null);



  ?>
 <!-- tabla para contenido desde la base de datos -->
 <table class="table table-striped">
   <thead>
     <tr>
       <th>#</th>
       <th>Nombre</th>
       <th>Email</th>
       <th>Fecha</th>
       <th>Acciones</th>
     </tr>
   </thead>
   <tbody>

     <?php foreach ($usuarios as $key => $value) : ?>

       <tr>
         <td><?php echo ($key + 1); ?></td>
         <td><?php echo $value["nombre"]; ?></td>
         <td><?php echo $value["email"]; ?></td>
         <td><?php echo $value["fecha"]; ?></td>
         <td>
           <div class="btn-group">
             <!-- Botones de Editar y Eliminar -->

             <div class="px-1">
               <!-- div y clase para separado de botones -->

               <a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>" class="btn btn-warning">
                 <i class="fas fa-pencil-alt"></i></a>

             </div>

             <!-- formulario para enviar el id con este boton y poder eliminar -->
             <form method="post">

               <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarRegistro">
               <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

               <?php

                //* instanciando clase del controlador para ejecutar el metodo eliminar
                
                $eliminar = new ControladorFormulario();
                $eliminar->ctrEliminarRegistro();

                ?>

             </form>

           </div>
         </td>
       </tr>

     <?php endforeach ?>

   </tbody>
 </table>