<?php
  include 'conexion.php';
  $cargo = $_POST['cargo'];
  $cargo = strtolower($cargo);
  $cargo[0] = strtoupper($cargo[0]);
  $query = "CALL C_Cargo('".$cargo."')";
  mysqli_query($conexion, $query) or die ("Fallo");
  mysqli_close($conexion);
  header("location: ../pages/administrador.php?var=agregar");
?>
