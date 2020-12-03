<?php
  include 'conexion.php';
  $codigo = $_POST['codigo'];
  $query = "CALL R_Persona('$codigo')";
  $resultado = mysqli_query($conexion, $query) or die ("Fallo");
  mysqli_close($conexion);
  if($resultado -> num_rows <= 0){
    header("Location: ../pages/asistencia.php?var=$codigo");
  }else{
    header("Location: ../pages/asistenciaSencilla.php?var=$codigo");
  }
 ?>
