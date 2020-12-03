<?php
  include 'conexion.php';
  $codigo = $_POST['codigo'];
  $nombre = $_POST['nombre'];
  $modelo = $_POST['modelo'];
  $proveedor = $_POST['proveedor'];
  $observacion = $_POST['observacion'];
  if(!is_null($codigo)){
    $codigo = "'".$codigo."'";
  }
  if(!is_null($modelo)){
    $modelo = "'".$modelo."'";
  }
  if(!is_null($proveedor)){
    $proveedor = "'".$proveedor."'";
  }
  if(!is_null($observacion)){
    $observacion = "'".$observacion."'";
  }
  $query = "CALL C_Objeto(".$codigo.", '".$nombre."', ".$modelo.", ".$proveedor.", ".$observacion.")";
  mysqli_query($conexion, $query);
  mysqli_close($conexion);
  header("location: ./../pages/administrador.php?var=inventario");
?>
