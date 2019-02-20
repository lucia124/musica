<?php
function pedirCancion($cancion,$pedido,$conexion1){
	
	/*primero hacemos la select de la cancion para saber el precio*/
	$sentencia='select UnitPrice from Track where TrackId='.$cancion;
	echo $sentencia;
	$linea=mysqli_query($conexion1,$sentencia);
	if($registro=mysqli_fetch_array($linea)){
		//echo $registro['UnitPrice'];
		/*sacamos el ultimo registro de la tabla invoiceline*/
		$sentencia1='select max(InvoiceLineId)as a1 from InvoiceLine';
		echo $sentencia1;
		$linea1=mysqli_query($conexion1,$sentencia1);
		if($registro1=mysqli_fetch_array($linea1)){
			$reg=$registro1['a1']+1;
			/*ingresamos el registro en la tabla invoiceline */
	$sentencia2='insert into InvoiceLine
	(InvoiceLineId,InvoiceId,TrackId,UnitPrice,Quantity)
	value('.$reg.','.$pedido.','.$cancion.','.$registro['UnitPrice'].',1)';
	echo $sentencia2;
	if(mysqli_query($conexion1,$sentencia2)){
		/*comprobamos el pedido para despues modificar el total*/
		$sentencia3='select Total from Invoice where InvoiceId='.$pedido;
		echo $sentencia3;
		$linea3=mysqli_query($conexion1,$sentencia3);
		if($registro3=mysqli_fetch_array($linea3)){
			echo $registro3['Total'];
			$valor=$registro3['Total']+$registro['UnitPrice'];
			/*modificamos el total de invoice*/
			$sentencia4='update Invoice set Total='.$valor.'where InvoiceId='.$pedido;
			if(mysqli_query($conexion1,$sentencia4)){
				
				echo '<br>actualizado el total del pedido<br>';
			}
		echo $sentencia4;
		
		}
		
	}
	
		}
		
	
	}
	
	
	
}




?>
