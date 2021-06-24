<?php
/**
 * 
 */
class Controlador{
  
  function __construct(){}

  public function modelo($modelo){
    require_once("models/".$modelo.".php");
    return new $modelo();
  }

  public function vista($vista, $datos=[]){
    if (file_exists("views/".$vista.".php")) {
      require_once("views/".$vista.".php");
    } else {
      die("La vista no existe...");
    }
    
  }
}
?>