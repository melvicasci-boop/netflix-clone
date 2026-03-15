<?php include "layout/header.php"; ?>

<div class="slider_home">
    <h2>#NACIONALES</h2>
    <p>Destinos nacionales a tan solo $49.999 <br> o hasta agotar existencias.</p>
    <a href="">¡Compra Ya!</a>

    <img src="media/puntos slider.png" alt="">
</div>

<div class="content_card_vuelos">
    <div class="card_vuelo">
        <div class="head">
            <p>Reserva tu vuelo</p>
            <img src="media/felchaA.svg">
        </div>
        <hr class="separator">

        <div class="tipo">
            <div>
                <label class="radio-container">
                    <input type="radio" name="radio-group" class="custom-radio" checked value="rango">
                    <span class="radio-text"></span>
                    <p>Ida y Vuelta</p>
                </label>
            </div>
            
            <div>
                <label class="radio-container">
                    <input type="radio" name="radio-group" class="custom-radio" value="normal">
                    <span class="radio-text"></span>
                    <p>Solo ida</p>
                </label>
            </div>
        </div>

        <div class="buscador">
            <div class="destinos">
                <div class="desde" onclick="desde();">
                    <h4 id="desde">Desde</h4>
                    <p id="origen1">origen</p>
                </div>
                <img src="media/flechas.png" alt="">
                <div class="hasta">
                    <h4 id="hacia">Hacia</h4>
                    <p id="origen2">destino</p>
                </div>
            </div>
            <div class="destinos">
                <div class="fecha desde">
                    <p id="fecha" onclick="fecha();">Fechas de viaje</p>
                </div>

                <div class="fecha">
                    <p>1 Adulto</p>
                </div>
            </div>
        </div>

        <p class="codigo">
            Añadir código promocional
        </p>

        <button type="button" class="buscarv" onclick="buscarVuelos();">Buscar vuelos</button>

        <img src="media/resevar.png" alt="" class="img_re">

        
    </div>

    <div class="card_vuelo">
        <div class="head head2">
            <p>Gestiona tu reserva</p>
            <img src="media/flecharoja.svg">
        </div>
    </div>

    <div class="card_vuelo">
        <div class="head head2">
            <p> Check-in online</p>
            <img src="media/flecharoja.svg">
        </div>
    </div>

    <div class="card_vuelo">
        <div class="head head2">
            <p> Estado de vuelos</p>
            <img src="media/flecharoja.svg">
        </div>
    </div>

    <div class="card_vuelo">
        <div class="head head2">
            <p> Ascenso a Clase Ejecutiva</p>
            <img src="media/flecharoja.svg">
        </div>
    </div>
</div>

<div class="sec2">
    <p class="title">Te contamos lo que pasa <br> en avianca.com</p>
    <p>Disfruta nuevos productos y servicios.</p>
    <img src="media/booking.png" alt="">
    <img src="media/textbooking.png" alt="" class="text_b">
    <img src="media/srvicios.png" alt="" class="serv">
</div>




<div class="modal modal-container" id="modalDesde">
    <div class="content-modal">
        <div class="header">
            <p>¿Cúal es tu origen?</p>
            <button type="button" onclick="closeDesde();"></button>
        </div>

        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Desde">
        </div>
        <div class="airportList" id="airportList"></div>
    </div>
</div>

<div class="modal modal-container" id="modalHasta">
    <div class="content-modal">
        <div class="header">
            <p>¿Cúal es tu destino?</p>
            <button type="button" onclick="closeHasta();"></button>
        </div>

        <div class="search-container">
            <input type="text" id="searchInput2" placeholder="Hacia">
        </div>
        <div class="airportList" id="airportList2"></div>
    </div>
</div>

<div class="modal modal-container" id="modalC1">
    <div class="content-modal">
        <div class="header">
            <p>Fecha de salida y vuelta:</p>
            <button type="button" onclick="closeModalC1();"></button>
        </div>

        <div class="calendar_">
            <div id="calendario-container"></div>
        </div>
    </div>
</div>

<div class="modal modal-container" id="modalC2">
    <div class="content-modal">
        <div class="header">
            <p>Fecha de salida:</p>
            <button type="button" onclick="closeModalC2();"></button>
        </div>

        <div class="calendar_">
            <div id="calendario-container-2"></div>
        </div>
    </div>
</div>



<?php include "layout/footer.php"; ?>