<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    echo "Error: No hay una sesión activa.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Mis solicitudes</title>
</head>
<body>
    <div class="header">
    <div class="nav-buttons">
     <a href="Menu Empleado.php">Volver</a>
    </div>
    </div>
    <br>
    <br>
</body>
</html>
<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "JoSu2002@";
$dbname = "dbcoarsa";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Obtener los datos del usuario desde la sesión
$nombreUsuario = isset($_SESSION['NombreEmpleado']) ? $_SESSION['NombreEmpleado'] : '';
$correoUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
//var_dump($_SESSION); //el var_dump es para saber si el programa esta trayendo los datos 

$stmt = $conn->prepare("SELECT * FROM solicitudes WHERE CorreoEmpleado = ?");
$stmt->bind_param("s", $correoUsuario);


$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Iniciar la tabla
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>ID Solicitud</th>
            <th>CorreoEmpleado</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Puesto</th>
            <th>Solicitud</th>
            <th>Monto</th>
            <th>Entrada a Vacaciones</th>
            <th>Entrada al Trabajo</th>
            <th>Descripción</th>
            <th>Estado</th>
          </tr>";

    // Recorrer los resultados
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["IdSolicitud"] . "</td>
                <td>" . $row["CorreoEmpleado"] . "</td>
                <td>" . $row["Nombre"] . "</td>
                <td>" . $row["Apellidos"] . "</td>
                <td>" . $row["Puesto"] . "</td>
                <td>" . $row["Solicitud"] . "</td>
                <td>" . $row["Monto"] . "</td>
                <td>" . $row["EntradaVacaciones"] . "</td>
                <td>" . $row["EntradaTrabajo"] . "</td>
                <td>" . $row["Descripción"] . "</td>
                <td>" . $row["Estado"] . "</td>
              </tr>";
    }

    // Cerrar la tabla
    echo "</table>";
} else {
    echo "No se encontraron solicitudes para el usuario " . $nombreUsuario;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>