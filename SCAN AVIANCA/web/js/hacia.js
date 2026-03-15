document.addEventListener('DOMContentLoaded', function () {
    // Obtener referencia al contenedor de la lista de aeropuertos
    const airportListContainer = document.getElementById('airportList2');

    // Obtener referencia al campo de búsqueda
    const searchInput2 = document.getElementById('searchInput2');

    // Manejar cambios en el campo de búsqueda
    searchInput2.addEventListener('input', function () {
        renderAirportList2(airportData2, searchInput2.value.toLowerCase());
    });

    // Renderizar la lista de aeropuertos al cargar la página
    renderAirportList2(airportData2);
});

// Función para renderizar la lista de aeropuertos
function renderAirportList2(data, searchQuery = '') {
    // Obtener referencia al contenedor de la lista de aeropuertos
    const airportListContainer = document.getElementById('airportList2');

    // Limpiar el contenido existente
    airportListContainer.innerHTML = '';

    // Filtrar datos según la consulta de búsqueda
    const filteredData = data.id.filter((airport) => {
        const airportName = airport.name.toLowerCase();
        return airportName.includes(searchQuery);
    });

    // Crear y agregar elementos de la lista al contenedor
    filteredData.forEach((airport) => {
        const airportItem = document.createElement('div');
        airportItem.classList.add('airport-item');

        // Crear una etiqueta h4 para el nombre del aeropuerto
        const nameHeading = document.createElement('h4');
        nameHeading.textContent = airport.name;

        // Crear una etiqueta p para el nombre completo del aeropuerto
        const fullNameParagraph = document.createElement('p');
        fullNameParagraph.textContent = airport.full_name;

        // Agregar las etiquetas h4 y p al elemento del aeropuerto
        airportItem.appendChild(nameHeading);
        airportItem.appendChild(fullNameParagraph);

        // Agregar el elemento del aeropuerto al contenedor de la lista
        airportListContainer.appendChild(airportItem);

        // Agregar un evento de clic al elemento del aeropuerto
        airportItem.addEventListener('click', () => {
            // Extraer el texto entre paréntesis de airport.name
            const regexResult = airport.name.match(/([^\(]*)\((.*?)\)/);

            // Verificar si se encontró un resultado y llamar a insertData con el texto extraído
            if (regexResult && regexResult[1]) {
                const valorFueraParentesis = regexResult[1].trim();
                const valorDentroParentesis = regexResult[2].trim();
                insertData("Hacia: (" + valorDentroParentesis + ") (" + valorFueraParentesis + ")");
            }
        });
    });
}

// Tu JSON de datos (lo he colocado aquí para demostración, pero puedes cargarlo desde una fuente externa)
const airportData2 = { "code": 1041, "msg": "Aeropuertos extra\u00eddos.", "status": 0, "scode": 0, "id": [{ "idav_airport": "399", "idav_country": "162", "name": "Arauca (AUC)", "full_name": "Aeropuerto Santiago P\u00e9rez", "active": "1", "code": null }, { "idav_airport": "400", "idav_country": "162", "name": "Armenia (AXM)", "full_name": "Aeropuerto El Ed\u00e9n", "active": "1", "code": null }, { "idav_airport": "401", "idav_country": "162", "name": "Barrancabermeja (EJA)", "full_name": "Aeropuerto Yariguies", "active": "1", "code": null }, { "idav_airport": "402", "idav_country": "162", "name": "Barranquilla (BAQ)", "full_name": "Aeropuerto Ernesto Cortissoz", "active": "1", "code": null }, { "idav_airport": "403", "idav_country": "162", "name": "Bogot\u00e1 (BOG)", "full_name": "Aeropuerto El Dorado", "active": "1", "code": null }, { "idav_airport": "404", "idav_country": "162", "name": "Bucaramanga (BGA)", "full_name": "Aeropuerto Palonegro", "active": "1", "code": null }, { "idav_airport": "405", "idav_country": "162", "name": "Cali (CLO)", "full_name": "Aeropuerto Alfonso Bonilla Arag\u00f3n", "active": "1", "code": null }, { "idav_airport": "406", "idav_country": "162", "name": "Cartagena (CTG)", "full_name": "Aeropuerto Rafael N\u00fa\u00f1ez", "active": "1", "code": null }, { "idav_airport": "407", "idav_country": "162", "name": "Corozal (CZU)", "full_name": "Aeropuerto Las Brujas", "active": "1", "code": null }, { "idav_airport": "408", "idav_country": "162", "name": "C\u00facuta (CUC)", "full_name": "Aeropuerto Camilo Daza", "active": "1", "code": null }, { "idav_airport": "409", "idav_country": "162", "name": "Florencia (FLA)", "full_name": "Aeropuerto Gustavo Artunduaga Paredes", "active": "1", "code": null }, { "idav_airport": "410", "idav_country": "162", "name": "Ibagu\u00e9 (IBE)", "full_name": "Aeropuerto de Perales", "active": "1", "code": null }, { "idav_airport": "411", "idav_country": "162", "name": "Ipiales (IPI)", "full_name": "Aeropuerto San Luis", "active": "1", "code": null }, { "idav_airport": "412", "idav_country": "162", "name": "Leticia (LET)", "full_name": "Aeropuerto Alfredo V\u00e1squez Cobo", "active": "1", "code": null }, { "idav_airport": "413", "idav_country": "162", "name": "Manizales (MZL)", "full_name": "Aeropuerto La Nubia", "active": "1", "code": null }, { "idav_airport": "414", "idav_country": "162", "name": "Medell\u00edn (MDE)", "full_name": "Aeropuerto Jose Maria Cordova", "active": "1", "code": null }, { "idav_airport": "415", "idav_country": "162", "name": "Monter\u00eda (MTR)", "full_name": "Aeropuerto Los Garzones", "active": "1", "code": null }, { "idav_airport": "416", "idav_country": "162", "name": "Neiva (NVA)", "full_name": "Aeropuerto Benito Salas", "active": "1", "code": null }, { "idav_airport": "417", "idav_country": "162", "name": "Pasto (PSO)", "full_name": "Aeropuerto Antonio Nari\u00f1o", "active": "1", "code": null }, { "idav_airport": "418", "idav_country": "162", "name": "Pereira (PEI)", "full_name": "Aeropuerto Mateca\u00f1a", "active": "1", "code": null }, { "idav_airport": "419", "idav_country": "162", "name": "Popay\u00e1n (PPN)", "full_name": "Aeropuerto Guillermo Le\u00f3n Valencia", "active": "1", "code": null }, { "idav_airport": "420", "idav_country": "162", "name": "Puerto As\u00eds (PUU)", "full_name": "Aeropuerto Tres de Mayo", "active": "1", "code": null }, { "idav_airport": "421", "idav_country": "162", "name": "Quibdo (UIB)", "full_name": "Aeropuerto El Cara\u00f1o", "active": "1", "code": null }, { "idav_airport": "422", "idav_country": "162", "name": "Riohacha (RCH)", "full_name": "Aeropuerto Almirante Padilla", "active": "1", "code": null }, { "idav_airport": "423", "idav_country": "162", "name": "San Andr\u00e9s (ADZ)", "full_name": "Aeropuerto Gustavo Rojas Pinilla", "active": "1", "code": null }, { "idav_airport": "424", "idav_country": "162", "name": "San Jos\u00e9 del Guaviare (SJE)", "full_name": "Aeropuerto Jorge Enrique Gonz\u00e1lez", "active": "1", "code": null }, { "idav_airport": "425", "idav_country": "162", "name": "Santa Marta (SMR)", "full_name": "Aeropuerto Sim\u00f3n Bol\u00edvar", "active": "1", "code": null }, { "idav_airport": "426", "idav_country": "162", "name": "Tumaco (TCO)", "full_name": "Aeropuerto La Florida", "active": "1", "code": null }, { "idav_airport": "427", "idav_country": "162", "name": "Valledupar (VUP)", "full_name": "Aeropuerto Alfonso L\u00f3pez Pumarejo", "active": "1", "code": null }, { "idav_airport": "428", "idav_country": "162", "name": "Villavicencio (VVC)", "full_name": "Aeropuerto La Vanguardia", "active": "1", "code": null }, { "idav_airport": "429", "idav_country": "162", "name": "Yopal (EYP)", "full_name": "Aeropuerto El Alcarav\u00e1n", "active": "1", "code": null }] };
