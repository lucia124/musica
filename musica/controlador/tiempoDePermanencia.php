<?php
/*controla el tiempo que se encuentra en funcionamiento la aplicacion*/

$_SESSION['tiempo']=time();
$tiempoMaximo=3000;
if(isset($_SESSION['tiempo'])){
	$temp=time()-$_SESSION['tiempo'];
	if($tem>$tiempoMaximo){
		
		header('location:cerrarSesion.php');
	}
}



?>