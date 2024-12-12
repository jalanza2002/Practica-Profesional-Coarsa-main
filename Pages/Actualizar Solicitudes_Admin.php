<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/Estilo Tabla.css">
    <title>Actualizar Solicitudes</title>
</head>
<body>
<header class="header">
        <a href="Menu Admin.php">
            <img src="/Estilos/images/fecha atras.png" alt="12px" class="back-arrow">
        </a>
        <img src="/Estilos/images/Logo Coarsa con slogan png.png" alt="Logo de Coarsa"> <!-- Asegúrate de cambiar "logo.png" por la ruta correcta de tu logo -->
        <a href="logout.php" class="logout">Cerrar sesión</a>
    </header>
<form method="post">
<input type="submit" value="Buscar" style="float: right;">
<label for="Filtrotxt"></label>
<input type="search" name="Filtrotxt" id="Filtrotxt" placeholder="Busqueda" style="float:right;">
</form>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;    
    // Datos de conexión
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

        // Si se envió la actualización del estado
        if (isset($_POST['update_estado'])) {
            $id_solicitud = $_POST['id_solicitud'];
            $nuevo_estado = $_POST['nuevo_estado'];
            $nuevo_comentario = $_POST['nuevo_comentario'];
            $link='www.Coarsa.com';

                // Actualizar el estado de la solicitud
    $stmt_update = $conn->prepare("UPDATE solicitudes SET Estado = ?, Comentario = ? WHERE IdSolicitud = ?");
    $stmt_update->bind_param("ssi", $nuevo_estado, $nuevo_comentario, $id_solicitud);
    $stmt_update->execute();
    $stmt_update->close();

    require __DIR__ . '/../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
    require __DIR__ . '/../PHPMailer-master/PHPMailer-master/src/SMTP.php';
    require __DIR__ . '/../PHPMailer-master/PHPMailer-master/src/Exception.php';
    


    // Obtener el correo del empleado para enviar la notificación
    $stmt_email = $conn->prepare("SELECT CorreoEmpleado FROM solicitudes WHERE IdSolicitud = ?");
    $stmt_email->bind_param("i", $id_solicitud);
    $stmt_email->execute();
    $result_email = $stmt_email->get_result();
    
    if ($result_email->num_rows > 0) {
        $row_email = $result_email->fetch_assoc();
        $correo_empleado = $row_email['CorreoEmpleado'];

        // Enviar correo con PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Configura el host del servidor SMTP
            $mail->SMTPAuth   = true;
            $mail->Username   = 'portalcoarsacr@gmail.com'; // Cambia a tu correo
            $mail->Password   = 'ltdu hhhm jxwn ymst';          // Cambia a tu contraseña
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587; // Puerto TCP; usa 465 para SSL, o 587 para TLS

            // Configurar el remitente y el destinatario
            $mail->setFrom('portalcoarsacr@gmail.com', 'GrupoCoarsa'); // Cambia a tu correo y nombre
            $mail->addAddress($correo_empleado);  // Destinatario, el correo del empleado

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Actualización de estado de solicitud';
            $mail->Body    = "Estimado empleado(a),<br><br>Su solicitud con ID:$id_solicitud
                                sido actualizada al estado: $nuevo_estado.
                                Comentario: $nuevo_comentario Gracias.
                                Puede revisarlo en su panel de consultar solicitudes a travez de la pagina:$link";
            
            // Enviar el correo
            $mail->send();
            echo '<script language="javascript">alert("Se ha actualizado la solicitud correctamente");</script>';
            echo '<script language="javascript">location.href = "/Pages/FinalizacionTarea_Solicitud_Respuesta.php";</script>';
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}";
        }
    }

    $stmt_email->close();
}

            // Actualizar el estado de la solicitud
            $stmt_update = $conn->prepare("UPDATE solicitudes SET Estado = ?, Comentario = ? WHERE IdSolicitud = ?");
            $stmt_update->bind_param("ssi", $nuevo_estado, $nuevo_comentario, $id_solicitud);
            $stmt_update->execute();
            $stmt_update->close();
        
   
        // Consulta para obtener todas las solicitudes y ordenarlas por estado
        $stmt = $conn->prepare("SELECT * FROM solicitudes ORDER BY FIELD(Estado, 'Pendiente', 'Aprobado', 'Rechazado')");
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Consulta para obtener todas las solicitudes y ordenarlas por estado
        $searchTerm = isset($_POST['Filtrotxt']) ? $_POST['Filtrotxt'] : '';
        
        if($searchTerm!=''){
            $stmt = $conn->prepare("SELECT * FROM solicitudes WHERE Nombre LIKE ? OR Apellidos LIKE ? OR Estado LIKE ? ORDER BY FIELD(Estado, 'Pendiente', 'Aprobado', 'Rechazado')");
            $likeTerm = "%" . $searchTerm . "%";
            $stmt->bind_param("sss", $likeTerm, $likeTerm, $likeTerm);
        }else{
            $stmt = $conn->prepare("SELECT * FROM solicitudes ORDER BY FIELD(Estado, 'Pendiente', 'Aprobado', 'Rechazado')");
        }
       
        $stmt->execute();
        $result = $stmt->get_result();

        // Mostrar los resultados
        if ($result->num_rows > 0) {
            echo "<h2>Todas las Solicitudes de los Empleados</h2>";
            echo"<div class='table-container'>";
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>
                    <th>ID Solicitud</th>
                    <th>Cedula</th>
                    <th>Empleado</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Puesto</th>
                    <th>Solicitud</th>
                    <th>Monto</th>
                    <th>Entrada a Vacaciones</th>
                    <th>Entrada  Trabajo</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Comentario</th>
                    <th>FechaSolicitud</th>
                    <th>Cambiar Estado</th>
                  </tr>";
            echo "</div>";

            // Mostrar cada fila
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["IdSolicitud"] . "</td>
                        <td>" . $row["Cedula"] . "</td>
                        <td>" . $row["Nombre"] . "</td>
                        <td>" . $row["Apellidos"] . "</td>
                        <td>" . $row["CorreoEmpleado"] . "</td>
                        <td>" . $row["Puesto"] . "</td>
                        <td>" . $row["Solicitud"] . "</td>
                        <td>" . $row["Monto"] . "</td>
                        <td>" . $row["EntradaVacaciones"] . "</td>
                        <td>" . $row["EntradaTrabajo"] . "</td>
                        <td>" . $row["Descripción"] . "</td>
                        <td>" . $row["Estado"] . "</td>
                        <td>" . $row["Comentario"] . "</td>
                        <td>" . $row["FechaSolicitud"] . "</td>
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='id_solicitud' value='" . $row["IdSolicitud"] . "'>
                                <select name='nuevo_estado'>
                                    <option value='Aprobado' " . ($row["Estado"] == "Aprobado" ? "selected" : "") . ">Aprobado</option>
                                    <option value='Rechazado' " . ($row["Estado"] == "Rechazado" ? "selected" : "") . ">Rechazado</option>
                                    <option value='Pendiente' " . ($row["Estado"] == "Pendiente" ? "selected" : "") . ">Pendiente</option>
                                </select>
                                <label for='nuevo_comentario'>Comentario:</label>
                                <textarea name='nuevo_comentario'>" . htmlspecialchars($row["Comentario"]) . "</textarea>
                                <br>
                                <input type='submit' name='update_estado' value='Agregar'>
                            </form>
                        </td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No se encontraron solicitudes.</p>";
        }

        // Cerrar la conexión
        $stmt->close();
        $conn->close();
    ?>
</body>
</html>
