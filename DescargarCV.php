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
    } catch (Exception $e) {
        echo "Error de conexión: " . $e->getMessage();
        exit;
    }
}


//hacemos la consulta 
if(isset($_GET['IdParticipante'])){
    $id=intval($_GET['IdParticipante']);

    $conn= getDatabaseConnection();
    $stmt = $conn->prepare("Call ObtenerCV(:p_id)");
    $stmt->bindParam(':p_id',$id);
    $stmt->execute();

    $cv= $stmt->fetchColumn();
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="cv.pdf"');
}

