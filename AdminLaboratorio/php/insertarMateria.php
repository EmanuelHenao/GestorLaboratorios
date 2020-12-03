<?php
  include 'conexion.php';
  $materia = $_POST['materia'];
  $materia = strtolower($materia);
  $materia[0] = strtoupper($materia[0]);
  $query = "CALL C_Materia('".$materia."')";
  mysqli_query($conexion, $query) or die ("Fallo");
  mysqli_close($conexion);
  header("location: ../pages/administrador.php?var=agregar");
?>
