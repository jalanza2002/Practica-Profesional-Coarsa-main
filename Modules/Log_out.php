<?php
session_start(); // Reanudar la sesión

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

// Validar si existe el IdUsuario en la sesión
if (isset($_SESSION['IdUsuario'])) {
    $IdUsuario = $_SESSION['IdUsuario'];

    // Actualizar la hora de salida en la tabla bitacora
    $stmt_bitacora = $conexion->prepare("
        UPDATE bitacora 
        SET HoraSalida = NOW() 
        WHERE IdUsuario = ? 
        AND HoraSalida IS NULL 
        ORDER BY HoraEntrada DESC 
        LIMIT 1
    ");
    if ($stmt_bitacora) {
        $stmt_bitacora->bind_param("i", $IdUsuario);
        $stmt_bitacora->execute();
        $stmt_bitacora->close();
    } else {
        die("Error al preparar la consulta: " . $conexion->error);
    }
}

// Cerrar sesión
session_unset();  // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión actual

// Redirigir a la página de inicio de sesión
echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';

// Cerrar la conexión a la base de datos
$conexion->close();
?>
