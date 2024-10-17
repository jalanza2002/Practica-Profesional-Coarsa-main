<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/PHPMailer-master/PHPMailer-master/src/SMTP.php';
require 'C:/xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/PHPMailer-master/PHPMailer-master/src/Exception.php';

// Configuración de la base de datos
$servidor = "localhost";
$NombreUsuario = "root";
$Clave = "JoSu2002@";
$BD = "dbCoarsa";

// Conexión a la base de datos
$conexion = new mysqli($servidor, $NombreUsuario, $Clave, $BD);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si se hizo clic en el botón de solicitar restablecimiento
if (isset($_POST['btnenviar'])) {
    $correo = trim($_POST['txtcorreo']);

    // Verificar si el correo existe en la base de datos
    $stmt = $conexion->prepare("SELECT IdUsuario,Estado FROM usuarios WHERE Usuario = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {

        $fila= $resultado->fetch_assoc();
        $Estado=$fila['Estado'];

        if($Estado==='Activo'){
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor de correo
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'portalcoarsacr@gmail.com'; 
            $mail->Password = 'ltdu hhhm jxwn ymst'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port = 587;

            // Remitente y destinatario
            $mail->setFrom('portalcoarsacr@gmail.com', 'Grupo Coarsa');
            $mail->addAddress($correo);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Restablecimiento de Contraseña';
            $enlace = "http://localhost:3000/Pages/PagActualizarClave.php"; // Cambia a la URL de tu página para actualizar la contraseña
            $mail->Body = "Haz clic en el siguiente enlace para restablecer tu contraseña: <a href='$enlace'>$enlace</a>";

            // Enviar el correo
            $mail->send();
            echo '<script language="javascript">alert("Se ha enviado un enlace para restablecer tu contraseña a tu correo.");</script>';
            echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';
        } catch (Exception $e) {
            echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
        }
    }else{
        '<script language="javascript">alert("Su cuenta esta inactiva.");</script>';
        echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';
    }
    } else {
        '<script language="javascript">alert("Error Correo no registrado.");</script>';
        echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';
    }

    // Cerrar la consulta
    $stmt->close();
}
// Cerrar la conexión a la base de datos
$conexion->close();
?>
