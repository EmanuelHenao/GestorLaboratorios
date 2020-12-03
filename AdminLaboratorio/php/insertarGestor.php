<?php
  include 'conexion.php';
  $codigo = $_POST['codigo'];
  $nombre = $_POST['nombre'];
  $contrasena = $_POST['contrasena'];
  $telefono = $_POST['telefono'];
  $cargo = $_POST['cargo'];
  $email = $_POST['email'];
  $contra = md5($contrasena);
  $query = "SELECT cod_cargo FROM cargo WHERE nombre_cargo = '".$cargo."'";
  echo $query;
  $resultado = mysqli_query($conexion, $query) or die ("Fallo" . mysqli_error($conexion));
  $cargo = mysqli_fetch_assoc($resultado);
  mysqli_close($conexion);
  include 'conexion.php';
  $query = "CALL C_Gestores('".$codigo."', '".$nombre."', '".$email."', '".$telefono."', ".$cargo['cod_cargo'].", '".$contra."')";
  echo $query;
  mysqli_query($conexion, $query) or die ("Fallo" . mysqli_error($conexion));
  mysqli_close($conexion);
  header("location: ../pages/administrador.php");
 ?>
