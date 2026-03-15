function buscarVuelos() {
    // Obtener el objeto desde localStorage
    const datosVuelo = JSON.parse(localStorage.getItem('datosVuelo'));

    // Filtrar y seleccionar el último Desde:
    const desdeUltimo = datosVuelo.filter(item => item.startsWith("Desde:")).pop();
    const [codigoDesde, ciudadDesde] = desdeUltimo.match(/\((.*?)\)/g).map(match => match.replace(/[()]/g, ''));

    // Filtrar y seleccionar el último Hacia:
    const haciaUltimo = datosVuelo.filter(item => item.startsWith("Hacia:")).pop();
    const [codigoHacia, ciudadHacia] = haciaUltimo.match(/\((.*?)\)/g).map(match => match.replace(/[()]/g, ''));

    // Filtrar y seleccionar el último Fecha:
    const fechaUltimo = datosVuelo.filter(item => item.startsWith("Fecha:")).pop();

    // TIPO DE FECHA SI ES RANGO O NORMAL
    const radioSeleccionado = $('input[name="radio-group"]:checked').val();
    if (radioSeleccionado === 'rango') {
        tipo_fecha = 'rango';
    } else if (radioSeleccionado === 'normal') {
        tipo_fecha = 'normal';
    }

    // Crear la URL con las variables
    const url = `booking.php?codigoDesde=${codigoDesde}&ciudadDesde=${ciudadDesde}&codigoHacia=${codigoHacia}&ciudadHacia=${ciudadHacia}&fecha=${fechaUltimo}&tipo_fecha=${tipo_fecha}`;

    // Redireccionar a la URL
    window.location.href = url;

}

function vueloSalida(horaA, horaB, precio, tipo_fecha){
    // Obtener el objeto desde localStorage
    const datosVuelo = JSON.parse(localStorage.getItem('datosVuelo'));

    // Filtrar y seleccionar el último Desde:
    const desdeUltimo = datosVuelo.filter(item => item.startsWith("Desde:")).pop();
    const [codigoDesde, ciudadDesde] = desdeUltimo.match(/\((.*?)\)/g).map(match => match.replace(/[()]/g, ''));

    // Filtrar y seleccionar el último Hacia:
    const haciaUltimo = datosVuelo.filter(item => item.startsWith("Hacia:")).pop();
    const [codigoHacia, ciudadHacia] = haciaUltimo.match(/\((.*?)\)/g).map(match => match.replace(/[()]/g, ''));

    // Filtrar y seleccionar el último Fecha:
    const fechaUltimo = datosVuelo.filter(item => item.startsWith("Fecha:")).pop();


    const url = `check1.php?codigoDesde=${codigoDesde}&ciudadDesde=${ciudadDesde}&codigoHacia=${codigoHacia}&ciudadHacia=${ciudadHacia}&fecha=${fechaUltimo}&tipo_fecha=${tipo_fecha}&horaA=${horaA}&horaB=${horaB}&precio=${precio}`;
    window.location.href = url;
}

function getTarifa(text1, text2, tarifa, tipo_fecha){
    var textoHTML = '<strong>' + text1 + '</strong>';
    $('#tarifaText1').html(textoHTML);
    $('#tarifaText2').html(text2);

    if(tarifa == 1){
        let horaA, horaB;
        horaA = "08:05";
        horaB = "09:39";

        imgs = `<img src="media/tarifa1.png" onclick="vueloSalida('${horaA}', '${horaB}', 49999, '${tipo_fecha}');"><img src="media/tarifa2.png" onclick="vueloSalida('${horaA}', '${horaB}', 99999, '${tipo_fecha}');"><img src="media/tarifa3.png" onclick="vueloSalida('${horaA}', '${horaB}', 129999, '${tipo_fecha}');"><img src="media/tarifa4.png" onclick="vueloSalida('${horaA}', '${horaB}', 169999, '${tipo_fecha}');">`;

    } else if(tarifa == 2){
        let horaA, horaB;
        horaA = "09:50";
        horaB = "11:24";

        imgs = `<img src="media/tarifa5.png" onclick="vueloSalida('${horaA}', '${horaB}', 119200, '${tipo_fecha}');"><img src="media/tarifa6.png" onclick="vueloSalida('${horaA}', '${horaB}', 169200, '${tipo_fecha}');"> <img src="media/tarifa7.png" onclick="vueloSalida('${horaA}', '${horaB}', 199200, '${tipo_fecha}');"> <img src="media/tarifa8.png" onclick="vueloSalida('${horaA}', '${horaB}', 239200, '${tipo_fecha}');">`;
    } else if(tarifa == 3){
        let horaA, horaB;
        horaA = "15:45";
        horaB = "17:19";

        imgs = `<img src="media/tarifa9.png" onclick="vueloSalida('${horaA}', '${horaB}', 269540, '${tipo_fecha}');"> <img src="media/tarifa10.png" onclick="vueloSalida('${horaA}', '${horaB}', 369540, '${tipo_fecha}');"> <img src="media/tarifa11.png" onclick="vueloSalida('${horaA}', '${horaB}', 349540, '${tipo_fecha}');"> <img src="media/tarifa12.png" onclick="vueloSalida('${horaA}', '${horaB}', 389540, '${tipo_fecha}');">`;
    } else if(tarifa == 4){
        let horaA, horaB;
        horaA = "18:30";
        horaB = "20:04";

        imgs = `<img src="media/tarifa13.png" onclick="vueloSalida('${horaA}', '${horaB}', 332000, '${tipo_fecha}');"> <img src="media/tarifa14.png" onclick="vueloSalida('${horaA}', '${horaB}', 382000, '${tipo_fecha}');"> <img src="media/tarifa15.png" onclick="vueloSalida('${horaA}', '${horaB}', 412000, '${tipo_fecha}');"> <img src="media/tarifa16.png" onclick="vueloSalida('${horaA}', '${horaB}', 45200, '${tipo_fecha}');">`;
    } 

    $('#precios_tarifa').html(imgs);

    $('#modal_tarifa').show(500);
}

function closeModalTarifa(){
    $('#modal_tarifa').hide();
}