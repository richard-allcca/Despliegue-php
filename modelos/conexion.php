<?php

class Conexion
{

  static public function conectar()
  {
    $host = 'bmoauciibxgvelyfa5vo-mysql.services.clever-cloud.com';
    $nameDb = 'bmoauciibxgvelyfa5vo';
    $username = 'uqbw9yjdtwjqptv4';
    $password = '04V58mJjmgEQVR5EIUo6';
    $charset = 'utf8mb4';

    try {
      $conexion = "mysql:host=" . $host . ";dbname=" . $nameDb . ";charset=" . $charset;
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => FALSE,
      ];

      $PDO = new PDO($conexion, $username, $password, $options);

      return $PDO;
    } catch (PDOException $e) {
      print_r('Error conexion: ' . $e->getMessage()) . "<br>";
    }
  }

  static public function connect()
  {

    //* PDO_parametros-> "PDO(nombre del servidor;nombre de la base d datos", "usuario", "contraseña")

    $link = new PDO("mysql:host=localhost;dbname=curso-php", "root", "");

    // para admitir tipos de letras y simbolos latinos
    $link->exec("set names utf8");

    return $link;
  }
}
