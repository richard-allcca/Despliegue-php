<!-- aqui le decimos al sistema que tenga en cuenta las variables de sesión y poder usarlas -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <meta name="description" content="primera pagina enlazada con php" />
  <title>MVC con PHP</title>
  <!-- Plugings CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">

  <!-- Plugings js -->
  <script src="https://kit.fontawesome.com/573349e4c9.js" crossorigin="anonymous"></script>
</head>

<body style="background-color:hsl(0, 0%, 80%);">
  <!-- =============================
    LOGOTIPO
  ============================= -->
  <div class="container-fluid py-3">
    <h3 class="text-center">LOGO</h3>
  </div>


  <!-- =============================
    BOTONERA SEGUN EL VALOR DE $_GET
  ============================= -->

  <div class="container-fluid bg-light">
    <div class="container">
      <ul class="nav nav-justified py-2 nav-pills">

        <?php if (isset($_GET["pagina"])) : ?>
          <!-- si viene la variable pagina entonces -->

          <?php if ($_GET["pagina"] == "registro") : ?>
            <!-- validamos que contiene la variable pagina -->

            <li class="nav-item ">
              <a href="index.php?pagina=registro" class="nav-link active">Registro</a><!-- agregando clase active -->
            </li>

          <?php else : ?>

            <li class="nav-item ">
              <a href="index.php?pagina=registro" class="nav-link ">Registro</a><!-- quitando la clase active -->
            </li>

          <?php endif ?>

          <?php if ($_GET["pagina"] == "ingreso") : ?>

            <li class="nav-item ">
              <a href="index.php?pagina=ingreso" class="nav-link active">Ingreso</a>
            </li>

          <?php else : ?>

            <li class="nav-item ">
              <a href="index.php?pagina=ingreso" class="nav-link ">Ingreso</a>
            </li>

          <?php endif ?>

          <?php if ($_GET["pagina"] == "inicio") : ?>

            <li class="nav-item ">
              <a href="index.php?pagina=inicio" class="nav-link active">Inicio</a>
            </li>

          <?php else : ?>

            <li class="nav-item ">
              <a href="index.php?pagina=inicio" class="nav-link ">Inicio</a>
            </li>

          <?php endif ?>

          <?php if ($_GET["pagina"] == "salir") : ?>

            <li class="nav-item ">
              <a href="index.php?pagina=salir" class="nav-link active">Salir</a>
            </li>

          <?php else : ?>

            <li class="nav-item ">
              <a href="index.php?pagina=salir" class="nav-link ">Salir</a>
            </li>

          <?php endif ?>

        <?php else : ?>

          <!-- si no viene nada en la variable pagina entonces pinta este nav en pantalla -->

          <li class="nav-item ">
            <a href="index.php?pagina=registro" class="nav-link active">Registro</a>
          </li>

          <li class="nav-item ">
            <a href="index.php?pagina=ingreso" class="nav-link ">Ingreso</a>
          </li>

          <li class="nav-item ">
            <a href="index.php?pagina=inicio" class="nav-link ">Inicio</a>
          </li>

          <li class="nav-item ">
            <a href="index.php?pagina=salir" class="nav-link ">Salir</a>
          </li>

        <?php endif ?>


      </ul>
    </div>
  </div>

  <!-- =============================
      RENDERIZADO DE CONTENIDO SEGUN EL VALOR DE $_GET
  ============================= -->
  <div class="container-fluid">
    <div class="container py-5">

      <?php

      /* ISSET: isset() Determina si un varaible esta definida o es null */
      if (isset($_GET["pagina"])) {
        if (
          $_GET["pagina"] == "registro" ||
          $_GET["pagina"] == "ingreso"  ||
          $_GET["pagina"] == "inicio" ||
          $_GET["pagina"] == "editar" ||
          $_GET["pagina"] == "salir"
        ) {
          include "paginas/" . $_GET["pagina"] . ".php";
        } else {
          include "paginas/error404.php";
        }
      } else {

        include "paginas/registro.php";
      }

      ?>

    </div>
  </div>
</body>

</html>