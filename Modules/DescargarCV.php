<?php

// Conexión a la base de datos
function getDatabaseConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "JoSu2002@";
    $dbname = "dbcoarsa";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (Exception $e) {
        echo "Error de conexión: " . $e->getMessage();
        exit;
    }
}

// Función para obtener y descargar el CV
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Conectar y obtener el CV desde la base de datos
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("CALL ObtenerCV(:p_Id)");
    $stmt->bindParam(':p_Id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Obtener el CV 
    $cv = $stmt->fetchColumn();

    if ($cv) {
        // Cabeceras
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="cv_' . $id . '.pdf"');
        header('Content-Length: ' . strlen($cv));

        // Enviar el archivo 
        echo $cv;
        exit;
    } else {
        // Si el CV no se encuentr
        echo '<script language="javascript">alert("No se encontró el PDF del candidato.");</script>';
        echo '<script language="javascript">location.href = "/pages/candidatos.php";</script>';
        exit;
    }
} else {
    // Si no se encuentra el ID el ID
    echo '<script language="javascript">alert("No se encontró el ID del candidato.");</script>';
    echo '<script language="javascript">location.href = "/pages/candidatos.php";</script>';
    exit;
}
?>
