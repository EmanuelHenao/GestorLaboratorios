<?php
  include '../php/vectorHoras.php';
  $num = $_GET['var'];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../img/icon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="../css/main.css" rel="stylesheet" media="all">
    <title>ASISTENCIA</title>
    <style media="screen">
      input[type=number]::-webkit-inner-spin-button,
      input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
    </style>
    <script type="text/javascript" src="../js/validar.js"></script>
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
    <div class="page-wrapper p-t-100 p-b-100 font-robo">
      <div class="wrapper wrapper--w680">
        <div class="card card-1">
          <div class="card-body">
            <h2 class="title">Información del asistente</h2>
            <form action="../php/insertarSencilla.php" method="post" onsubmit="return validarAsistenciaSencilla();">
              <div class="input-group">
                <input class="input--style-1" type="number" placeholder="Código" name="codigo" id="codigo" value="<?php echo $num ?>">
              </div>
              <div class="row row-space">
                <div class="form-group col-md-6">
                  <select name="horas" class="form-control" id="horas" required>
                    <option disabled="disabled" selected="selected">---Tiempo de uso---</option>
                    <?php
                      $n = count($vectorHorasUso);
                      for ($i=0; $i < $n; $i++) {
                        echo "<option>".$vectorHorasUso[$i]."</option>";
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <select name="materia" id="materia" required class="form-control">
                    <option disabled="disabled" selected="selected">---Materia---</option>
                    <?php
                      include '../php/conexion.php';
                      $query = "CALL RT_Materia";
                      $resultado =  mysqli_query($conexion, $query) or die ("Fallo");
                      mysqli_close($conexion);
                      while ($row = $resultado->fetch_row()) {
                        echo "<option>".$row[1]."</option>";
                      }
                     ?>
                  </select>
                </div>
              </div>
              <div class="p-t-20">
                <button class="btn btn--radius btn--green" type="submit">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/datepicker/moment.min.js"></script>
    <script src="../vendor/datepicker/daterangepicker.js"></script>
    <script src="../js/global.js"></script>
  </body>
</html>
