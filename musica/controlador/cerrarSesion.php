<?php
/*pasamos la informacion de las variables de Session en cookies*/
session_start();
$a=$_SESSION;
$b=serialize($a);
setcookie("compra",$b,time() + 60*60*24);
session_destroy();
header('location:../vista/login.html');

?>