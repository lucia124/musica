<?php
session_start();set_error_handler('error');

/*todas las facturas */
function error($nibel,$mensaje){
	echo $mensaje;
	die();
	
}
function visualizarFacturas($fechaInicio,$fechaFin){
	
	if($fechaInicio==''){
		trigger_error('no has introducido la fecha de inicio');
		
	}
	if($fechaFin==''){
		$fechaFin=date('Y-m-d');
	}
include('../baseDatos/conexion.php');
$conexion1=conexion();
$sentencia='select InvoiceId, CustomerId, InvoiceDate,Total from Invoice where CustomerId='.$_SESSION['usuario']
.' and InvoiceDate between "'.$fechaInicio.'" and "'.$fechaFin.'"';
echo $sentencia;
$linea=mysqli_query($conexion1,$sentencia);
/*para meter todos los valores y visualizarlos usando paginacion*/
$valores=Array();$contador=0;
while($registro=mysqli_fetch_array($linea)){
	$valores[$contador]='<td>'.$registro['InvoiceId'] .'</td><td>'.$registro['CustomerId'].'</td><td>'. $registro['InvoiceDate'].'</td><td>'.$registro['Total'];
$contador++;
	}
return $valores;
}



?>