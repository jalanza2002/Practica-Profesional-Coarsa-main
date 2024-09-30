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
   
    while($row = $result->fetch_assoc()) {
        echo "ID Solicitud: " . $row["IdSolicitud"] . " - Nombre: " . $row["Nombre"] . " - Detalles: ".
        " -Entrada a Vacaciones: ".$row["EntradaVacaciones"]." -Entrada al Trabajo: ".$row["EntradaTrabajo"] . $row["Descripcion"] . 
        " -Estado: ".$row["Estado"]."<br>";
    }
} else {
    echo "No se encontraron solicitudes para el usuario " . $nombre_usuario;
}

$stmt->close();
$conn->close();
?>