<?php
session_start();

// Configuración de la base de datos
$servidor = "localhost";
$NombreUsuario = "root";
$Clave = "JoSu2002@";
$BD = "dbCoarsa";

// Conexión a la base de datos
$conexion = new mysqli($servidor, $NombreUsuario, $Clave, $BD);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si se ha enviado un token
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verificar el token en la base de datos
    $stmt = $conexion->prepare("SELECT IdUsuario FROM restablecer_contrasena WHERE Token = ? AND FechaExpiracion > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $idUsuario = $fila['IdUsuario'];

        // Si el token es válido, mostrar formulario para restablecer la contraseña
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nuevaContrasena = $_POST['nuevaContrasena'];
            $confirmarContrasena = $_POST['confirmarContrasena'];

            if ($nuevaContrasena === $confirmarContrasena) {
                // Hashear la nueva contraseña
                $hashContrasena = password_hash($nuevaContrasena, PASSWORD_BCRYPT);

                // Actualizar la contraseña en la tabla usuarios
                $stmt_actualizar = $conexion->prepare("UPDATE usuarios SET Clave = ? WHERE IdUsuario = ?");
                $stmt_actualizar->bind_param("si", $hashContrasena, $idUsuario);
                $stmt_actualizar->execute();
                $stmt_actualizar->close();

                // Eliminar el token de la base de datos
                $stmt_eliminar = $conexion->prepare("DELETE FROM restablecer_contrasena WHERE Token = ?");
                $stmt_eliminar->bind_param("s", $token);
                $stmt_eliminar->execute();
                $stmt_eliminar->close();

                echo "Contraseña restablecida con éxito.";
            } else {
                echo "Las contraseñas no coinciden.";
            }
        }
    } else {
        echo "El token no es válido o ha expirado.";
    }

    // Cerrar la consulta
    $stmt->close();
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="C:\xampp\htdocs\practica coarsa\Practica-Profesional-Coarsa-main\Estilos">
</head>
<body>
<div class="contenedor">
    <form method="POST">
        <label for="nuevaContrasena">Nueva Contraseña:</label>
        <input type="password" name="nuevaContrasena" required>
        <br>
        <label for="confirmarContrasena">Confirmar Contraseña:</label>
        <input type="password" name="confirmarContrasena" required>
        <br>
        <input class="button" type="submit" value="Restablecer Contraseña">
    </form>
</div>
</body>
</html>
