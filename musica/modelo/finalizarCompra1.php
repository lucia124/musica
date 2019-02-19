<?php
session_start();
function pedido($conexion1){
	/*include('../baseDatos/conexion.php');
	$conexion1=conexion();*/
	var_dump($_SESSION);
	$fecha=date('Y-m-d');
	/*comprueba que ese usuario no ha hecho pedido ya */
	$sentencia='select InvoiceId from Invoice where InvoiceDate="'.$fecha.'" and CustomerId = '.$_SESSION['usuario'];
	echo $sentencia;
	$linea=mysqli_query($conexion1,$sentencia);
	$registro=mysqli_num_rows($linea);
	/*$num almacena el numero de Invoiceld de este cliente*/
	$num;
	echo"jiji" .$registro.'jijiji';
	return $registro;
	
}





?>