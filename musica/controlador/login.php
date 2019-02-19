

<?php
require('../modelo/iniciarSesion.php')
$email=$_REQUEST['email'];
$contrasena=$_REQUEST['apellido'];
darAltaUsuario($email,$contrasena);



?>