<?php
session_start();
$usuario=$_SESSION['usuario'];
session_unset();
$_SESSION['usuario']=$usuario;
header('location:../inicio.html');


?>