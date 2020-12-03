<?php
  include 'conexion.php';
  $codigo = $_POST['codigo'];
  $fecha = $_POST['fecha'];
  echo $codigo;
  echo $fecha;
  $query = "CALL R_Persona('$codigo')";
  $resultado = mysqli_query($conexion, $query) or die ("Fallo");
  mysqli_close($conexion);
  if($resultado -> num_rows <= 0){
    header("Location: ../pages/reservaGrande.php?var=$codigo&var1=$fecha");
  }else{
    header("Location: ../pages/reservaSencilla.php?var=$codigo&var1=$fecha");
  }
 ?>
