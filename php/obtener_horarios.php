
<?php 
require("conexion.php");




if (isset($_GET['id_dia'])/* && isset($_GET['deporte']) && isset($_GET['nrdecancha']) */) {
   $id_dia = intval($_GET['id_dia']);


  /*  $id_deporte = intval($_GET['deporte']);
    $nrdecancha = intval($_GET['nrdecancha']);

        //consulta diseñada por el profe:
    /*$sql = "SELECT CONCAT('DESDE :' , deporte_cancha_hora.`hora_inicio`, ' - HASTA :' , deporte_cancha_hora.`hora_finalizado`) AS bloque_horario
    FROM DEPORTE_CANCHA_HORA 
    LEFT JOIN RESERVA ON DEPORTE_CANCHA_HORA.ID= RESERVA.`id_deporte_cancha_hora` 
    WHERE deporte_cancha_hora.`id_deporte` =1 
    AND deporte_cancha_hora.`id_dia`=1
    AND reserva.id IS NULL";  error al obtener horario*/

    $sql = "SELECT hora_inicio, hora_finalizado FROM deporte_cancha_hora  WHERE id_dia = ? /* AND id_deporte = ? AND cancha = ? */";
    $stmt = $conexion->prepare($sql);
    //$stmt->bind_param('iii', $id_dia, $id_deporte, $nrdecancha); // Usamos "i" para indicar que es un entero
    $stmt->bind_param('i', $id_dia);
    $stmt->execute();
    $result = $stmt->get_result();

    $horarios = array();
    while ($row = $result->fetch_assoc()) {
    $horarios[] = $row;
    }

    echo json_encode($horarios);
    } else {
      echo json_encode(array('error' => 'Parametros faltantes'));
    }

$conexion->close();

?> 

