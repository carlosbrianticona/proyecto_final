<?php



include("conexion.php");
$radiosocio = $_POST['radiosocio'];
$nrsocio = isset($_POST['nrsocio']) ? $_POST['nrsocio'] : null;
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo_documento = isset($_POST['tipo_documento']) ? $_POST['tipo_documento'] : null;
//$tipo_documento = $_POST['tipo_documento'];
$nr_documento = $_POST['nr_documento'];
//$genero = $_POST['genero'];
$sexo = isset($_POST['genero']) ? $_POST['genero'] : null;
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
$id_dia = $_POST['id_dia'];

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
    $query = "SELECT ID FROM deporte_cancha_hora WHERE id_deporte = ? AND id_dia = ? AND cancha = ? AND hora_inicio = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("iiis", $deporte, $id_dia, $nrdecancha, $hora);
    $stmt->execute();
    $result = $stmt->get_result();
    $deporte_cancha_hora = $result->fetch_assoc();
    if ($deporte_cancha_hora) {
        $id_deporte_cancha_hora = $deporte_cancha_hora['ID'];

        // Insertar la reserva
        $query = "INSERT INTO reserva (id_persona, id_deporte_cancha_hora, fecha_de_reserva, abono_reserva)
                  VALUES (?, ?, ?, 'NO')";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("iis", $id_persona, $id_deporte_cancha_hora, $fecha_rese);
        $stmt->execute();
        $id_reserva = $stmt->insert_id;
        try {
        // Enviar el correo electrónico de confirmación
            $to = $correo;
            $subject = "Confirmación de Reserva";  //ASUNTO DEL CORREO
            $message = "Hola $nombre $apellido,\n\nTu reserva ha sido realizada con éxito.\nNúmero de reserva: $id_reserva\nFecha de reserva: $fecha_rese\n\nGracias por tu preferencia.";  //CONTENIDO DEL CORRREO
            $headers = "From: clubsancarlos@gmail.com\r\n" .  //el correo desde donde vamos a enviar
                    "Reply-To: clubsancarlos@gmail.com\r\n" .
                    "X-Mailer: PHP/" . phpversion();

            mail($to, $subject, $message, $headers); 
            echo 'El correo electrónico ha sido enviado correctamente.';

        } catch (Exception $e) {
            echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
        }





    } else {
        // Manejar el caso en que no se encuentra el horario
        die("Horario no encontrado.");
    }
}
/*
$mail = new PHPMailer(true);

try {
    // Configurar el servidor SMTP externo (por ejemplo, Gmail SMTP)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mlpqqot@gmail.com';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Resto de tu código...

    // Después de insertar la reserva en la tabla reserva
    //$id_reserva = $stmt->insert_id;

    // Enviar el correo electrónico de confirmación
    $to = $correo;
    $subject = "Confirmación de Reserva";
    $message = "Hola $nombre $apellido,\n\nTu reserva ha sido realizada con éxito.\nNúmero de reserva: $id_reserva\nFecha de reserva: $fecha_rese\n\nGracias por tu preferencia.";
    
    // Configurar el correo electrónico
    $mail->setFrom('mlpqqto@gmail.com', 'Marcos Luis');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Enviar el correo electrónico
    $mail->send();
    echo 'El correo electrónico ha sido enviado correctamente.';
    
} catch (Exception $e) {
    echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
} */

// PARA MOSTRAR LOS BOTONEEES DE REDIRECCIONAMIENTO AL PAGO
echo "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Reserva Completa</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        .modal-dialog {
            max-width: 500px;
            margin: 30vh auto;
        }
    </style>
</head>
<body>
    <div class='modal' tabindex='-1' role='dialog' id='reservaModal'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Reserva Completa</h5>
                </div>
                <div class='modal-body'>
                    <p>Tu número de reserva es $id_reserva. ¿Deseas pagar ahora?</p>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-success' id='pagarAhora'>Sí</button>
                    <button type='button' class='btn btn-secondary' id='pagarDespues'>No</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('reservaModal').style.display = 'block';

        document.getElementById('pagarAhora').addEventListener('click', function() {
            window.location.href = '../pages/metodo-de-pago.php?id_reserva=$id_reserva';
        });

        document.getElementById('pagarDespues').addEventListener('click', function() {
            alert('Recuerda que debes pagar en caja antes de hacer uso de la cancha.');
            window.location.href = '../pages/reserva-de-canchas.html';
        });
    </script>
</body>
</html>";
// Cerrar la conexión
$conexion->close();
?>





