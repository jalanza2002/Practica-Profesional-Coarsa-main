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

// Verificar si se ha enviado el formulario de restablecimiento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['txtcorreo']; // Aquí puedes verificar que el correo es el correcto
    $nuevaContrasena = $_POST['nuevaContrasena'];
    $confirmarContrasena = $_POST['confirmarContrasena'];

    if ($nuevaContrasena === $confirmarContrasena) {
        // Hashear la nueva contraseña
        $hashContrasena = password_hash($nuevaContrasena, PASSWORD_BCRYPT);

        // Actualizar la contraseña en la tabla usuarios
        $stmt_actualizar = $conexion->prepare("UPDATE usuarios SET Clave = ? WHERE Usuario = ?");
        $stmt_actualizar->bind_param("ss", $hashContrasena, $correo);
        $stmt_actualizar->execute();
        $stmt_actualizar->close();

        echo "Contraseña restablecida con éxito.";
        echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';
    } else {
        echo "Las contraseñas no coinciden.";
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="/Estilos/styles.css">
</head>
<body>
<div class="contenedor">
    <form method="POST">
        <label for="txtcorreo">Correo:</label>
        <input type="email" name="txtcorreo" required>
        <br>
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
