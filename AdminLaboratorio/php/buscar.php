<?php
  $mysqli = new mysqli("127.0.0.1:8001", "root", "", "Beta");
  $salida = "";
  $query = "SELECT * FROM objeto";
  if(isset($_POST['consulta'])){
    $q = $mysqli->real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM objeto WHERE codigo LIKE '%".$q."%' OR nombre LIKE '%".$q."%'";
  }
  $resultado = $mysqli->query($query);
  if($resultado->num_rows > 0){
    $salida.="<table class='table'>
            <thead class='thead-dark'>
              <tr>
                <th scope='col'>Index</th>
                <th scope='col'>Codigo</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Modelo</th>
                <th scope='col'>Fecha ingreso</th>
                <th scope='col'>Proveedor</th>
                <th scope='col'>Observación</th>
                <th scope='col'>Tareas</th>
              </tr>
            </thead>
            <tbody>";
            $i = 1;
            while($row = $resultado->fetch_row()){
                $salida.= "<tr>
                        <th scope='row'>".$i++."</th>
                        <td>".$row[1]."</td>
                        <td>".$row[2]."</td>
                        <td>".$row[3]."</td>
                        <td>".$row[4]."</td>
                        <td>".$row[5]."</td>
                        <td>".$row[6]."</td>
                        <td>
                          <a href='#'>
                            <i class='fas fa-pen-square fa-2x' style='color: green; margin-right: 5px;'></i>
                          </a>
                          <a href='../php/login/vistas/eliminarObjeto.php?var=".$row[1]."'>
                            <i class='fas fa-trash-alt fa-2x' style='color: red;'></i>
                          </a>
                        </td>
                      </tr>";
            }
            $salida.= "  </tbody>
                  </table>";
  }else{
    $salida.="<center>
                <div class='card border-secondary mb-3' style='max-width: 18rem; margin-top: 150px;''>
                  <div class='card-header'><i class='far fa-frown fa-7x'></i></div>
                  <div class='card-body'>
                    <h5 class='card-title'>No se encuentran datos</h5>
                    <p class='card-text'>¡F!</p>
                  </div>
                </div>
              </center>";
  }
  echo $salida;
  $mysqli->close();
?>
