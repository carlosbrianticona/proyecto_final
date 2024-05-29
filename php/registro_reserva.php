<?php

include("conexion.php");

$nrsocio = isset($_POST["nrsocio"]) ? $_POST["nrsocio"] : null;
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$tipo_documento = $_POST["tipo_documento"];
$nr_documento = $_POST["nr_documento"];
$genero = $_POST["genero"];
$correo = $_POST["correo"];
$fecha_nac = $_POST["fecha_nac"];
$nrdecancha = $_POST["nrdecancha"];
$horario_inic = $_POST["horario_inic"];
$horario_fin = $_POST["horario_fin"];
$fecha_rese = $_POST["fecha_rese"];
$telefono = $_POST["telefono"];
$localidad = $_POST["localidad"];
$calle = $_POST["calle"];
$altura = $_POST["altura"];
$deporte = $_POST["deporte"]; // Recuperar el deporte seleccionado

// Comprobación adicional para asegurarse de que el deporte es un ID válido
if (!is_numeric($deporte)) {
    echo "Error: El deporte seleccionado no es válido.";
    exit();
}

// Insertar datos en la tabla persona
$sql_persona = "INSERT INTO persona (Numero_Documento, id_tipo_de_documento, Apellido, Nombre, Numero_de_socio, Email, id_genero, telefono, fecha_nac, Localidad, Calle, Altura)
 VALUES ('$nr_documento', '$tipo_documento', '$apellido', '$nombre', '$nrsocio', '$correo', '$genero', '$telefono', '$fecha_nac', '$localidad', '$calle', '$altura')";

if ($conexion->query($sql_persona) === TRUE) {
    $id_persona = $conexion->insert_id; // Obtener el ID de la última inserción
    //echo "Datos guardados exitosamente. ";
} else {
    echo "Error al guardar datos del socio: " . $conexion->error;
    exit();
}

// Insertar datos en la tabla deporte_cancha_hora
$sql_deporte_cancha_hora = "INSERT INTO deporte_cancha_hora (id_deporte, cancha, hora_inicio, hora_finalizado) VALUES ('$deporte', '$nrdecancha', '$horario_inic', '$horario_fin')";

if ($conexion->query($sql_deporte_cancha_hora) === TRUE) {
    $id_deporte_cancha_hora = $conexion->insert_id; // Obtener el ID de la última inserción
    //echo "Datos del deporte, cancha y horario guardados exitosamente.";
} else {
    echo "Error al guardar datos del deporte, cancha y horario: " . $conexion->error;
    exit();
}

// Insertar datos en la tabla reserva
$sql_reserva = "INSERT INTO reserva (fecha_de_reserva, id_persona, id_deporte_cancha_hora) VALUES ('$fecha_rese', '$id_persona', '$id_deporte_cancha_hora')";

if ($conexion->query($sql_reserva) === TRUE) {
    echo "<script>
                    alert('Datos de la reserva guardados exitosamente.');
                    window.location.href = '../pages/reserva-de-canchas.html';
                  </script>";
} else {
    echo "<script>
                    alert('Error al guardar datos de la reserva: " . mysqli_error($conexion) . "');
                    window.location.href = '../index.html';
                  </script>";
    //echo "Error al guardar datos de la reserva: " . $conexion->error;
    exit();
}

// Cerrar la conexión
$conexion->close();
?>





