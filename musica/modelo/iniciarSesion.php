<?php
session_start();
function error($nibel,$mensaje){
	echo $mensaje;
	die();
}
function darAltaUsuario($email, $contrasena){
	include('../baseDatos/conexion.php');
	//include('tiempoDePermanencia.php');
	$conexion1=conexion();
	if($email=='' or $contrasena==''){
		trigger_error('no has introducido alguno de los valores ');
	}else{
	/*buscar si se han metido bien los datos */
	$sentencia='select CustomerId from Customer where Email="'
	.$email.'"and LastName="'.$contrasena.'"';
	echo $sentencia;
	$linea=mysqli_query($conexion1,$sentencia);
	if($registro=mysqli_fetch_array($linea)){
		$_SESSION['usuario']=$registro['CustomerId'];
		
		header('location:../inicio.html');
	}else{
		echo trigger_error('el usuario no es correcto');
	}
	
	}
}
set_error_handler('error');
?>