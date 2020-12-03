<?php
  header('Content-Type: aplication/json');
  $pdo = new PDO("mysql:dbname=beta;host=127.0.0.1:8001", "root", "");
  $sentenciaSQL = $pdo->prepare("CALL HoraReserva()");
  $sentenciaSQL->execute();
  $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($resultado);
 ?>
