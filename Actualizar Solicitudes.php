<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Solicitudes</title>
</head>
<body>
    <h1>Consulta de Solicitudes</h1>

    
    <form method="POST" action="">
        <label for="nombre_usuario">Nombre del usuario:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required>
        <input type="submit" value="Consultar">
    </form>

    <?php
    
    if (isset($_POST['nombre_usuario'])) {

        
        $servername = "localhost";
        $username = "root";
        $password = "JoSu2002@";
        $dbname = "dbcoarsa";

        
        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        
        if (isset($_POST['update_estado'])) {
            $id_solicitud = $_POST['id_solicitud'];
            $nuevo_estado = $_POST['nuevo_estado'];

            
            $stmt_update = $conn->prepare("UPDATE solicitudes SET Estado = ? WHERE IdSolicitud = ?");
            $stmt_update->bind_param("si", $nuevo_estado, $id_solicitud);
            $stmt_update->execute();
            $stmt_update->close();
        }

        
        $nombre_usuario = $_POST['nombre_usuario'];

        
        $stmt = $conn->prepare("SELECT * FROM solicitudes WHERE Nombre = ?");
        $stmt->bind_param("s", $nombre_usuario);

        
        $stmt->execute();
        $result = $stmt->get_result();

        
        if ($result->num_rows > 0) {
            echo "<h2>Solicitudes para el usuario: " . htmlspecialchars($nombre_usuario) . "</h2>";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>
                    <th>ID Solicitud</th>
                    <th>Entrada a Vacaciones</th>
                    <th>Entrada al Trabajo</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>";

            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["IdSolicitud"] . "</td>
                        <td>" . $row["EntradaVacaciones"] . "</td>
                        <td>" . $row["EntradaTrabajo"] . "</td>
                        <td>" . $row["Descripción"] . "</td>
                        <td>" . $row["Estado"] . "</td>
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='id_solicitud' value='" . $row["IdSolicitud"] . "'>
                                <input type='hidden' name='nombre_usuario' value='" . htmlspecialchars($nombre_usuario) . "'>
                                <select name='nuevo_estado'>
                                    <option value='Aprobado' " . ($row["Estado"] == "Aprobado" ? "selected" : "") . ">Aprobado</option>
                                    <option value='Rechazado' " . ($row["Estado"] == "Rechazado" ? "selected" : "") . ">Rechazado</option>
                                    <option value='Pendiente' " . ($row["Estado"] == "Pendiente" ? "selected" : "") . ">Pendiente</option>
                                </select>
                                <input type='submit' name='update_estado' value='Actualizar'>
                            </form>
                        </td>
                      </tr>";
            }

            
            echo "</table>";
        } else {
            echo "<p>No se encontraron solicitudes para el usuario " . htmlspecialchars($nombre_usuario) . ".</p>";
        }

        
        $stmt->close();
        $conn->close();
    }
    ?>

</body>
</html>
