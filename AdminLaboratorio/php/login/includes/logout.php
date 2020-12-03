<?php
  include_once 'userSesion.php';
  $userSession = new UserSesion();
  $userSession->closeSession();
  header("Location: ./../../../pages/administrador.php");
 ?>
