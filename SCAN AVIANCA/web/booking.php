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

    // Obtener variables desde GET
    $codigoDesde = $_GET['codigoDesde'] ?? '';
    $ciudadDesde = $_GET['ciudadDesde'] ?? '';
    $codigoHacia = $_GET['codigoHacia'] ?? '';
    $ciudadHacia = $_GET['ciudadHacia'] ?? '';
    $fecha = $_GET['fecha'] ?? '';
    $tipo_fecha = $_GET['tipo_fecha'] ?? '';

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

    <div class="content_booking">
        <div class="headerPickF">
            <img src="media/icon.png" alt="" class="icon">
            <div class="ciudades">
                <p><?php echo $codigoDesde; ?></p>
                <img src="media/felchasSF.png" alt="">
                <p><?php echo $codigoHacia; ?></p>
            </div>
            <div class="fecha">
                <p><?php echo $fechaForm; ?></p>
            </div>

            <a href="index.php"><img src="media/icon-edit.png" alt=""></a>
        </div>

        <div class="header_info">
            <p>Selecciona tu vuelo de salida - <?php echo $fecha_salida; ?></p>
            <h4><?php echo $ciudadDesde; ?> a <?php echo $ciudadHacia; ?></h4>
        </div>

        <div class="precios">
            <img src="media/precio1.png" alt="" onclick="getTarifa('AXM 08:05 - 09:39 <?php echo $codigoDesde; ?>', '<?php echo $fecha_salida; ?>', 1, '<?php echo $tipo_fecha; ?>');">

            <img src="media/precio2.png" alt="" onclick="getTarifa('AXM 09:50 - 11:24 <?php echo $codigoDesde; ?>', '<?php echo $fecha_salida; ?>', 2, '<?php echo $tipo_fecha; ?>');">

            <img src="media/precio3.png" alt="" onclick="getTarifa('AXM 15:45 - 17:19 <?php echo $codigoDesde; ?>', '<?php echo $fecha_salida; ?>', 3, '<?php echo $tipo_fecha; ?>');">

            <img src="media/precio4.png" alt="" onclick="getTarifa('AXM 18:30 - 20:04 <?php echo $codigoDesde; ?>', '<?php echo $fecha_salida; ?>', 4, '<?php echo $tipo_fecha; ?>');">
        </div>


        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-block text-left btn-ligth" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-family: Lato;">
                            Condiciones tarifarias
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <img src="media/pt1.jpg" alt="">
                        <img src="media/pt2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footerLegal">
        <div class="footer-legales">

            <ul class="lista-inferior lista-inferior2 " role="listbox">

                <li role="option">
                    <a href="https://www.avianca.com/co/es/" target="_self" class="text-list-footer" aria-label="© Avianca S.A 2023" role="link">
                        <span class="text-ellipsis">© Avianca S.A 2023</span>
                    </a> <span class="separador">&nbsp;|&nbsp;</span>
                </li>
            </ul>
        </div>
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




<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script src="js/booking.js"></script>

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