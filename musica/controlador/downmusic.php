<?php
/*primero recogemos todas las canciones */
require('../modelo/listaCanciones.php');
$contenido=listaCancion();
/*usamos la vista para visualizarlas */
require('../vista/hacerCompra.php');


	


?>