<?php
include 'conexion.php';

$documento = isset($_POST['documento']) ? $_POST['documento'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';


if ($documento === '') {
    echo json_encode(['status' => 'error', 'message' => 'Número de documento no proporcionado']);
    exit;
}

$sql = "SELECT COUNT(*) as count FROM persona WHERE Numero_Documento = ? AND ID != ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("si", $documento, $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    echo json_encode(['status' => 'error', 'message' => 'Ya hay otra persona con el mismo número de documento']);
} else {
    echo json_encode(['status' => 'success']);
}

$conexion->close();
?>
