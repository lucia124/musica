<?php
session_start();
/*todas las facturas */
function visualizarFacturas(){
include('../baseDatos/conexion.php');
$conexion1=conexion();
$sentencia='select InvoiceId, CustomerId, InvoiceDate,Total from Invoice where CustomerId='.$_SESSION['usuario'];
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