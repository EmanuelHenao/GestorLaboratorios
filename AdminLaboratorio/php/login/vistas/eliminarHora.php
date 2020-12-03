<?php
  if(isset($_GET['var']) && isset($_GET['codigo'])){
    include './../../conexion.php';
    $query = "CALL D_RegistroTGestores(".$_GET['var'].")";
    $resultado = mysqli_query($conexion, $query) or die("fallo" .mysqli_error($conexion));
    mysqli_close($conexion);
  }
  header("location: ./../../../pages/administrador.php?var=horas");
 ?>
