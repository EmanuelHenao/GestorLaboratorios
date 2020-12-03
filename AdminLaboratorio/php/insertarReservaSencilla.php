<?php
  include 'conexion.php';
  $codigo = $_POST['codigo'];
  $horaIn = $_POST['horaIn'];
  $horaFin = $_POST['horaFin'];
  $fecha = $_POST['fecha'];
  $materia = $_POST['materia'];
  $mat = mysqli_query($conexion, "SELECT cod_materia FROM Materia WHERE nombre_materia = '$materia'") or die ("Fallo ");
  mysqli_close($conexion);
  $mate = mysqli_fetch_assoc($mat);
  include 'conexion.php';
  $c = intval($mate['cod_materia']);
  $insertar = "CALL C_Reserva('$fecha.$horaIn', '$fecha.$horaFin', '$codigo', $c)";
  mysqli_query($conexion, $insertar) or die("No se pudo hacer la insercion " . mysqli_error($conexion));
  mysqli_close($conexion);
  header('Location: ../pages/agregarObjetoReservaAsistencia.php');
 ?>
