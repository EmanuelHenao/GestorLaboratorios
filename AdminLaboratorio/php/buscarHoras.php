<?php
  $mysqli = new mysqli("127.0.0.1:8001", "root", "", "Beta");
  $salida = "";
  $query = "SELECT * FROM registrotiempogestores";
  if(isset($_POST['consulta'])){
    $q = $mysqli->real_escape_string($_POST['consulta']);
    $query = "SELECT * FROM registrotiempogestores WHERE codigo LIKE '%".$q."%'";
  }
  $resultado = $mysqli->query($query);
  if($resultado->num_rows > 0){
    $salida.="<table class='table'>
            <thead class='thead-dark'>
              <tr>
                <th scope='col'>Index</th>
                <th scope='col'>Codigo</th>
                <th scope='col'>Fecha inicio</th>
                <th scope='col'>Fecha Fin</th>
                <th scope='col'>Cantidad de horas</th>
                <th scope='col'>Actividad</th>
                <th scope='col'>Observaciones</th>
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
                          <a href='../php/login/vistas/eliminarHora.php?var=".$row[0]."'>
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
