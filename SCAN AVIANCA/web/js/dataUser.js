function siguiente(total) {
    // Obtener los valores de los campos
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var correo = $("#correo").val();
    var celular = $("#celular").val();
    var aceptarTerminos = $("#terminos").prop("checked");

    // Validar que los campos estén llenos y los términos aceptados
    if (nombre && apellido && correo && celular && aceptarTerminos) {
        
        // Crear la URL con las variables
    const url = `pay.php?nombre=${nombre}&apellido=${apellido}&correo=${correo}&celular=${celular}total=${total}`;

    // Redireccionar a la URL
    window.location.href = url;

    } else {

        $("#error_").css("display", "flex");
    }
}

function closeModale(){
    $("#error_").hide();
}