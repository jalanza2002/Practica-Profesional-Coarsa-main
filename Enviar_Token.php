<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
if (isset($_POST['solicitarRestablecimiento'])) {
    $correo = trim($_POST['correo']);

    // Verificar si el correo existe en la base de datos
    $stmt = $conexion->prepare("SELECT IdUsuario FROM usuarios WHERE Usuario = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $idUsuario = $fila['IdUsuario'];

        // Generar un token único
        $token = bin2hex(random_bytes(16)); // Genera un token de 32 caracteres
        $fechaExpiracion = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token válido por 1 hora

        // Almacenar el token en la base de datos
        $stmt_token = $conexion->prepare("INSERT INTO restablecer_contrasena (IdUsuario, Token, FechaExpiracion) VALUES (?, ?, ?)");
        $stmt_token->bind_param("iss", $idUsuario, $token, $fechaExpiracion);
        $stmt_token->execute();
        $stmt_token->close();

        // Enviar el correo con PHPMailer
        require 'vendor/autoload.php'; // Asegúrate de que la ruta sea correcta
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
            $mail->setFrom('portalcoarsacr@gmail.com', 'Grupo Coarsa'); // Cambia por tu nombre
            $mail->addAddress($correo);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Restablecimiento de Contraseña';
            $enlace = "http://localhost:3000/PagActualizarClave.php?token=$token"; // Cambia tu-dominio.com
            $mail->Body = "Haz clic en el siguiente enlace para restablecer tu contraseña: <a href='$enlace'>$enlace</a>";

            // Enviar el correo
            $mail->send();
            echo '<script language="javascript">alert("Se ha enviado un enlace para restablecer tu contraseña a tu correo.");</script>';
            echo '<script language="javascript">location.href = "Log In.php";</script>';
        } catch (Exception $e) {
            echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "El correo no está registrado.";
    }

    // Cerrar la consulta
    $stmt->close();
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>