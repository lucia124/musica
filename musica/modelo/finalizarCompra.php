<?php
/*hacer pedido le pasamos el numero de cancion */
function pedido($cancion){
	/*primero asegurarnos de que no hay registro en InvoceId*/
	$direccion='localhost';
$usuario='root';
//$contrasena='rootroot';
$contrasena='';
$base='musica';
 $conexion1=mysqli_connect($direccion,$usuario,$contrasena,$base);

	
	
	 //include_once('../baseDatos/conexion.php');
	//$conexion1=conexion();
	$fecha=date('Y-m-d');
	$sentecia='Select count(InvoiceId)as a1 from Invoice where InvoiceDate="'.$fecha.'" and CustomerId='.$_SESSION['usuario'];
	echo $sentecia;$num;
	$linea=mysqli_query($conexion1,$sentecia);
	
	if($registro=mysqli_fetch_array($linea)){
		
		
			
	if($registro['a1']==0){
		
	
		/*mirar el maximo numero de Invoiceld*/
		echo '<br>';
		$sentecia1='select max(InvoiceId)as a1 from Invoice;';
		echo $sentecia1;
		$linea1=mysqli_query($conexion1,$sentecia1);
		if($registro1=mysqli_fetch_array($linea1)){
			$registo=$registro1['a1']+1;
			/*vamos a insertar la nueva linea en dar de alta  en in*/
			$sentecia2='insert into Invoice(InvoiceId,CustomerId,InvoiceDate,Total) values ('.$registo.','.$_SESSION["usuario"].',"'.$fecha.'",0);';
			echo $sentecia2;
			
			if(mysqli_query($conexion1,$sentecia2)){
				echo "se ha dado de alta";
			}
		}
	$num=$registo;}else{
		/*el pedido existe en la base de datos */
		$sentencia2='select InvoiceId from Invoice where InvoiceDate="'
		.$fecha.'" and CustomerId='.$_SESSION['usuario'];
		echo $sentencia2;
		$linea2=mysqli_query($conexion1,$sentencia2);
		if($registro2=mysqli_fetch_array($linea2)){
			$num=$registro2['InvoiceId'];
		}
		
	}
	agregarCancion($cancion,$num);
	}
	
}
function agregarCancion($cancion,$registroLista){
	echo "huhuhuhu";
	include('../baseDatos/conexion.php');
	$conexion1=conexion();
	/*primero buscamos de la cancion el precio y agregamos la nueva linea a InvoiceLine*/
	$sentecia='select UnitPrice from Track where TrackId='.$cancion;
	echo $sentecia.'<br>';
	$linea=mysqli_query($conexion1,$sentecia);
	if($registro=mysqli_fetch_array($linea)){
		
		echo $registro['UnitPrice'];
		/*comprobamos el ultimo registro de InvoiceLine*/
		$sentecia1='select max(`InvoiceLineId`)as a1 from Invoiceline ';
		echo $sentecia1;
		$linea1=mysqli_query($conexion1,$sentecia1);$contador=0;
		if($registro1=mysqli_fetch_array($linea1)){
			$contador=$registro1['a1']+1;
			$sentecia2='insert into Invoiceline (`InvoiceLineId`,`InvoiceId`,`TrackId`,`UnitPrice`,`Quantity`) values ('
			.$contador.','.$registroLista.','.$cancion.','.$registro['UnitPrice'].',1)';
			echo $sentecia2;
			$linea2=mysqli_query($conexion1,$sentecia2);
			
			if(mysqli_query($conexion1,$sentecia2)){
				echo 'ha dado de alta la cancion'; 
			}else{
				echo 'no se ha dado alta';
				
			}
		}

		
		
	}
}


/*visualizar las canciones pedidas */
 session_start();
foreach ($_SESSION as $index => $value) {
    echo __FILE__ . __LINE__ . " $index: $value<br>";
	echo strpos($index,'cancion');
	if(strpos($index,'cancion')!=-1){
		/*hacer el pedido*/echo "hola";
		pedido($value);
	}
}


?>