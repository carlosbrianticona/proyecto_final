<?php

include("conexion.php");

// Obtener el valor del parámetro GET
$nrsocio = $_GET['nrsocio'];

// Preparar y ejecutar la consulta
$sql = "SELECT * FROM persona WHERE Numero_de_socio = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $nrsocio);
$stmt->execute();
$result = $stmt->get_result();

// Mostrar los resultados
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode([]);
}

// Cerrar la conexión
$conexion->close();
?>