<?php
session_start();
if(isset($_COOKIE['compra'])){
	$usuario=$_SESSION['usuario'];
	$datos=$_COOKIE['compra'];
	$dato=unserialize($datos);
	var_dump($dato);
	if($dato['usuario']==$_SESSION['usuario']){
		foreach ($dato as $clave => $valor){
			$_SESSION[$clave]=$valor;
		}
	}
	
}else{
	echo 'la lista de la compra esta vacia o pasado demasiado tiempo';
}



?>