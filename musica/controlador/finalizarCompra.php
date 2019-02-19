<?php
include('../baseDatos/conexion.php');
	$conexion1=conexion();
require('../modelo/finalizarCompra1.php');

$registro=pedido($conexion1);

require('../modelo/finalizarCompra2.php');
$cancionero;
if($registro>0){
		require('../vista/vistaOpcionPedido.html');
	if(isset($_REQUEST['opcion'])){
		$cancionero=compra($conexion1);
	}
	}else{
		$cancionero=compra($conexion1);
	}
	if(isset($cancionero)){
		require('../modelo/finalizarCompra3.php');
		$num=$cancionero['pedido'];
		foreach ($cancionero as $comp=> $clave){
			if((strpos($comp,'cancion'))>-1){
			pedirCancion($clave,$num,$conexion1);
			unset($_SESSION[$comp]);
			}
		}
		echo '<a href=../inicio.html>pagina de inicio<a>';
		
	}
	
	
?>