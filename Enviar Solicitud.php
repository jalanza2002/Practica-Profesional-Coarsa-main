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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/PHPMailer-master/PHPMailer-master/src/SMTP.php';
require 'C:/xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/PHPMailer-master/PHPMailer-master/src/Exception.php';

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
    $Correo = $_POST['Correotxt'];
    $Nombre = $_POST['Nombretxt'];
    $Apellidos = $_POST['Apellidostxt'];
    $Puesto = $_POST['Puestotxt'];
    $Solicitud = $_POST['Solicitudtxt'];
    $Entrada_Vaca = $_POST['fechatxt'];
    $Entrada_Traba = $_POST['Entradatxt'];
    $prestamo = $_POST['Prestamotxt'];
    $Descripcion = $_POST['Descripciontxt'];
    $Estado = 'Revision';

    // Preparar la consulta SQL
    $sql = "INSERT INTO solicitudes (CorreoEmpleado, Nombre, Apellidos, Puesto, Solicitud, Monto, EntradaVacaciones, EntradaTrabajo, Descripción, Estado) 
            VALUES (:correo, :nombre, :apellidos, :puesto, :solicitud, :prestamo, :EntradaVaca, :EntradaTra, :Descripcion, :Estado)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $Correo);
    $stmt->bindParam(':nombre', $Nombre);
    $stmt->bindParam(':apellidos', $Apellidos);
    $stmt->bindParam(':puesto', $Puesto);
    $stmt->bindParam(':solicitud', $Solicitud);
    $stmt->bindParam(':prestamo', $prestamo);
    $stmt->bindParam(':EntradaVaca', $Entrada_Vaca);
    $stmt->bindParam(':EntradaTra',$Entrada_Traba);
    $stmt->bindParam(':Descripcion', $Descripcion);
    $stmt->bindParam(':Estado', $Estado);

    if ($stmt->execute()) {
        echo '<script language="javascript">alert("Su solicitud ha sido enviada correctamente");</script>';
        echo '<script language="javascript">location.href = "PaginaEmpleado.php";</script>';
    } else {
        echo "Error: No se pudo enviar la solicitud.";
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Enviarbtn'])) {
        // Obtener los datos del formulario
        $correo = $_POST['Correotxt'];
        $nombre = $_POST['Nombretxt'];
        $apellidos = $_POST['Apellidostxt'];
        $solicitud = $_POST['Solicitudtxt'];
        $prestamo = $_POST['Prestamotxt'];
    
        // Crear una nueva instancia de PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'empleoscoarsacr@gmail.com'; 
            $mail->Password = 'lbxo hfhk milf tafp'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port = 587;
    
            // Correo a Recursos Humanos
            $mail->setFrom('empleoscoarsacr@gmail.com', 'Nueva solicitud');
            $mail->addAddress('kimberly.montoya@coarsacr.com', 'Grupo Coarsa');
            
            // Contenido del correo para RRHH
            $mail->isHTML(true); 
            $mail->Subject = 'Nueva solicitud de empleo';
            $mail->Body = "
                <p>Hola Recursos Humanos,</p>
                <p>Una nueva solicitud por parte del empleado:</p>
                <p>Nombre Completo: {$nombre} {$apellidos}</p>
                <p>Solicitud a revisar: {$solicitud}</p>
                <p>Correo: {$correo}</p>
                <p>Para cualquier información se le adjunta el CV</p>
            ";
            $mail->send();
    
            // Envío de confirmación al Empleado
            $mail->clearAddresses();
            $mail->addAddress($correo, "{$nombre} {$apellidos}");
            $mail->Subject = 'Confirmación de su solicitud';
            $mail->Body = "
                <p>Estimado {$nombre},</p>
                <p>Su solicitud de {$solicitud} ha sido recibida exitosamente. Nos pondremos en contacto con usted pronto.</p>
                <p>Para cualquier otra informacion visitenos al</p>
            ";
            
            $mail->send();
            
            echo '<script language="javascript">alert("Su solicitud ha sido enviada correctamente");</script>';
            echo '<script language="javascript">location.href = "PaginaEmpleado.php";</script>';
        } catch (Exception $e) {
            echo "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
        }
    } else {
        // Si no se envió el formulario, redirigir a la página del formulario
        header('Location: Log In.php');
        exit();
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
