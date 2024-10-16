<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/styles.css">
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

// Comprobar si se envió el formulario
if (isset($_POST['update_estado'])) {
    // Obtener los valores enviados del formulario
    $idUsuario = $_POST['idUsuario'];
    $nuevo_estado = $_POST['nuevo_estado'];
    $nuevo_rol = $_POST['nuevo_rol'];

    // Preparar la consulta UPDATE para actualizar el estado y el rol
    $stmt = $conn->prepare("UPDATE usuarios SET Estado = ?, Rol = ? WHERE IdUsuario = ?");
    $stmt->bind_param("sii", $nuevo_estado, $nuevo_rol, $idUsuario);

    // Ejecutar la consulta y comprobar si fue exitosa
    if ($stmt->execute()) {
        echo "El estado y el rol se actualizaron correctamente.";
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }

    // Cerrar la consulta
    $stmt->close();
}

// Obtener los datos del usuario desde la sesión
$nombreUsuario = isset($_SESSION['NombreEmpleado']) ? $_SESSION['NombreEmpleado'] : '';
$correoUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';

// Seleccionar todos los usuarios
$stmt = $conn->prepare("SELECT IdUsuario, NombreEmpleado, ApellidosEmpleado, Puesto, Clave, Usuario, Rol, Estado FROM usuarios");
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
                <td>
                    <form method='post' action=''>
                        <input type='hidden' name='idUsuario' value='" . $row["IdUsuario"] . "'>
                        <select name='nuevo_estado'>
                            <option value='Activo' " . ($row["Estado"] == "Activo" ? "selected" : "") . ">Activo</option>
                            <option value='Inactivo' " . ($row["Estado"] == "Inactivo" ? "selected" : "") . ">Inactivo</option>
                        </select>
                        <select name='nuevo_rol'>
                            <option value='1' " . ($row["Rol"] == "1" ? "selected" : "") . ">1</option>
                            <option value='2' " . ($row["Rol"] == "2" ? "selected" : "") . ">2</option>
                            <option value='3' " . ($row["Rol"] == "3" ? "selected" : "") . ">3</option>  
                        </select>
                        <input type='submit' name='update_estado' value='Actualizar'>
                    </form>
                </td>
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
