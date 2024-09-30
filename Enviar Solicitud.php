<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php 
 function getDatabaseConnection() {
    $servername = "localhost"; // Cambia esto según tu configuración
    $username = "root";        // Cambia esto según tu configuración
    $password = "JoSu2002@";   // Cambia esto según tu configuración
    $dbname = "dbcoarsa"; // Cambia esto por el nombre de tu base de datos

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        exit;
    }
}

function Enviar_Solicitud() {
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['Enviarbtn'])){
    $conn = getDatabaseConnection();

    // Obtener datos del formulario
    $Nombre = $_POST['Nombretxt'];
    $Apellidos = $_POST['Apellidostxt'];
    $Solicitud = $_POST['Solicitudtxt'];
    $Entrada_Vaca = $_POST['fechatxt'];
    $Entrada_Traba = $_POST['Entradatxt'];
    $Descripcion = $_POST['Descripciontxt'];
    $Estado = 'Revision';

    // Preparar la consulta SQL
    $sql = "INSERT INTO solicitudes (Nombre, Apellidos, Solicitud, EntradaVacaciones, EntradaTrabajo, Descripción, Estado) 
    VALUES (:nombre, :apellidos, :solicitud, :EntradaVaca, :EntradaTra, :Descripcion, :Estado)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $Nombre);
    $stmt->bindParam(':apellidos', $Apellidos);
    $stmt->bindParam(':solicitud', $Solicitud);
    $stmt->bindParam(':EntradaVaca', $Entrada_Vaca);
    $stmt->bindParam(':EntradaTra',$Entrada_Traba);
    $stmt->bindParam(':Descripcion', $Descripcion);
    $stmt->bindParam(':Estado', $Estado);

    if ($stmt->execute()) {
        echo '<script language="javascript">alert("Su solicitud ha sido ennviada correctamente");</script>';
        echo '<script language="javascript">location.href = "PaginaEmpleado.php";</script>';
    } else {
        echo "Error: No se pudo enviar la solicitud.";
        }
    }
}
Enviar_Solicitud();

//Funcion para salir de la pagina de Recursos Humanos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salirbtn'])) {
    session_start(); // Asegúrate de iniciar la sesión para poder destruirla
    session_destroy(); // Destruir la sesión actual
    echo '<script language="javascript">location.href = "Log In.php";</script>'; // Redirigir a la página de inicio de sesión
    exit(); // Asegurarse de que el script se detenga
        }











?>