<?php
  class DB{

    private $host, $db, $user, $password, $charset;

    public function __construct(){
      $this->host = '127.0.0.1:3306';
      $this->db = 'beta';
      $this->user = 'root';
      $this->password = '';
      $this->charset = 'utf8mb4';
    }

    public function connect() {
      try{
        $connection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
        $options =[
          PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES=>false
        ];
        $pdo = new PDO($connection, $this->user, $this->password, $options);
        return $pdo;
      }catch(PDOException $e){
        print_r('Error en la conexión '.$e->getMessage());
      }
    }
  }
 ?>
