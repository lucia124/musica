<html>
<head>
</head>
<body>
<form  action='../modelo/hacerCompra.php' method='POST'>
<select name='cancion'>
<?php
/*monstrar las canciones que puede escoger */
foreach($contenido as $cancion => $valor){
	echo '<option value='.$cancion.'>'.$valor.'</option>';
}

?>
</select>
<br>
<input type='submit' value='enviar'>
<input type='reset' value='limpiar' >
</form>
</body>
</html>