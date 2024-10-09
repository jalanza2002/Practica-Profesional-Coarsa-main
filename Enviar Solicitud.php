<!DOCTYPE html>
<html lang="es">
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

function puedeEnviarSolicitud($correo) {
    $conn = getDatabaseConnection();

    // Consultar la última solicitud del usuario por correo
    $sql = "SELECT Solicitud, Estado, FechaSolicitud, Solicitud FROM solicitudes WHERE CorreoEmpleado = :correo ORDER BY FechaSolicitud DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $estado = $resultado['Estado'];
        $fechaSolicitud = new DateTime($resultado['FechaSolicitud']);
        $fechaActual = new DateTime();
        $tipoSolicitud = $resultado['Solicitud'];

        if ($estado === 'Aprobado') {
            if ($tipoSolicitud === 'Prestamo') {
                // Verificar si han pasado 3 meses desde la fecha de aprobación para préstamos
                $diferenciaMeses = $fechaSolicitud->diff($fechaActual)->m + ($fechaSolicitud->diff($fechaActual)->y * 12);
                if ($diferenciaMeses < 3) {
                    echo '<script language="javascript">alert("Debe esperar tres meses para poder enviar otra solicitud de préstamo.");</script>';
                    echo '<script language="javascript">location.href = "PaginaEmpleado.php";</script>';
                    return false;
                }
            }
            // Si es vacaciones, no aplica la restricción de los tres meses
            else if ($tipoSolicitud === 'Vacaciones') {
                // No hay restricción, puede enviar otra solicitud
                return true;
            }
        } elseif ($estado === 'Revision') {
            echo '<script language="javascript">alert("Tiene una solicitud pendiente. Debe esperar a que se revise.");</script>';
            echo '<script language="javascript">location.href = "PaginaEmpleado.php";</script>';
            return false;
        }
    }

    // Si no hay restricciones, puede enviar una nueva solicitud
    return true;
}



function Enviar_Solicitud() {
    
    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['Enviarbtn'])){

        if (!isset($_POST['acepta_terminos'])) {
            echo '<script language="javascript">alert("Debe aceptar los Términos y Condiciones para continuar.");</script>';
            echo '<script language="javascript">history.back();</script>'; // Regresar al formulario
            exit();} // Detener el script

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

    if(!puedeEnviarSolicitud($Correo))
    {
        return;
    }
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
        $url="www.coarsa.com";
    
        // Crear una nueva instancia de PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username   = 'portalcoarsacr@gmail.com'; // Cambia a tu correo
            $mail->Password   = 'ltdu hhhm jxwn ymst';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port = 587;
    
            // Correo a Recursos Humanos
            $mail->setFrom('portalcoarsacr@gmail.com', 'Nueva solicitud');
            $mail->addAddress('kimberly.montoya@coarsacr.com', 'Nueva solicitud');
            
            // Contenido del correo para RRHH
            $mail->isHTML(true); 
            $mail->Subject = 'Nueva solicitud de empleo';
            $mail->Body = "
                <p>Hola Recursos Humanos,</p>
                <p>Una nueva solicitud por parte del empleado:</p>
                <p>Nombre Completo: {$nombre} {$apellidos}</p>
                <p>Solicitud a revisar: {$solicitud}</p>
                <p>Correo: {$correo}</p>
            ";
            $mail->send();
    
            // Envío de confirmación al Empleado
            $mail->clearAddresses();
            $mail->addAddress($correo, "{$nombre} {$apellidos}");
            $mail->Subject = 'Confirmación de su solicitud';
            $mail->Body = "
                <p>Estimado {$nombre},</p>
                <p>Su solicitud de {$solicitud} ha sido recibida exitosamente. Nos pondremos en contacto con usted pronto.</p>
                <p>Para cualquier otra informacion visite la pagina {$url}</p>
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
