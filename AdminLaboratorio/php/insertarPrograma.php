<?php
  include 'conexion.php';
  $programa = $_POST['programa'];
  $programa = strtolower($programa);
  $programa[0] = strtoupper($programa[0]);
  $query = "CALL C_Programa('".$programa."')";
  mysqli_query($conexion, $query) or die ("Fallo");
  mysqli_close($conexion);
  header("location: ../pages/administrador.php?var=agregar");
?>
