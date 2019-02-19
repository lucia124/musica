<?php
/*introducir cancion en la lista de pedidos*/
session_start();
function compra($cancion1){
	$contador=0;
	$cancion='cancion';
	$comparador=true;
	
	/*comprobar lista del usuario*/
	while($comparador==true){
		$pedidos=$cancion.$contador;
		
		if(isset($_SESSION[$pedidos])){
			
		}else{
			$_SESSION[$pedidos]=$cancion1;
			$comparador=false;
			echo ' cancion sumada a la lista ';
			}
		$contador++;
		
}
	echo '<a href="../controlador/downmusic.php">quieres otra cancion</a><br>';
	echo '<a href="../controlador/finalizarCompra.php">quieres finalizar el pedido</a><br>';
	
}
compra($_REQUEST['cancion']);



?>