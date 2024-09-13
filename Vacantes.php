<?php 
// Configuración de la conexión a la base de datos
$serverName = "JSM\SQL2022DEV";  // Reemplaza con tu nombre de servidor y puerto
$connectionOptions = array(
    "Database" => "DBCoarsa",
    "Uid" => "sa",
    "PWD" => "SmJ2002@",
    "ConnectionPooling" => false
);

try {
    // Conectar a la base de datos usando PDO
    $conn = new PDO("sqlsrv:server=$serverName;Database=DBCoarsa", $connectionOptions['Uid'], $connectionOptions['PWD']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener los datos de la tabla Vacantes
    $sqlvacante = "SELECT IdPuesto, NombrePuesto FROM Vacantes";
    $stmt = $conn->query($sqlvacante);

    // Obtener los resultados en un array asociativo
    $vacantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Verificar si se obtuvieron resultados
    if (empty($vacantes)) {
        echo "No se encontraron vacantes disponibles.";
    } else {
        echo "Vacantes cargadas correctamente.";
    }

} catch (PDOException $e) {
    echo "Error en la conexión o consulta: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Coarsa</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>
        /* Estilo general del cuerpo */
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(255, 255, 255);
            margin: 0;
            padding: 0;
        }

        /* Encabezado */
        .header {
            background-color: #ffffff;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: rgb(0, 0, 0);
            position: fixed; /* Fija el header en la parte superior */
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000; /* Hace que el header esté por encima de otros elementos */
        }

        .header h1 {
            margin: 0;
            padding-left: 20px;
        }

        .nav-buttons {
            padding-right: 20px;
        }

        .nav-buttons a {
            text-decoration: none;
            color: rgb(0, 0, 0);
            background-color: #ffffff;
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 5px;
            font-size: 20px;
            transition: background-color 0.3s;
        }

        .nav-buttons a:hover {
            background-color: #0060A9;
        }

        /* Contenedor principal */
        .contenedor {
            background-color: #ffd900;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin: 100px auto 20px; /* Alinea el contenedor en el centro con márgenes superiores e inferiores */
        }

        .titulo {
            text-align: center;
            color: #000000;
            margin-bottom: 20px;
        }

        .texto {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }

        .button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #0060A9;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
        }

        .contenedor button:hover {
            background-color: #004c8c;
        }
        input[type=text] {
            width: 30%;
            padding: 12px 10px;
            margin: 8px 0;
            box-sizing: line;
          }
    </style>
</head>
<body>

<div class="header">
    <h1>Coarsa</h1>
    <div class="nav-buttons">
        <a href="Quienes Somos.php">Quiénes Somos</a>
        <a href="Vacantes.php">Trabaje con Nosotros</a>
        <a href="Log In.php">Ingresar</a>
    </div>
</div>

<div class="contenedor">
    <center>
        <h2 class="titulo">Trabaje para Nosotros</h2>
        <p class="texto">SI desea formar parte de Coarsa complete este formulario y con gusto
            será tomado en cuenta para próximas vacantes.
        </p>
        <form method="post" action="" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre" required><br>
        Email: <input type="email" name="email" required><br>
        Apellidos: <input type="text" name="apellidos" required><br>
        Teléfono: <input type="text" name="telefono" required><br>
        Área de Interés: <input type="text" name="area_interes" required><br>
        CV: <input type="file" name="CV" accept=".pdf, .doc, .docx" required><br>
        <input type="submit" value="Enviar">
        </form>
    </center>
</div>

<!-- Código PHP para manejo de archivo y envío de correo -->

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Requiere los archivos de PHPMailer
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/PHPMailer-master/src/Exception.php';

$serverName = "JSM\SQL2022DEV";  // Reemplaza con tu nombre de servidor y puerto
$connectionOptions = array(
    "Database" => "DBCoarsa",
    "Uid" => "sa",
    "PWD" => "SmJ2002@",
    "ConnectionPooling" => false
);

try {
    // Conectar a la base de datos usando PDO
    $conn = new PDO("sqlsrv:server=$serverName;Database=DBCoarsa", $connectionOptions['Uid'], $connectionOptions['PWD']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = isset($_POST['nombre']) ? mb_convert_encoding($_POST['nombre'], 'UTF-8') : null;
        $email = isset($_POST['email']) ? mb_convert_encoding($_POST['email'], 'UTF-8') : null;
        $apellidos = isset($_POST['apellidos']) ? mb_convert_encoding($_POST['apellidos'], 'UTF-8') : null;
        $telefono = isset($_POST['telefono']) ? mb_convert_encoding($_POST['telefono'], 'UTF-8') : null;
        $area_interes = isset($_POST['area_interes']) ? mb_convert_encoding($_POST['area_interes'], 'UTF-8') : null;

        if (isset($_FILES['CV']) && $_FILES['CV']['error'] === UPLOAD_ERR_OK) {
            $cv_data = file_get_contents($_FILES["CV"]["tmp_name"]);

            $sql = "INSERT INTO postulantes (Nombre, Apellidos, Correo, Telefono, CV, IdPuesto) VALUES 
                    (:nombre, :apellidos, :email, :telefono, :cv_data, :area_interes)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':area_interes', $area_interes);
            $stmt->bindParam(':cv_data', $cv_data, PDO::PARAM_LOB);

            if ($stmt->execute()) {
                echo "Sus datos se han guardado correctamente.";

                // Enviar correo electrónico
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();                                       // Configuración del servidor SMTP
                    $mail->Host       = 'smtp.gmail.com';  
                    $mail->SMTPAuth   = true;                             
                    $mail->Username   = 'josanzm2002@gmail.com';            
                    $mail->Password   = 'ijvf vduh lbbt mqqy';  
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                    $mail->Port       = 587;                             

                    // Remitente
                    $mail->setFrom('josanzm2002@gmail.com', 'Nombre Remitente');

                    // Destinatario
                    $mail->addAddress('fersaint66@gmail.com', 'Recursos humanos');

                    // Contenido del correo
                    $mail->isHTML(true);
                    $mail->Subject = "Nueva aplicación de trabajo";
                    $mail->Body    = "Se ha recibido una nueva solicitud de trabajo<br>" .
                                      "Nombre: $nombre<br>" .
                                      "Apellidos: $apellidos<br>" .
                                      "Correo: $email<br>" .
                                      "Teléfono: $telefono<br>" .
                                      "Puesto para el que aplica: $area_interes<br><br>" .
                                      "Adjunto el CV de la persona que aplica.";

                    // Adjuntar el archivo
                    $mail->addStringAttachment($cv_data, $_FILES["CV"]["name"]); 

                    // Enviar el correo
                    $mail->send();
                    echo "Correo enviado correctamente.";
                } catch (Exception $e) {
                    echo "Error al enviar el correo: {$mail->ErrorInfo}";
                }
            } else {
                echo "Error: No se guardaron los datos correctamente.";
            }
        } else {
            echo "Error: No se recibió el archivo CV o se produjo un error al subirlo.";
        }
    }
} catch (PDOException $e) {
    echo "Error en la conexión o consulta: " . $e->getMessage();
}
?>




</body>
</html>
