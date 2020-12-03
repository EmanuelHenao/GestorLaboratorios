<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../img/icon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/moment.min.js"></script>
    <script type="text/javascript" src="../js/fullcalendar.min.js"></script>
    <script type="text/javascript" src="../js/es.js"></script>
    <script type="text/javascript" src="../js/validar.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="../css/main.css" rel="stylesheet" media="all">
    <title>Reservar</title>
    <style media="screen">
      input[type=number]::-webkit-inner-spin-button,
      input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
    </style>
    <link rel="stylesheet" href="../css/fullcalendar.min.css">
    <title>ASISTENCIA</title>
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
    <div class="container">
      <div class="card-body">
        <div class="col">
          <div id="Calendarioweb">

          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tituloEvento"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="descripcionEvento">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tituloEvento">Información de la reserva</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="page-wrapper p-t-100 p-b-100 font-robo">
              <div class="wrapper wrapper--w680">
                <div class="card card-1">
                  <div class="card-body">
                    <form action="../php/revisarReserva.php" method="POST" onsubmit="return validarCodigoAsistente();">
                      <div class="input-group">
                        <input class="input--style-1" type="number" placeholder="Código" name="codigo" id="codigo" >
                      </div>
                      <div class="input-group">
                        <input class="input--style-1" type="text" placeholder="Fecha" name="fecha" id="fecha" >
                      </div>
                      <div class="p-t-20">
                        <button class="btn btn--radius btn--green" type="submit">Enviar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/datepicker/moment.min.js"></script>
    <script src="../vendor/datepicker/daterangepicker.js"></script>
    <script src="../js/global.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#Calendarioweb').fullCalendar({
          header: {
            left: 'today, prev,next',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          dayClick: function (date, jsEvent, view) {
            $('#fecha').val(date.format('YYYY-MM-DD'));
            $('#agregar').modal();
          },
          events:'../php/eventos.php',
          eventClick: function (calEvent, jsEvent, view) {
            $('#tituloEvento').html(calEvent.title);
            $('#descripcionEvento').html(calEvent.descripcion);
            $('#exampleModal').modal();
          }
        });
      });
    </script>
  </body>
</html>
