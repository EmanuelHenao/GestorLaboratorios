<?php
  $user = "root";
  $password = "";
  $servidor = "127.0.0.1:8001";
  $dataBase = "Beta";
  $conexion = mysqli_connect($servidor, $user, $password, $dataBase) or die ("No se ha conectado al servidor");
  mysqli_query($conexion, "SET NAMES 'utf8'");
  mysqli_query($conexion, "SET GLOBAL lc_time_names = 'es_CL'");
 ?>
