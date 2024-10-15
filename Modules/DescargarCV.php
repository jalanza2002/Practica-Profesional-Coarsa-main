<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    
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

    // Conexión y consulta del CV desde la base de datos
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("CALL ObtenerCV(:p_Id)");
    $stmt->bindParam(':p_Id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Obtener el CV
    $cv = $stmt->fetchColumn(); // Asume que solo devuelve el campo `CV`

    if ($cv) {
        // Configurar cabeceras para forzar la descarga del archivo PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="cv_' . $id . '.pdf"');
        header('Content-Length: ' . strlen($cv));

        // Enviar el archivo al navegador para descargarlo
        echo $cv;
        exit;
    } else {
        echo "CV no encontrado.";
    }
} else {
    echo "ID no proporcionado.";
}
?>
