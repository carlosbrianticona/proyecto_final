<?php
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$descripcion=$_POST["Descripcion"];
try {
    // Enviar el correo electrónico de confirmación
        $to = $correo;
        $subject = "Nueva consulta";  //ASUNTO DEL CORREO
        $message = "Consulta por parte de $nombre,\n\n La consulta es, $descripcion.\nNúmero de reserva: $id_reserva\nFecha de reserva: $fecha_rese\n\nGracias por tu preferencia.";  //CONTENIDO DEL CORRREO
        $headers = "From: clubsancarlos@gmail.com\r\n" .  //el correo desde donde vamos a enviar
                "Reply-To: clubsancarlos@gmail.com\r\n" .
                "X-Mailer: PHP/" . phpversion();

        mail($to, $subject, $message, $headers); 
        echo 'El correo electrónico ha sido enviado correctamente.';

    } catch (Exception $e) {
        echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
    }


?>