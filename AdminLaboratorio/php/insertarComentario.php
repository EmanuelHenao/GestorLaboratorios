<?php
  $tipo = $_POST['tipo'];
  $texto = $_POST['texto'];
  include 'conexion.php';
  $query = "CALL C_Incidentes('$texto', '$tipo')";
  mysqli_query($conexion, $query) or die("No se pudo hacer la insercion " . mysqli_error($conexion));
  mysqli_close($conexion);
  header('Location: ../index.php');
 ?>
