<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../img/icon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/locale/nl.js"></script>
    <script type="text/javascript" src="../js/fullcalendar.min.js"></script>
    <script type="text/javascript" src="../js/es.js"></script>
    <script type="text/javascript" src="../js/validar.js"></script>
    <script type="text/javascript" src="../js/mainBusquedaObjeto.js"></script>
    <script type="text/javascript" src="../js/mainBusquedaHoras.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="../css/main.css" rel="stylesheet" media="all">
    <title></title>
    <style media="screen">
      input[type=number]::-webkit-inner-spin-button,
      input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
      .row{
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../index.php">
        <img src="../img/icono.png" alt="beta" width="45px">
        <b>Beta</b>
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php">
              <img src="../img/home.png" alt="Home" width="40px">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./administrador.php">
              <img src="../img/admin.png" alt="Estadísticas" width="40px">
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="incidentes.php">
              <img src="../img/comentarios.png" alt="Comentarios" width="40px">
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </body>
</html>
  <?php
    header("Content-Type: text/html; charset=utf-8");
    include_once '../php/login/includes/user.php';
    include_once '../php/login/includes/userSesion.php';
    $codigoGuardado;
    $userSession = new UserSesion();
    $user = new User();
    function estadisticas(){
      echo "<a href='../php/login/vistas/volver.php' class='float-right'>
              <button type='button' class='close' aria-label='Close' style='padding: 30px;'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </a>";
      include './../php/conexion.php';
      $query = "SELECT * FROM cantidadPersonasXCargo";
      $resultado = mysqli_query($conexion, $query);
      mysqli_data_seek($resultado, 0);
      echo "<center><div class='row'>";
      echo "<div class='card-body'>";
        while ($row = $resultado->fetch_row()) {
          echo "<div class='card text-white bg-primary mb-3' style='max-width: 30rem;'>
                  <div class='card-header'> # de ".$row[0]."(s)</div>
                    <div class='card-body'>
                    <center>
                      <h5 class='card-title'>".$row[1]."</h5>
                    </center>
                  </div>
                </div>";
        }
      echo "</div>";
      mysqli_close($conexion);
      include './../php/conexion.php';
      $query = "SELECT * FROM promediotiempousoar";
      $resultado = mysqli_query($conexion, $query);
      mysqli_data_seek($resultado, 0);
      echo "<div class='card-body'>";
        while ($row = $resultado->fetch_row()) {
          echo "<div class='card text-white bg-primary mb-3' style='max-width: 30rem;'>
                  <div class='card-header'>Promedio en horas de reserva</div>
                    <div class='card-body'>
                    <center>
                      <h5 class='card-title'>".$row[0]."</h5>
                    </center>
                  </div>
                </div>";
          echo "<div class='card text-white bg-primary mb-3' style='max-width: 30rem;'>
                  <div class='card-header'>Promedio en horas de asistencia</div>
                    <div class='card-body'>
                    <center>
                      <h5 class='card-title'>".$row[1]."</h5>
                    </center>
                  </div>
                </div>";

        }
      echo "</div>";
      echo "</div>
      </center>";
      echo "<div class='contenedor'>";

      mysqli_close($conexion);
      include './../php/conexion.php';
      $query = "CALL cantUsoXPrograma('0', '0')";
      $resultado = mysqli_query($conexion, $query) or die("fallo " . mysqli_error($conexion));
      $i = 0;
      mysqli_data_seek($resultado, 0);
      echo "<script type='text/javascript'>
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Programa', 'Uso'],";
                  while($row = $resultado->fetch_row()){
                    echo "['".$row[0]."', ".$row[1]."],";
                  }
      echo "]);
            var options = {
              title: 'Uso por programa'
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechartPrograma'));
            chart.draw(data, options);
          }
          </script>
          <div id='piechartPrograma' style='height:400px; width: 85%; margin: 0 auto; border: 1px solid'></div>";

      mysqli_close($conexion);
      include './../php/conexion.php';
      $query = "CALL cantusoxmateria('0', '0')";
      $resultado = mysqli_query($conexion, $query);
      unset($labels, $data);
      $labels[] = array();
      $data[] = array();
      $i = 0;
      mysqli_data_seek($resultado, 0);
      echo "<script type='text/javascript'>
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Materia', 'Uso'],";
                  while($row = $resultado->fetch_row()){
                    echo "['".$row[0]."', ".$row[1]."],";
                  }
                  echo "]);
                var options = {
                  title: 'Uso por materia'
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechartMateria'));
                chart.draw(data, options);
              }
            </script>
            <div id='piechartMateria' style='height:400px; width: 85%; margin: 0 auto;'></div>";
      mysqli_close($conexion);
      include './../php/conexion.php';
      $query = "CALL cantusoobjetos('0', '0')";
      $resultado = mysqli_query($conexion, $query) or die ("Fallo" . mysqli_error($conexion));
      $i = 0;
      mysqli_data_seek($resultado, 0);
      echo "<script type='text/javascript'>
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Materia', 'Uso'],";
                  while($row = $resultado->fetch_row()){
                    echo "['".$row[0]."', ".$row[1]."],";
                  }
                  echo "]);
                var options = {
                  title: 'Uso por objeto'
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechartObjeto'));
                chart.draw(data, options);
              }
            </script>
            <div id='piechartObjeto' style='height:400px; width: 85%; margin: 0 auto; border: 1px solid'></div>";
      mysqli_close($conexion);
      include './../php/conexion.php';
      $query = "CALL cantusoxcargo('0', '0')";
      $resultado = mysqli_query($conexion, $query);
      unset($labels, $data);
      $labels[] = array();
      $data[] = array();
      $i = 0;
      mysqli_data_seek($resultado, 0);
      echo "<script type='text/javascript'>
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Cargo', 'Uso'],";
                  while($row = $resultado->fetch_row()){
                    echo "['".$row[0]."', ".$row[1]."],";
                  }
                echo "]);
                var options = {
                  title: 'Uso por cargo'
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
              }
              </script>
              <div id='piechart' style='height:400px; width: 85%; margin: 0 auto;'></div>";
      mysqli_close($conexion);
      include './../php/conexion.php';
      $query = "CALL cantusoxprofesor('0', '0')";
      $resultado = mysqli_query($conexion, $query);
      unset($labels, $data);
      $labels[] = array();
      $data[] = array();
      $i = 0;
      mysqli_data_seek($resultado, 0);
      echo "<script type='text/javascript'>
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Materia', 'Uso'],";
                  while($row = $resultado->fetch_row()){
                    echo "['".$row[0]."', ".$row[1]."],";
                  }
                  echo "]);
              var options = {
                title: 'Uso por Profesor'
              };
              var chart = new google.visualization.BarChart(document.getElementById('piechartProfesor'));
              chart.draw(data, options);
            }
            </script>
            <div id='piechartProfesor' style='height:400px; width: 85%; margin: 0 auto; border: 1px solid'></div>";
      mysqli_close($conexion);
      include './../php/conexion.php';
      $query = "CALL cantusoasistenciaxmes('0')";
      $resultado = mysqli_query($conexion, $query)  or die( "Fallo" . mysqli_error($conexion));
      mysqli_data_seek($resultado, 0);
      mysqli_close($conexion);
      include './../php/conexion.php';
      $query = "CALL cantusoreservaxmes('0')";
      $resultado2 = mysqli_query($conexion, $query)  or die("Fallo" . mysqli_error($conexion));
      mysqli_data_seek($resultado2, 0);
      mysqli_close($conexion);
      $datosMeses[] = array();
      while($row = $resultado->fetch_row()){
        $datosMeses[] = array($row[0], $row[1], $row[2], 0);
      }
      while($row = $resultado2->fetch_row()){
        $algo = false;
        for($i = 1; $i < sizeof($datosMeses); $i++){
          if($datosMeses[$i][0] == $row[0] && $datosMeses[$i][1] == $row[1]){
            $datosMeses[$i][3] = $row[2];
            $algo = true;
          }
        }
        if(!$algo){
          $datosMeses[] = array($row[0], $row[1], 0, $row[2]);
        }
      }
      echo "<script>
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawVisualization);
              function drawVisualization() {
                var data = google.visualization.arrayToDataTable([
                  ['Mes', 'Asistencia', 'Reserva'],";
                  for ($i=1; $i < sizeof($datosMeses); $i++) {
                    echo "['".$datosMeses[$i][0]."/".$datosMeses[$i][1]."', ".$datosMeses[$i][2].", ".$datosMeses[$i][3]."],";
                  }
                echo"]);
                var options = {
                  title : 'Uso asistencia/reserva por mes',
                  vAxis: {title: 'Usadas'},
                  hAxis: {title: 'Meses'},
                  seriesType: 'bars',
                  series: {2: {type: 'line'}}
                };
                var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                chart.draw(data, options);
              }
            </script>
            <div id='chart_div' style='height:400px; width: 85%; margin: 0 auto; '></div>";
      include './../php/conexion.php';
      $query = "CALL cantUsoXYearMesSemana('0')";
      $resultado = mysqli_query($conexion, $query);
      mysqli_data_seek($resultado, 0);
      mysqli_close($conexion);
      echo "<script type='text/javascript'>
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Fecha', 'Usos'],
                  ";
                  while($row = $resultado->fetch_row()){
                    echo "['".$row[3]." ".$row[2]." de ".$row[1]."/".$row[0]."', ".$row[4]."],";
                  }
                echo "]);
                var options = {
                  title: 'Uso asistencia/reserva por semana',
                  curveType: 'function',
                  legend: { position: 'bottom' }
                };
                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(data, options);
              }
          </script>
          <div id='curve_chart' style='height:400px; width: 85%; margin: 0 auto; border: 1px solid'></div>";
          include './../php/conexion.php';
          $query = "CALL cantUsoXYearMes('0')";
          $resultado = mysqli_query($conexion, $query);
          mysqli_data_seek($resultado, 0);
          mysqli_close($conexion);
          echo "<script type='text/javascript'>
                  google.charts.load('current', {'packages':['corechart']});
                  google.charts.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Fecha', 'Usos'],
                      ";
                      while($row = $resultado->fetch_row()){
                        echo "['".$row[1]." ".$row[0]."', ".$row[3]."],";
                      }
                    echo "]);
                    var options = {
                      title: 'Uso asistencia/reserva por mes',
                      curveType: 'function',
                      legend: { position: 'bottom' }
                    };
                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart_mes'));
                    chart.draw(data, options);
                  }
              </script>
              <div id='curve_chart_mes' style='height:400px; width: 85%; margin: 0 auto; '></div>";
              echo "</div>";
    }
    function inventario(){
      echo "<a href='../php/login/vistas/volver.php' class='float-right'>
              <button type='button' class='close' aria-label='Close' style='padding: 30px;'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </a>";
      if(isset($_GET['var2'])){
        if($_GET['var2'] == "insertar"){
          echo "<a class='btn btn-primary' href='../php/login/vistas/inventario.php' role='button' style='float: left; margin-top: 15px;'>Volver</a>";
          echo "<div class='page-wrapper p-t-100 p-b-100 font-robo'>
            <div class='wrapper wrapper--w680'>
              <div class='card card-1'>
                <div class='card-body'>
                  <h2 class='title'>Información del objeto</h2>
                  <form action='../php/insertarObjeto.php' method='post' onsubmit='return validarIngresoObjeto();'>
                    <div class='input-group'>
                      <input class='input--style-1' type='text' placeholder='Codigo' name='codigo' id='codigo' >
                    </div>
                    <div class='input-group'>
                      <input class='input--style-1' type='text' placeholder='Nombre' name='nombre' id='nombre' >
                    </div>
                    <div class='input-group'>
                      <input class='input--style-1' type='text' placeholder='Modelo' name='modelo' id='modelo' >
                    </div>
                    <div class='input-group'>
                      <input class='input--style-1' type='text' placeholder='Proveedor' name='proveedor' id='proveedor' >
                    </div>
                    <div class='input-group'>
                      <input class='input--style-1' type='text' placeholder='Observacion' name='observacion' id='observacion' >
                    </div>
                    <div class='p-t-20'>
                      <button class='btn btn--radius btn--green' type='submit'>Enviar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>";
        }
      }else{
        echo "<p>
                <a class='btn btn-primary' href='../php/login/vistas/insertarObjeto.php' role='button' style='float: left; margin-top: 15px;'>
                  Insertar objeto
                </a>
              </p>
              <div class='form-inline my-2 my-lg-0' style='float: right;'>
                <i class='fas fa-search fa-2x' style='margin-right: 15px; margin-top: 16px;'></i>
                <input class='form-control mr-sm-2' type='text' placeholder='Buscar' aria-label='Search' name='caja_busqueda' id='caja_busqueda' style='margin-top:15px;'>
              </div>";
        echo "<div id='datos'></div>";
      }
    }
    function gestores() {
      echo "<a href='../php/login/vistas/volver.php' class='float-right'>
              <button type='button' class='close' aria-label='Close' style='padding: 30px;'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </a>";
            echo "<div class='page-wrapper p-t-100 p-b-100 font-robo'>
              <div class='wrapper wrapper--w680'>
                <div class='card card-1'>
                  <div class='card-body'>
                    <h2 class='title'>Información del gestor</h2>
                    <form action='../php/insertarGestor.php' method='post' onsubmit='return validarGestor();'>
                      <div class='input-group'>
                        <input class='input--style-1' type='number' placeholder='Codigo' name='codigo' id='codigo' >
                      </div>
                      <div class='input-group'>
                        <input class='input--style-1' type='text' placeholder='Nombre' name='nombre' id='nombre' >
                      </div>
                      <div class='input-group'>
                        <input class='input--style-1' type='email' placeholder='Email' name='email' id='email' >
                      </div>
                      <div class='input-group'>
                        <input class='input--style-1' type='password' placeholder='Contraseña' name='contrasena' id='contrasena' >
                      </div>
                      <div class='input-group'>
                        <input class='input--style-1' type='password' placeholder='Verificar contraseña' name='vericontrasena' id='vericontrasena' >
                      </div>
                      <div class='input-group'>
                        <input class='input--style-1' type='number' placeholder='Telefono' name='telefono' id='telefono' >
                      </div>
                      <div class='input-group'>
                        <div class='form-group col-md-12'>
                          <select name='cargo' id='cargo' class='form-control' required>
                            <option disabled='disabled' selected='selected'>---Cargo---</option>";
                              include '../php/conexion.php';
                              $query = "CALL RT_Cargo";
                              $resultado =  mysqli_query($conexion, $query) or die ("Fallo");
                              mysqli_close($conexion);
                              while ($row = $resultado->fetch_row()) {
                                echo "<option>".$row[1]."</option>";
                              }
                    echo "</select>
                        </div>
                      </div>
                      <div class='p-t-20'>
                        <button class='btn btn--radius btn--green' type='submit'>Enviar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>";
            echo "<center>
                    <div class='col' style='width:50rem;'>
                      <div class='card-body'>
                          <div class='list-group'>
                            <li class='list-group-item active'>Gestores</li>";
            include './../php/conexion.php';
            $query = "CALL RT_Gestores";
            $resultado = mysqli_query($conexion, $query);
            mysqli_data_seek($resultado, 0);
            while ($row = $resultado->fetch_row()) {
                      echo "<li class='list-group-item'>".$row[1]."
                            </li>";
            }
                    echo "</div>
                        </div>
                  </div>
                  </center>";
            mysqli_close($conexion);
    }
    function horas($codigo){
      echo "<a href='../php/login/vistas/volver.php' class='float-right'>
              <button type='button' class='close' aria-label='Close' style='padding: 30px;'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </a>";
      if(isset($_GET['var2'])){
        if($_GET['var2'] == "agregar"){
          echo "<a class='btn btn-primary' href='../php/login/vistas/horas.php' role='button' style='float: left; margin-top: 15px;'>Volver</a>";
          echo "
          <div class='page-wrapper p-t-100 p-b-100 font-robo'>
            <div class='wrapper wrapper--w680'>
              <div class='card card-1'>
                <div class='card-body'>
                  <br><br>
                  <center><h2 class='title'>Información de las horas</h2></center>
                  <br><br><br>
                  <form action='../php/insertarRegistroTiempoGestores.php' method='post' onsubmit='return validarHorasMonitor();'>
                    <div class='input-group'>
                      <input class='input--style-1' type='text' placeholder='Codigo' name='codigo' id='codigo'  value='".$codigo."'>
                    </div>
                  	<div class='input-group datetimepicker'>
                  	  <input type='text' class='form-control' readonly placeholder='Hora inicio' id='horaInicio' name='horaInicio'>
                  	  <span class='input-group-addon'>
                        <i class='far fa-clock'></i>
                  	   </span>
                    </div>
                    <div class='input-group datetimepicker'>
                  	  <input type='text' class='form-control' readonly placeholder='Hora fin' id='horaFin' name='horaFin'>
                  	  <span class='input-group-addon'>
                        <i class='far fa-clock'></i>
                  	   </span>
                    </div>
                    <div class='input-group'>
                      <input class='input--style-1' type='text' placeholder='Actividad' name='actividad' id='actividad' >
                    </div>
                    <div class='input-group'>
                      <input class='input--style-1' type='text' placeholder='Observaciones' name='observaciones' id='observaciones' >
                    </div>
                    <div class='p-t-20'>
                      <button class='btn btn--radius btn--green' type='submit'>Enviar</button>
                    </div>
                  </form>
                  <br><br><br>
                </div>
              </div>
            </div>
          </div>
          <script type='text/javascript'>
            var defaults = {
              calendarWeeks: true,
              showClear: true,
              showClose: true,
              allowInputToggle: true,
              useCurrent: false,
              ignoreReadonly: true,
              toolbarPlacement: 'top',
              locale: 'nl'
            };
            $(function() {
              var optionsDatetime = $.extend({}, defaults, {
                format: 'YYYY-MM-DD HH:mm:ss'
              });

              $('.datetimepicker').datetimepicker(optionsDatetime);
            });
          </script>";
        }
      }else{
        echo "<p>
                <a class='btn btn-primary' href='../php/login/vistas/insertarHoras.php' role='button' style='float: left; margin-top: 15px;'>
                  Insertar horas
                </a>
              </p>
              <div class='form-inline my-2 my-lg-0' style='float: right;'>
                <i class='fas fa-search fa-2x' style='margin-right: 15px; margin-top: 16px;'></i>
                <input class='form-control mr-sm-2' type='text' placeholder='Buscar' aria-label='Search' name='caja_busqueda_horas' id='caja_busqueda_horas' style='margin-top:15px;'>
              </div>";
        echo "<div id='datos_horas'></div>";

      }

    }
    function agregar() {
      echo "<a href='../php/login/vistas/volver.php' class='float-right'>
              <button type='button' class='close' aria-label='Close' style='padding: 30px;'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </a>";
      echo "<br><br><br><br><br>
            <div class='row'>
              <div class='col'>
                <div class='card'>
                  <div class='card-body'>
                    <div class='list-group'>
                      <li class='list-group-item active bg-success'>Materia</li>
                      <center>
                        <form action='../php/insertarMateria.php' method='POST' onsubmit='return validarMateria();'>
                          <div class='form-group'>
                            <br>
                            <label for='materia'>Ingerse nombre de la materia</label>
                            <input type='text' class='form-control' id='materia' placeholder='Nombre materia' name='materia'>
                          </div>
                          <button type='submit' class='btn btn-primary'>Insertar</button>
                        </form>
                      </center>
                    </div>
                  </div>
                </div>
              </div>
              <div class='col'>
                <div class='card'>
                  <div class='card-body'>
                    <div class='list-group'>
                      <li class='list-group-item active bg-success'>Cargo</li>
                      <center>
                        <form action='../php/insertarCargo.php' method='POST' onsubmit='return validarCargo();'>
                          <div class='form-group'>
                            <br>
                            <label for='cargo'>Ingerse nombre de la cargo</label>
                            <input type='text' class='form-control' id='cargo' placeholder='Nombre cargo' name='cargo'>
                          </div>
                          <button type='submit' class='btn btn-primary'>Insertar</button>
                        </form>
                      </center>
                    </div>
                  </div>
                </div>
              </div>
              <div class='col'>
                <div class='card'>
                  <div class='card-body'>
                    <div class='list-group'>
                      <li class='list-group-item active bg-success'>Programa</li>
                      <center>
                        <form action='../php/insertarPrograma.php' method='POST' onsubmit='return validarPrograma();'>
                          <div class='form-group'>
                            <br>
                            <label for='programa'>Ingerse nombre de la programa</label>
                            <input type='text' class='form-control' id='programa' placeholder='Nombre programa' name='programa'>
                          </div>
                          <button type='submit' class='btn btn-primary'>Insertar</button>
                        </form>
                      </center>
                    </div>
                  </div>
                </div>
              </div>";
      echo "</div>";
      echo "<br><br><div class='row'>
              <div class='col'>
                <div class='card'>
                  <div class='card-body'>
                    <div class='list-group'>
                      <li class='list-group-item active'>Materia</li>";
      include './../php/conexion.php';
      $query = "CALL RT_Materia";
      $resultado = mysqli_query($conexion, $query);
      mysqli_data_seek($resultado, 0);
      while ($row = $resultado->fetch_row()) {
                echo "<li class='list-group-item'>".$row[1]."
                        <a href='../php/login/vistas/eliminarMateria.php?var=".$row[0]."' style='float: right;'>
                          <i class='fas fa-trash-alt fa-2x' style='color: red;'></i>
                          </a>
                      </li>";
      }
              echo "</div>
                  </div>
                </div>
              </div>";
      mysqli_close($conexion);
        echo "<div class='col'>
                <div class='card'>
                  <div class='card-body'>
                    <div class='list-group'>
                      <li class='list-group-item active'>Cargo</li>";
      include './../php/conexion.php';
      $query = "CALL RT_Cargo";
      $resultado = mysqli_query($conexion, $query);
      mysqli_data_seek($resultado, 0);
      while ($row = $resultado->fetch_row()) {
                echo "<li class='list-group-item'>".$row[1]."
                        <a href='../php/login/vistas/eliminarCargo.php?var=".$row[0]."' style='float: right;'>
                          <i class='fas fa-trash-alt fa-2x' style='color: red;'></i>
                        </a>
                      </li>";
      }
              echo "</div>
                  </div>
                </div>
              </div>";
      mysqli_close($conexion);
        echo "<div class='col'>
                <div class='card'>
                  <div class='card-body'>
                    <div class='list-group'>
                      <li class='list-group-item active'>Programa</li>";
      include './../php/conexion.php';
      $query = "CALL RT_Programa";
      $resultado = mysqli_query($conexion, $query);
      mysqli_data_seek($resultado, 0);
      while ($row = $resultado->fetch_row()) {
                echo "<li class='list-group-item'>".$row[1]."
                        <a href='../php/login/vistas/eliminarPrograma.php?var=".$row[0]."' style='float: right;'>
                          <i class='fas fa-trash-alt fa-2x' style='color: red;'></i>
                        </a>
                      </li>";
      }
              echo "</div>
                  </div>
                </div>
              </div>";
      mysqli_close($conexion);
      echo "</div>";

    }

    if(isset($_SESSION['user'])){
      $user->setUser($userSession->getCurrentUser());
      echo "<a href='../php/login/includes/logout.php' class='float-right'>
              <button type='button' class='btn btn-primary'>Cerrar sesión</button>
            </a>";
      echo "<br>
            <h1 style='padding-left: 30px;'>Bienvenido,</h1>
            <br>
            <h3 style='padding-left: 30px;'><i>".$user->getNombre()."</i></h3>";
      if(isset($_GET['var'])){
        switch ($_GET['var']) {
          case 'estadistica':
            estadisticas();
          break;
          case 'inventario':
            inventario();
          break;
          case 'horas':
            horas($user->getCodigo());
          break;
          case 'agregar':
            agregar();
          break;
          case 'gestores':
            gestores();
          break;
          default:
          break;
        }
      }else{
        include_once '../php/login/vistas/recursos.php';
      }
    }else if(isset($_POST['codigo']) && isset($_POST['pass'])){
      $userCodigo = $_POST['codigo'];
      $userPass = $_POST['pass'];
      if($user->userExists($userCodigo, $userPass)){
        $userSession->setCurrentUser($userCodigo);
        $user->setUser($userCodigo);
        echo "<a href='../php/login/includes/logout.php' class='float-right'><button type='button' class='btn btn-primary'>Cerrar sesión</button></a>";
        echo "<br><h1>Bienvenido,</h1> <br><h3> <i>".$user->getNombre()."</i></h3>";
        include_once '../php/login/vistas/recursos.php';
      }else{
        $errorLogin = "Código y/o contraseña incorrecta.";
        include_once '../php/login/vistas/login.php';
      }
    }else{
      include_once '../php/login/vistas/login.php';
    }
  ?>
