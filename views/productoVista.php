<?php include_once("encabezado.php"); 
print "<h2 class='text-center'>".$datos["subtitulo"]."</h2>";
print "<img src='".URL."public/img/".$datos["data"]["imagen"]."' class='rounded float-right'/>";
//Curso en línea
if($datos["data"]["tipo"]==1){
  print "<h4>Descripción:</h4>";
  print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";

  print "<h4>¿A quién va dirigido?:</h4>";
  print "<p>".$datos["data"]["obj"]."</p>";

  print "<h4>Objetivos:</h4>";
  print "<p>".$datos["data"]["beneficios"]."</p>";

  print "<h4>Precio (MXN):</h4>";
  print "<p>$".number_format($datos["data"]["precio"],2)."</p>";

  print "<h4>¿Qué es necesario?:</h4>";
  print "<p>".$datos["data"]["necesario"]."</p>";
} else if($datos["data"]["tipo"]==2){
  print "<h4>Proveedor:</h4>";
  print "<p>".$datos["data"]["prov"]."</p>";

  print "<h4>Direccion:</h4>";
  print "<p>".$datos["data"]["direccion"]."</p>";

  print "<h4>Tamaño del producto:</h4>";
  print "<p>".$datos["data"]["tam"]."</p>";

  print "<h4>Precio (MXN):</h4>";
  print "<p>$".number_format($datos["data"]["precio"],2)."</p>";

  print "<h4>Resumen:</h4>";
  print "<p>".html_entity_decode($datos["data"]["descripcion"])."</p>";
}
$regresa = ($datos["regresa"]=="")? "tienda" : $datos["regresa"];
print "<a href='".URL.$regresa."' class='btn btn-success'/>Regresa</a>";
print "&nbsp";
print "<a href='".URL."carrito/agregaProducto/";
print $datos["data"]["id"]."/"; //id del prodcuto
print $datos["idUsuario"]."' "; //id del usuario
print "class='btn btn-success'/>Agregar al carrito</a>";
include_once("piepagina.php"); ?>