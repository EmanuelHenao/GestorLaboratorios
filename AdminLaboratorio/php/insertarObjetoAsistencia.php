<?php
  include 'conexion.php';
  $idObjeto = $_GET['var'];
  $idReserva = $_GET['var2'];
  $query = "CALL C_ObjetosAsistencia(".$idReserva.", ".$idObjeto.")";
  mysqli_query($conexion, $query);
  mysqli_close($conexion);
  header('Location: ../pages/agregarObjetoAsistenciaReserva.php');
 ?>
