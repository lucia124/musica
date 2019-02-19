<?php
require('../modelo/todasFacturas.php');
/*conjunto de facturas */
$facturas=visualizarFacturas();
//echo count($facturas);
require('../vista/monstrarFacturas.php');



?>