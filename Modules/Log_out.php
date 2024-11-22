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

// Obtener el IdUsuario de la sesión
if (isset($_SESSION['IdUsuario'])) {
    $IdUsuario = $_SESSION['IdUsuario'];

    // Actualizar la fecha de salida en la tabla bitacora
    $stmt_bitacora = $conexion->prepare("UPDATE bitacora SET HOraSalida = NOW() WHERE IdUsuario = ? AND HoraSalida IS NULL ORDER BY HoraEntrada DESC LIMIT 1");
    $stmt_bitacora->bind_param("i", $IdUsuario);
    $stmt_bitacora->execute();
    $stmt_bitacora->close();
}

// Cerrar sesión
session_unset();
session_destroy();

// Redirigir a la página de inicio de sesión
echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';

// Cerrar la conexión a la base de datos
$conexion->close();
?>
