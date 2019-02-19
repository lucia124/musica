<?php

/*include('../baseDatos/conexion.php');
$conexion1=conexion();*/
function compra($conexion1){
$respuesta; 
//uso $num para guardar el numero de pedido tanto si es nuevo como si es anterior
$num;$fecha=date('Y-m-d');
IF(ISSET($_REQUEST['opcion'])){
	$respuesta=$_REQUEST['opcion'];
}
if(ISSET($_REQUEST['opcion']) && $respuesta=='no'){
	/*debo buscar el ultimo pedido de ese usuario*/
	echo 'pedido antiguo';
	$sentencia='select max(InvoiceId) as a1 from Invoice where CustomerId='.$_SESSION['usuario'].' and InvoiceDate = "'.$fecha.'";';	
$linea=	mysqli_query($conexion1,$sentencia);
if($registro=mysqli_fetch_array($linea)){
	$num=$registro['a1'];
	
}
}else{
	/*en este caso buscar el pedido que vamos a dar de alta */
	echo 'nuevo pedido';
$sentencia='select max(InvoiceId) as a1 from Invoice;';	
echo $sentencia;
$linea=	mysqli_query($conexion1,$sentencia);
if($registro=mysqli_fetch_array($linea)){
	$reg=$registro['a1']+1;
	/*creamos el pedido*/
	$sentencia1='insert into Invoice (InvoiceId,CustomerId,InvoiceDate,Total)
	value('.$reg.','.$_SESSION['usuario'].',"'.$fecha.'",0);';
echo $sentencia1;

if(mysqli_query($conexion1,$sentencia1)){
	echo '<br>ha dado de alta el pedido';
}
$num=$reg;
	}
}
 var_dump($_SESSION);
 /*
 recogemos en un array todas las canciones 
 */
 $canciones['pedido']=$num ;$compra=$_SESSION;
 foreach($compra as $comp=> $clave){
	 if((strpos($comp,'cancion'))>-1){
		$canciones[$comp]=$clave; 
	 }
 }
 
 return $canciones;
 
 /*hacemos un require de finalizarCompra3 que se encarga de pedir el producto*/
 //require('finalizarCompra3.php');
 /*$comp1;
 
foreach($compra as $comp=> $clave){
	echo 'clave '.$comp. 'su valor '.$clave .'<br>';
	
	if((strpos($comp,'cancion'))>-1){
		echo '<br> encontrado <br>';
		pedirCancion($clave,$num,$conexion1);
		unset($com);
		echo '<br><br>';
	}else{
		//echo " no encontrado";
	}
	
	
}*/
/*echo "hemos terminado el pedido";*/
/*debido que hacemos los pedidos por lo que borramos las variables de $_SESSION referidas a Session */
/*$user=$_SESSION['usuario'];
var_dump($_SESSION);


var_dump($_SESSION);
$_SESSION=$user;
var_dump($_SESSION);
echo '<a href="../inicio.html">menu inicio</a>';
*/
}
?>