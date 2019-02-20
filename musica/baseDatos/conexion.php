<?php
// primero establecer la conexion con la base de datos 
function conexion(){

$direccion='10.128.180.125';
$usuario='root';
$contrasena='rootroot';
//$contrasena='';
$base='spotify';
 $conexion1=mysqli_connect($direccion,$usuario,$contrasena,$base);
return $conexion1;

 }
?>
