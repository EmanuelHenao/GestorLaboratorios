<?php
  if(isset($_GET['var'])){
    include './../../conexion.php';
    $query = "CALL D_Objeto('".$_GET['var']."')";
    $resultado = mysqli_query($conexion, $query);
    mysqli_close($conexion);
  }
  header("location: ./../../../pages/administrador.php?var=inventario");
 ?>
