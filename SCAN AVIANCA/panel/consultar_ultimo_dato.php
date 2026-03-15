<?php
include "conexion/conexion.php";


// Consulta para obtener el último dato ingresado
$sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
$resultado = $mysqli->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    echo json_encode($fila); // Devolver el último dato como JSON
} else {
    echo json_encode(array()); // Devolver un objeto JSON vacío si no se encontraron datos
}

$mysqli->close();
?>