<?php
// primero establecer la conexion con la base de datos 
function conexion(){

$direccion='localhost';
$usuario='root';
//$contrasena='rootroot';
$contrasena='';
$base='musica';
 $conexion1=mysqli_connect($direccion,$usuario,$contrasena,$base);
return $conexion1;

 }
?>