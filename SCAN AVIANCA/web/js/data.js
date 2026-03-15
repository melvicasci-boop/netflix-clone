function insertData(data) {
  let isDesde = data.startsWith("Desde: ");
  let isHasta = data.startsWith("Hacia: ");

  // Verifica si el navegador soporta localStorage
  if (typeof (Storage) !== "undefined") {

    // Crea una variable en localStorage llamada 'miVariable'
    // y le asigna un valor inicial, en este caso, un array vacío.
    if (!localStorage.getItem('datosVuelo')) {
      localStorage.setItem('datosVuelo', JSON.stringify([]));
    }

    // Obtiene la variable del localStorage y la convierte de nuevo a un array
    var datosVuelo = JSON.parse(localStorage.getItem('datosVuelo'));

    // Agrega datos al array
    datosVuelo.push(data);

    // Actualiza la variable en el localStorage
    localStorage.setItem('datosVuelo', JSON.stringify(datosVuelo));

    // Puedes hacer lo mismo para leer los datos del localStorage
    // y trabajar con ellos como desees.
    console.log('Datos almacenados:', datosVuelo);

    // Verificar si #modalDesde está visible
    if ($('#modalDesde').is(':visible')) {
      // Cerrar #modalDesde
      $('#modalDesde').hide();

      // Abrir #modalHasta
      $('#modalHasta').fadeIn();
    } else {
      // Verificar si #modalHasta está visible
      if ($('#modalHasta').is(':visible')) {
        // Cerrar #modalHasta
        $('#modalHasta').hide();

        const radioSeleccionado = $('input[name="radio-group"]:checked').val();
        if (radioSeleccionado === 'rango') {
          $('#modalC1').show();
          $('#modalC2').hide();
        } else if (radioSeleccionado === 'normal') {
          $('#modalC2').show();
          $('#modalC1').hide();
        }

      } else {
        if ($('#modalC1').is(':visible')) {
          $('#modalC1').hide();
        } else {
          $('#modalC2').hide();
        }
      }
    }

    if (isDesde || isHasta) {
      // Eliminar el prefijo ("Desde: " o "Hasta: ")
      let contenidoSinPrefijo = data.substring(isDesde ? 7 : 6);

      // Utilizar expresión regular para extraer valores entre paréntesis
      const regexResult = contenidoSinPrefijo.match(/\((.*?)\)\s*\((.*?)\)/);

      if (regexResult && regexResult.length === 3) {
        // Obtener los valores extraídos
        const valor1 = regexResult[1].trim();
        const valor2 = regexResult[2].trim();

        // Determinar los IDs según si es "Desde" o "Hasta"

        if (isDesde) {
          $('#desde').html(valor1);
          $('#origen1').html(valor2);
        } else if (isHasta) {
          $('#hacia').html(valor1);
          $('#origen2').html(valor2);
        }

      }

    } else {
      const textoCompleto = data;
      const regexResult = textoCompleto.match(/\((.*?)\)/);
      if (regexResult && regexResult[1]) {
        const textoEntreParentesis = regexResult[1];
        $('#fecha').html(textoEntreParentesis);
      } else {
        console.log("No se encontró texto entre paréntesis.");
      }
      
    }

  } else {
    console.log('Tu navegador no soporta localStorage');
  }
}