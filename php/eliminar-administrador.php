<?php
include 'conexion.php';

$id = $_POST['id'];

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if ($stmt = $conexion->prepare("DELETE FROM administradores WHERE id = ?")) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $stmt->close();
        $conexion->close();
        header("Location: ../pages/tabla-administradores.php?message=success");
        exit();
    } else {
        $stmt->close();
        $conexion->close();
        header("Location: ../pages/tabla-administradores.php?message=error");
        exit();
    }
} else {
    $conexion->close();
    header("Location: ../pages/tabla-administradores.php?message=error");
    exit();
}
?>



