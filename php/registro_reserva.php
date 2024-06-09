<?php

include("conexion.php");
$radiosocio = $_POST['radiosocio'];
$nrsocio = isset($_POST['nrsocio']) ? $_POST['nrsocio'] : null;
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo_documento = $_POST['tipo_documento'];
$nr_documento = $_POST['nr_documento'];
$genero = $_POST['genero'];
$correo = $_POST['correo'];
$fecha_nac = $_POST['fecha_nac'];
$nrdecancha = $_POST['nrdecancha'];
$telefono = $_POST['telefono'];
$fecha_rese = $_POST['fecha_rese'];
$horario_inic = $_POST['horario_inic']; // Array de horarios seleccionados
$localidad = $_POST['localidad'];
$calle = $_POST['calle'];
$altura = $_POST['altura'];
$deporte = $_POST['deporte'];
$nrdecancha = $_POST['nrdecancha'];

 // Recuperar el deporte seleccionado

// Comprobación adicional para asegurarse de que el deporte es un ID válido
if (!is_numeric($deporte)) {
    echo "Error: El deporte seleccionado no es válido.";
    exit();
}

// Verifica si la persona ya está registrada o si es un nuevo registro
if ($radiosocio == 'si' && $nrsocio) {
    // Si es socio, buscar la persona en la base de datos por el número de socio
    $query = "SELECT ID FROM persona WHERE Numero_de_socio = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $nrsocio);
    $stmt->execute();
    $result = $stmt->get_result();
    $persona = $result->fetch_assoc();
    if ($persona) {
        $id_persona = $persona['ID'];
    } else {
        // Manejar el caso en que no se encuentra el socio
        die("Número de socio no encontrado.");
    }
} else {
    // Si no es socio o es un nuevo registro, insertar los datos en la tabla persona
    $query = "INSERT INTO persona (Numero_Documento, id_tipo_de_documento, Apellido, Nombre, Numero_de_socio, Email, id_genero, activa_s_n, telefono, fecha_nac, Localidad, Calle, Altura)
              VALUES (?, ?, ?, ?, ?, ?, ?, 'SI', ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("iissisiisssi", $nr_documento, $tipo_documento, $apellido, $nombre, $nrsocio, $correo, $genero, $telefono, $fecha_nac, $localidad, $calle, $altura);
    $stmt->execute();
    $id_persona = $stmt->insert_id;
}

// Ahora insertar las reservas en la tabla reserva
foreach ($horario_inic as $hora) {
    // Buscar el ID correspondiente en la tabla deporte_cancha_hora
    $query = "SELECT ID FROM deporte_cancha_hora WHERE id_deporte = ? AND cancha = ? AND hora_inicio = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("iis", $deporte, $nrdecancha, $hora);
    $stmt->execute();
    $result = $stmt->get_result();
    $deporte_cancha_hora = $result->fetch_assoc();
    if ($deporte_cancha_hora) {
        $id_deporte_cancha_hora = $deporte_cancha_hora['ID'];

        // Insertar la reserva
        $query = "INSERT INTO reserva (id_persona, id_deporte_cancha_hora, fecha_de_reserva, abono_reserva)
                  VALUES (?, ?, ?, 'SI')";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("iis", $id_persona, $id_deporte_cancha_hora, $fecha_rese);
        $stmt->execute();
    } else {
        // Manejar el caso en que no se encuentra el horario
        die("Horario no encontrado.");
    }
}

// Cerrar la conexión
$conexion->close();
?>





