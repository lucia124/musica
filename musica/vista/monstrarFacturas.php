<html>
<head>
</head>
<body>
<table>
<tr>
<th>Invoiceld<th> CustomerId <th>InvoiceDate<th> Total
</tr>
<?php
foreach ($facturas as $factura){
	echo '<tr>'.$factura.'</tr>';
}



?>
</table>
<a href='../inicio.html'>volver al menu de inicio</a>
</body>
</html>