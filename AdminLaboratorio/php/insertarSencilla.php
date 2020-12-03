<?php
  include 'conexion.php';
  $codigo = $_POST['codigo'];
  $horas = $_POST['horas'];
  $materia = $_POST['materia'];
  $mat = mysqli_query($conexion, "SELECT cod_materia FROM Materia WHERE nombre_materia = '$materia'") or die ("Fallo ");
  mysqli_close($conexion);
  $mate = mysqli_fetch_assoc($mat);
  include 'conexion.php';
  $c = intval($mate['cod_materia']);
  $insertar = "CALL C_Asistencia('$horas', '$codigo', $c)";
  mysqli_query($conexion, $insertar) or die("No se pudo hacer la insercion " . mysqli_error($conexion));
  mysqli_close($conexion);
  header('Location: ../pages/agregarObjetoAsistenciaReserva.php');
 ?>
