<?php

require('../modelo/todasFacturasFecha.php');
/*conjunto de facturas */



$facturas=visualizarFacturas($_REQUEST['fechaInicio'],$_REQUEST['fechaFin']);
//echo count($facturas);
require('../vista/monstrarFacturas.php');



?>