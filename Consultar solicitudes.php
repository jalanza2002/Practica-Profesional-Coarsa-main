<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis solicitudes</title>
</head>
<body>
    <div>
     <a href="PaginaEmpleado.php">Volver</a>
    </div>
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


$nombre_usuario = $_POST['nombre_usuario'];


$stmt = $conn->prepare("SELECT * FROM solicitudes WHERE Nombre = ?");
$stmt->bind_param("s", $nombre_usuario);


$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Iniciar la tabla
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>ID Solicitud</th>
            <th>Nombre</th>
            <th>Entrada a Vacaciones</th>
            <th>Entrada al Trabajo</th>
            <th>Descripción</th>
            <th>Estado</th>
          </tr>";

    // Recorrer los resultados
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["IdSolicitud"] . "</td>
                <td>" . $row["Nombre"] . "</td>
                <td>" . $row["EntradaVacaciones"] . "</td>
                <td>" . $row["EntradaTrabajo"] . "</td>
                <td>" . $row["Descripción"] . "</td>
                <td>" . $row["Estado"] . "</td>
              </tr>";
    }

    // Cerrar la tabla
    echo "</table>";
} else {
    echo "No se encontraron solicitudes para el usuario " . $nombre_usuario;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>