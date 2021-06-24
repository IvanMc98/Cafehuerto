<?php
/**
 * Manejo de la base de datos MySQL
 */
class Database{
  private $host;
  private $db;
  private $user;
  private $password;
  private $charset;
  public function __construct(){
      $this->host = constant('HOST');
      $this->db = constant('DB');
      $this->user = constant('USER');
      $this->password = constant('PASSWORD');
      $this->charset = constant('CHARSET');
  }
  function connect(){
      try{
          $connection="mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
          $options=[
              PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_EMULATE_PREPARES=>false,
          ];
          $pdo=new PDO($connection,$this->user,$this->password,$options);
          return $pdo;
      }catch(PDOException $e){
          print_r('Error connection: '.$e->getMessage());
      }
  }

  function query($sql){
    $data = array();
    $r = mysqli_query($this->conn, $sql);
    if($r){
      if(mysqli_num_rows($r)>0){
        $data = mysqli_fetch_assoc($r);
      }
    }
    return $data;
  }

  function querySelect($sql){
    $data = array();
    $r = mysqli_query($this->conn, $sql);
    if($r){
      while($row = mysqli_fetch_assoc($r)){
        array_push($data, $row);
      }
    }
    return $data;
  }

  //Query regresa un valor booleano
  function queryNoSelect($sql){
    $r = mysqli_query($this->conn, $sql);
    return $r;
  }

  public function cerrar()
  {
    mysqli_close($this->conn);
  }
}
/*class database{
  private $host = "ec2-52-5-1-20.compute-1.amazonaws.com";
  private $usuario = "caysuraaffnjba";
  private $clave = "1a1d03471e67f993123706220a8642c224ca231799e0389b92e62e78166b13cf"; 
  private $db = "d9kea0lq3eg1pv";
  private $puerto = "5432";
  private $conn;
  
  function __construct()
  {
    $this->conn = mysqli_connect($this->host, 
      $this->usuario, 
      $this->clave,
      $this->db);

    if (mysqli_connect_errno()) {
      printf("Error en la conexión a la base de datos %s",
      mysqli_connect_errno());
      exit();
    } else {
      //print "Conexión exitosa"."<br>";
    }

    if (!mysqli_set_charset($this->conn, "utf8mb4")) {
      printf("Error en la conversión de caracteress %s",
      mysqli_connect_error());
      exit();
    } else {
    }
  } 

  //Query regresa un solo registro en un arreglo asociado
  function query($sql){
    $data = array();
    $r = mysqli_query($this->conn, $sql);
    if($r){
      if(mysqli_num_rows($r)>0){
        $data = mysqli_fetch_assoc($r);
      }
    }
    return $data;
  }

  function querySelect($sql){
    $data = array();
    $r = mysqli_query($this->conn, $sql);
    if($r){
      while($row = mysqli_fetch_assoc($r)){
        array_push($data, $row);
      }
    }
    return $data;
  }

  //Query regresa un valor booleano
  function queryNoSelect($sql){
    $r = mysqli_query($this->conn, $sql);
    return $r;
  }

  public function cerrar()
  {
    mysqli_close($this->conn);
  }
}*/
?>