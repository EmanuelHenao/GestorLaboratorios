<?php

  include_once 'DB.php';

  class User extends DB{

    private $codigo, $nombre;

    public function userExists($codigo, $pass){
       $md5pass = md5($pass);
       $query = $this->connect()->prepare('SELECT * FROM gestores WHERE codigo = :codigo AND contra = :pass');
       $query->execute(['codigo' => $codigo, 'pass' => $md5pass]);
       if($query->rowCount()){
         return true;
       }else{
         return false;
       }
    }

    public function setUser($codigo){
      $query = $this->connect()->prepare('SELECT * FROM gestores WHERE codigo = :codigo');
      $query->execute(['codigo' => $codigo]);
      foreach ($query as $currentUser) {
        $this->nombre = $currentUser['nombre'];
        $this->codigo = $currentUser['codigo'];
      }
    }

    public function getNombre(){
      return $this->nombre;
    }

    public function getCodigo() {
      return $this->codigo;
    }

  }
 ?>
