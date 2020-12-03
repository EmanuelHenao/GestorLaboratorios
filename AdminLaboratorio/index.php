<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="./img/icon.png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <title>INICIO</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
      <img src="./img/icono.png" alt="beta" width="45px">
      <b>Beta</b>
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <img src="./img/home.png" alt="Home" width="40px">
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pages/administrador.php">
            <img src="./img/admin.png" alt="Estadísticas" width="40px">
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pages/incidentes.php">
            <img src="./img/comentarios.png" alt="Comentarios" width="40px">
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <center>
    <div class="card-body w-50">
      <div class="card-deck">
        <div class="card">
          <img src="./img/profesor.png" alt="Profesor" width="250px">
          <div class="card-body">
            <h5 class="card-title">Reservar</h5>
          </div>
          <div class="card-footer">
            <center>
              <a href="./pages/reserva.php">
                <button type="button" class="btn btn-primary">Reservar</button>
              </a>
            </center>
          </div>
        </div>
        <div class="card">
          <img src="./img/estudinates.png" alt="Estudiante" width="250px">
          <div class="card-body">
            <h5 class="card-title">Asistencia</h5>
          </div>
          <div class="card-footer">
            <center>
              <a href="./pages/buscar.php">
                <button type="button" class="btn btn-primary">Registrar</button>
              </a>
            </center>
          </div>
        </div>
      </div>
    </div>
  </center>
</body>

</html>