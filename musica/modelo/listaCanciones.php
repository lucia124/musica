<?php
function listaCancion(){
	include('../baseDatos/conexion.php');
$conexion1=conexion();
$sentencia='select Name, TrackId from Track limit 0 ,100;';
$linea=mysqli_query($conexion1,$sentencia);
$conjunto;
while($registro=mysqli_fetch_array($linea)){
	
	$conjunto[$registro['TrackId']]=$registro['Name'];
}
return $conjunto;
}


?>