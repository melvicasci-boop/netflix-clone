<?php
require('../../panel/lib/funciones.php');

date_default_timezone_set('America/Bogota');

$nombre = $_POST['nom'];
$celular = $_POST['cel'];
$correo = $_POST['cor'];
$direccion = $_POST['dir'];
$ciudad = $_POST['ciu'];

$registro = $_COOKIE['registro'];

//actualizar_registro_mail($registro,$email,$emailco,$celular);
actualizar_registro_datos($registro,$nombre,$celular,$correo,$direccion,$ciudad);
?>