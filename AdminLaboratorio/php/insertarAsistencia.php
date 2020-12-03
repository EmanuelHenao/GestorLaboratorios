<?php
  include 'conexion.php';
  $nombre = $_POST['name'];
  $codigo = $_POST['codigo'];
  $correo = $_POST['email'];
  $genero = $_POST['genero'];
  $programa = $_POST['programa'];
  $cargo = $_POST['cargo'];
  $horas = $_POST['horas'];
  $materia = $_POST['materia'];
  $query = "CALL R_Persona('$codigo')";
  $resultado = mysqli_query($conexion, $query) or die ("Fallo");
  mysqli_close($conexion);
  include 'conexion.php';
  $pro = mysqli_query($conexion, "SELECT cod_programa FROM Programa WHERE nombre_programa = '$programa'") or die ("Fallo");
  mysqli_close($conexion);
  include 'conexion.php';
  $car = mysqli_query($conexion, "SELECT cod_cargo FROM Cargo WHERE nombre_cargo = '$cargo'") or die ("Fallo");
  mysqli_close($conexion);
  include 'conexion.php';
  $mat = mysqli_query($conexion, "SELECT cod_materia FROM Materia WHERE nombre_materia = '$materia'") or die ("Fallo ");
  mysqli_close($conexion);
  $prom = mysqli_fetch_assoc($pro);
  $carg = mysqli_fetch_assoc($car);
  $mate = mysqli_fetch_assoc($mat);
  if($resultado -> num_rows <= 0){
    include 'conexion.php';
    $a = intval($prom['cod_programa']);
    $b = intval($carg['cod_cargo']);
    $insertar = "CALL C_Persona('$codigo', '$nombre', '$correo', '$genero[0]', $a, $b)";
    mysqli_query($conexion, $insertar) or die("No se pudo hacer la insercion " . mysqli_error($conexion));
    mysqli_close($conexion);
  }
  include 'conexion.php';
  $c = intval($mate['cod_materia']);
  $insertar = "CALL C_Asistencia('$horas', '$codigo', $c)";
  mysqli_query($conexion, $insertar) or die("No se pudo hacer la insercion " . mysqli_error($conexion));
  mysqli_close($conexion);
  header('Location: ../pages/agregarObjetoAsistenciaReserva.php');
 ?>
