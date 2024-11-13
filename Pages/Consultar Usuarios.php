<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/Estilo Tabla.css">
    <title>Mantenimiento Usuarios</title>
    <header class="header">
        <a href="/Pages/Menu Admin.php">
            <img src="/Estilos/images/fecha atras.png" alt="12px" class="back-arrow">
        </a>
        <img src="/Estilos/images/Logo Coarsa con slogan png.png" alt="Logo de Coarsa"> <!-- Asegúrate de cambiar "logo.png" por la ruta correcta de tu logo -->
        <a href="logout.php" class="logout">Cerrar sesión</a>
    </header>
    <br>
    <br>
    <br>
    <form method="post" action="">
        <input type="submit" value="Buscar"  style="float: right;">
        <input type="search" name="Filtrotxt" id="Filtrotxt" style="float: right;" placeholder="Buscar Usuario">
        <br>
        <br>
    </form>
    
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

//Busqueda por filtro
$searchTerm = isset($_POST['Filtrotxt']) ? $_POST['Filtrotxt'] : '';
        
if($searchTerm!=''){
    $stmt = $conn->prepare("
    SELECT * 
    FROM usuarios 
    WHERE NombreEmpleado LIKE ? 
    OR ApellidosEmpleado LIKE ? 
    OR Estado LIKE ? 
    OR Cedula LIKE ? 
    OR Rol LIKE ? 
    ORDER BY Estado ASC");
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("sssss", $likeTerm, $likeTerm, $likeTerm, $likeTerm, $likeTerm);
}else{
    $stmt = $conn->prepare("SELECT * FROM usuarios");
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Iniciar la tabla
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Id Usuario</th>
            <th>Cedula</th>
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
                <td>" . $row["Cedula"] . "</td>
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
