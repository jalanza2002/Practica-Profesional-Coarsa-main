<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Coarsa</title>
</head>
<body>
    

    <div class="header">
    <h2>Coarsa Recursos Humanos</h2>
    <div class="nav-buttons">
        <a href="Candidatos.php">Candidatos</a>
        <a href="CrearUsuario.php">Nuevos Usuarios</a>
        <a href="Menu RH.php">Volver</a>
    </div>
    </div>
    <div class="contenedor">
        <center>
            <h2>Agregue un puesto</h2><br>
            <form method="post">
                <label for="Puesto">Agregue un puesto </label>
                <input type="text" id="Puestotxt" name="Puestotxt" required><br>
                <input class="button" type="submit" id="btnenviar" name="btnenviar" value="Guardar Puesto"><br><br>
            </form>
        </center>
    </div>
        <br>
        <center>
            <form method="post">
                <label for="Salir"></label>
                <input class="button" type="submit" id="btnsalir" name="btnsalir" value="Salir"><btn>
            </form>
        </center>

    <div>
        <center>
            <h2>Lista de Puestos</h2>
            <table border="1">
                <tr>
                    <th>IdPuesto</th>
                    <th>Puesto</th>
                    <th>Acciones</th>
                </tr>

                <?php
                // Función para obtener la conexión a la base de datos
                function getDatabaseConnection() {
                    $servername = "localhost"; 
                    $username = "root";       
                    $password = "JoSu2002@";  
                    $dbname = "dbcoarsa"; 

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        return $conn;
                    } catch (PDOException $e) {
                        echo "Error de conexión: " . $e->getMessage();
                        exit;
                    }
                }

                // Función para guardar un puesto en la base de datos
                function GuardarPuesto() {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Puestotxt'])) {
                        $conn = getDatabaseConnection();
                        $puesto = $_POST['Puestotxt'];

                        $sql = "INSERT INTO vacantes (Puesto) VALUES (:puesto)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':puesto', $puesto);

                        if ($stmt->execute()) {
                            echo "El puesto se ha guardado correctamente";
                        } else {
                            echo "Error: No se pudo guardar el Puesto";
                        }
                    }
                }

                // Función para eliminar un puesto de la base de datos
                function EliminarPuesto($idPuesto) {
                    $conn = getDatabaseConnection();
                    $sql = "DELETE FROM vacantes WHERE IdPuesto = :idPuesto";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':idPuesto', $idPuesto);

                    if ($stmt->execute()) {
                        echo "El puesto se ha eliminado correctamente";
                    } else {
                        echo "Error: No se pudo eliminar el Puesto";
                    }
                }

                // Función para actualizar un puesto en la base de datos
                function ActualizarPuesto($idPuesto, $nuevoPuesto) {
                    $conn = getDatabaseConnection();
                    $sql = "UPDATE vacantes SET Puesto = :nuevoPuesto WHERE IdPuesto = :idPuesto";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':nuevoPuesto', $nuevoPuesto);
                    $stmt->bindParam(':idPuesto', $idPuesto);

                    if ($stmt->execute()) {
                        echo "El puesto se ha actualizado correctamente";
                    } else {
                        echo "Error: No se pudo actualizar el Puesto";
                    }
                }

                // Función para mostrar los datos de la tabla vacantes
                function MostrarVacantes() {
                    $conn = getDatabaseConnection();
                    $sql = "SELECT IdPuesto, Puesto FROM vacantes";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $vacantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($vacantes as $vacante) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($vacante['IdPuesto']) . '</td>';
                        echo '<td>';
                        echo '<form method="post" style="display:inline;">';
                        echo '<input type="hidden" name="idPuesto" value="' . htmlspecialchars($vacante['IdPuesto']) . '">';
                        echo '<input type="text" name="PuestoActualizado" value="' . htmlspecialchars($vacante['Puesto']) . '" required>';
                        echo '<input type="submit" name="actualizar" value="Actualizar">';
                        echo '</form>';
                        echo '</td>';
                        echo '<td>';
                        echo '<form method="post" style="display:inline;">';
                        echo '<input type="hidden" name="idPuesto" value="' . htmlspecialchars($vacante['IdPuesto']) . '">';
                        echo '<input type="submit" name="eliminar" value="Eliminar">';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }

                // Guardar el puesto si se envía el formulario
                GuardarPuesto();

                // Eliminar un puesto si se envía el formulario de eliminación
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
                    $idPuesto = $_POST['idPuesto'];
                    EliminarPuesto($idPuesto);
                }

                // Actualizar un puesto si se envía el formulario de actualización
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
                    $idPuesto = $_POST['idPuesto'];
                    $nuevoPuesto = $_POST['PuestoActualizado'];
                    ActualizarPuesto($idPuesto, $nuevoPuesto);
                }

                //Funcion para salir de la pagina de Recursos Humanos
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnsalir'])) {
                    session_start(); // Asegúrate de iniciar la sesión para poder destruirla
                    session_destroy(); // Destruir la sesión actual
                    header('Location: Log In.php'); // Redirigir a la página de inicio de sesión
                    exit(); // Asegurarse de que el script se detenga
                }

                // Mostrar los datos de la tabla vacantes
                MostrarVacantes();
                ?>
            </table>
        </center>
    </div>
</body>
</html>
