function desde() {
    $('#modalDesde').fadeIn(500);
}

function closeDesde() {
    $('#modalDesde').hide();
}

function closeHasta(){
    $('#modalHasta').hide();
}



function closeModalC1() {
    $('#modalC1').hide();
}

function closeModalC2() {
    $('#modalC2').hide();
}

function fecha() {
    const radioSeleccionado = $('input[name="radio-group"]:checked').val();
    if (radioSeleccionado === 'rango') {
        $('#modalC1').show();
        $('#modalC2').hide();
    } else if (radioSeleccionado === 'normal') {
        $('#modalC2').show();
        $('#modalC1').hide();
    }
}

function closeModale(){
    $(".content_modal_e").hide();
}