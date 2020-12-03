<?php
  include 'conexion.php';
  $codigo = $_POST['codigo'];
  $horaInicio = $_POST['horaInicio'];
  $horaFin = $_POST['horaFin'];
  $actividad = $_POST['actividad'];
  $observaciones = $_POST['observaciones'];
  if(!is_null($actividad)){
    $actividad = "'".$actividad."'";
  }
  if(!is_null($observaciones)){
    $observaciones = "'".$observaciones."'";
  }
  echo $horaInicio;
  echo "<br>";
  echo $horaFin;
  $query = "CALL C_RegistroTGestores('".$codigo."', '".$horaInicio."', '".$horaFin."', ".$actividad.", ".$observaciones.")";
  mysqli_query($conexion, $query);
  mysqli_close($conexion);
  header("location: ./../pages/administrador.php?var=horas");
?>
