<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coarsa</title>
</head>
<style>
    /* Contenedor principal */
    .contenedor {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
        margin: 100px auto 20px; /* Alinea el contenedor en el centro con márgenes superiores e inferiores */
    }
        input[type=text]{
            width: 30%;
            padding: 12px 10px;
            margin: 8px 0;
            box-sizing: line;
        }
        .button {
            display: block;
            width: 20%;
            padding: 10px;
            background-color: #0060A9;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
        }

</style>
<body>
    <h2>Coarsa</h2>

<center>
        <h1>Nuevo Puesto</h1>
    <form method="POST" action="">
        <div class="contenedor">
            <label for="Puesto"></label>
            <input type="text" id="Puesto" name="Puesto" placeholder="Agregue un Puesto" required>
            <input type="submit" class="button" value="Subir">
        </div>
    </form>
</center>
    <br>
<!--Metodo post para agregar el puesto a la base de datos -->
<?php
$serverName = "JSM\\SQL2022DEV";  // Reemplaza con el nombre de tu servidor y el puerto
$connectionOptions = array(
    "Database" => "DBCoarsa",
    "Uid" => "sa",
    "PWD" => "SmJ2002@",
    "ConnectionPooling" => false
);

try {
    // Establecer la conexión usando PDO
    $conn = new PDO("sqlsrv:server=$serverName;Database=DBCoarsa", $connectionOptions['Uid'], $connectionOptions['PWD']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Procesar el formulario si se envió
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar datos del formulario
        $puesto = $_POST['Puesto'];

        // Preparar la consulta SQL para insertar datos
        $sql = "INSERT INTO Vacantes (NombrePuesto) VALUES (:puesto)";
        $stmt = $conn->prepare($sql);
        
        // Ejecutar la consulta con los datos del formulario
        $stmt->execute([
            ':puesto' => $puesto
        ]);

        echo "Puesto agregado exitosamente.";
    }

    // Consulta SQL para mostrar los datos
    $sql = "SELECT * FROM Vacantes";  // Reemplaza con el nombre de tu tabla
    $stmt = $conn->query($sql);

    // Mostrar los resultados en una tabla HTML
    echo "<table border='1'>
            <tr>
                <th>Id</th>
                <th>Puesto</th>
                <!-- Agrega más columnas según tu tabla -->
            </tr>";

    // Recorrer los resultados y mostrarlos
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['IdPuesto']) . "</td>";  // Usa htmlspecialchars para prevenir XSS
        echo "<td>" . htmlspecialchars($row['NombrePuesto']) . "</td>";  // Usa htmlspecialchars para prevenir XSS

        echo "</tr>";
    }
    echo "</table>";
    
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

</body>
</html>