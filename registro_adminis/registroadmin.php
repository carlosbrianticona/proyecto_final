<?php
include("../php/conexion.php");

// Obtener los datos del formulario de manera segura
$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
$password = mysqli_real_escape_string($conexion, $_POST['password']);

// Hashear la contraseña
$passwordHash = password_hash($password, PASSWORD_BCRYPT); //nos da 60 caracteres encriptados

// Verificar si el usuario ya existe en la base de datos
$consultaId = "SELECT usuario FROM administradores WHERE usuario= '$usuario'";
$resultado = mysqli_query($conexion, $consultaId);

// Verificar si la consulta devolvió algún resultado
if (mysqli_num_rows($resultado) == 0) {
    // Si el usuario no existe, inserta el nuevo usuario
    $sql = "INSERT INTO administradores (usuario, password) VALUES ('$usuario', '$passwordHash')";
    
    if (mysqli_query($conexion, $sql)) {
        echo "Tu usuario ha sido creado. <a href='registroadmin.html'>Volver a registro</a>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
} else {
    // Si el usuario ya existe
    
    echo "El usuario ya existe. <a href='registroadmin.html'>Volver a registro</a>";
}

// Cerrar la conexión con MySQL
mysqli_close($conexion);
?>
