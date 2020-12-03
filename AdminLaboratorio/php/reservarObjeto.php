<?php
  include 'conexion.php';
  $query = "SELECT MAX(indice) FROM reserva";
  $resultado = mysqli_query($conexion, $query);
  $numReserva = mysqli_fetch_assoc($resultado);
  $mysqli = new mysqli("127.0.0.1:8001", "root", "", "Beta");
  $salida = "";

  $query = "SELECT nombre, cod_Agrupa FROM agrupa";
  if(isset($_POST['consulta'])){
    $q = $mysqli->real_escape_string($_POST['consulta']);
    $query = "SELECT nombre, cod_Agrupa FROM agrupa WHERE nombre LIKE '%".$q."%'";
  }
  $resultado = $mysqli->query($query);
  if($resultado->num_rows > 0){
    $salida.="<div style='margin:150px 150px 0 150px;'><table class='table' id='table'>
            <thead class='thead-dark'>
              <tr>
                <th scope='col'>Index</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Agregar</th>
              </tr>
            </thead>
            <tbody>";
            $i = 1;
            while($row = $resultado->fetch_row()){
                $salida.= "
                <tr class='selected'>
                        <th scope='row'>".$i++."</th>
                        <td>".$row[0]."</td>
                        <td>
                          <a href='../php/insertarObjetoReserva.php?var=".$row[1]."&var2=".intval($numReserva['MAX(indice)'])."' onClick='bienHecho();'>
                            <i class='fas fa-plus-circle fa-2x' style='color: green;'></i>
                          </a>
                        </td>
                      </tr>";
            }
            $salida.= "  </tbody>
                  </table></div> ";
  }else{
    $salida.="<center>
                <div class='card-body'>
                  <h5 class='card-title'>No se encuentran datos</h5>
                  <p class='card-text'>¡F!</p>
                </div>
              </center>";
  }
  echo $salida;
  $mysqli->close();
?>
