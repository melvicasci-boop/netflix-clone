document.addEventListener('DOMContentLoaded', function () {
    const calendarioContainer = document.getElementById('calendario-container');

    const opcionesCalendario = {
        mode: 'range',
        dateFormat: 'Y-m-d',
        minDate: 'today',
        inline: true,
        locale: 'es', // Establecemos el idioma en español
        onChange: function (selectedDates, dateStr, instance) {
            // Verificar si se han seleccionado dos fechas diferentes
            if (selectedDates.length === 2) {
                // String con el rango de fechas
                const rangoFechasString = dateStr;

                // Separamos las fechas de inicio y fin
                const [fechaInicio, fechaFin] = rangoFechasString.split(" a ");

                // Utilizamos moment.js para formatear las fechas en el formato deseado
                const fechaInicioFormateada = moment(fechaInicio).format('D MMM');
                const fechaFinFormateada = moment(fechaFin).format('D MMM');

                // Creamos el nuevo string con el formato deseado
                const rangoFechasFormateado = `${fechaInicioFormateada} a ${fechaFinFormateada}`;
                
                // Ejecutar la función insertData solo cuando se seleccionan dos fechas diferentes
                insertData("Fecha: (" + rangoFechasFormateado + ")");
            }
        }
    };

    flatpickr(calendarioContainer, opcionesCalendario);
});

// calendario 2
document.addEventListener('DOMContentLoaded', function () {
    const calendarioContainer = document.getElementById('calendario-container-2');

    const opcionesCalendario = {
      dateFormat: 'Y-m-d',
      minDate: 'today',
      inline: true,
      locale: 'es', // Establecemos el idioma en español
      onChange: function (selectedDates, dateStr, instance) {
        // Puedes agregar lógica adicional aquí cuando cambian las fechas seleccionadas
        
        const fechaFormateada = moment(dateStr).format('DD MMM');
        insertData("Fecha: (" + fechaFormateada + ") ");
      }
    };

    flatpickr(calendarioContainer, opcionesCalendario);
  });