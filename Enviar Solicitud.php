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
    $sql = "INSERT INTO solicitudes (Nombre, Apellidos, Solicitud, EntradaVacaciones, EntradaTrabajo, Descripcion, Estado) 
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
        echo "Su Solicitud se ha enviado correctamente.";
    } else {
        echo "Error: No se pudo enviar la solicitud.";
        }
    }else{
        echo"Error: no se puede conectar con el servidor";
    }
}

//Funcion para salir de la pagina de Recursos Humanos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnsalir'])) {
    session_start(); // Asegúrate de iniciar la sesión para poder destruirla
    session_destroy(); // Destruir la sesión actual
    header('Location: Log In.php'); // Redirigir a la página de inicio de sesión
    exit(); // Asegurarse de que el script se detenga
        }











?>