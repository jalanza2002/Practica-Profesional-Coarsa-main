<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Mantenimiento Usuarios</title>
    <h1>Tabla Usuarios</h1>
    <div class="nav-buttons">
        <a href="Menu Admin.php">Volver al Inicio</a>
    </div>
    <br>
    <br>
    <br>
    
</head>
<body>
 
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

$stmt = $conn->prepare("SELECT IdUsuario, NombreEmpleado, ApellidosEmpleado, Puesto, Clave, Usuario,
                        Rol, Estado FROM usuarios");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Iniciar la tabla
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Id Usuario</th>
            <th>Nombre Empleado</th>
            <th>Apellidos Empleado</th>
            <th>Puesto</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Accion</th>
          </tr>";

    // Recorrer los resultados
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["IdUsuario"] . "</td>
               <td>" . $row["NombreEmpleado"] . "</td>
                <td>" . $row["ApellidosEmpleado"] . "</td>
                <td>" . $row["Puesto"] . "</td>
                <td>" . $row["Usuario"] . "</td>
                <td>" . $row["Rol"] . "</td>
                <td>" . $row["Estado"] . "</td>
              </tr>";
    }

    // Cerrar la tabla
    echo "</table>";
} else {
    echo "No se encontraron Usuarios";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
</body>
</html>