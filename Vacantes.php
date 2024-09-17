<?php 
// Configuración de la conexión a la base de datos
function getVacantesConnection() {
    $servername = "localhost"; // Cambia esto según tu configuración
    $username = "root";        // Cambia esto según tu configuración
    $password = "JoSu2002@";   // Cambia esto según tu configuración
    $dbname = "dbcoarsa"; // Cambia esto por el nombre de tu base de datos

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlvacante="Select IdPuesto, Puesto from vacantes";
        $stmt=$conn->query($sqlvacante);
        $vacantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(empty($vacantes)){
            echo "No hay vacantes disponibles";
        }else{
            echo "Vacantes cargadas correctamente";
        }
        return $vacantes;

    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        return[];
    }
}

$vacantes = getVacantesConnection();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Coarsa</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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
        <center>
        <form method="POST" action="" enctype="multipart/form-data">
                <label for="Nombre">Nombre:</label>
                <input type="text" id="Nombre" name="txtNombre" placeholder="Ingrese su nombre" required><br>

                <label for="Apellidos">Apellidos:</label>
                <input type="text" id="Apellidos" name="txtApellidos" placeholder="Ingrese sus apellidos" required><br>

                <label for="Correo">Correo:</label>
                <input type="email" id="Correo" name="txtCorreo" placeholder="Ingrese su correo" required><br><br>

                <label for="Telefono">Teléfono:</label>
                <input type="tel" id="Telefono" name="txtTelefono" placeholder="Ingrese su teléfono" required><br><br>

                <label for="Puesto">Puesto:</label>
                <select name="txtPuesto" id="Puesto" required placeholder="Ingrese el puesto que desea aplicar">
                    <option>Ingrese el puesto que desea postularse</option>
                    <?php 
                        if (!empty($vacantes)) {
                            foreach ($vacantes as $vacante) {
                                echo "<option value=\"" . htmlspecialchars($vacante['IdPuesto']) . "\">" . htmlspecialchars($vacante['Puesto']) . "</option>";
                            }
                        } else {
                            echo "<option value=''>No hay vacantes disponibles</option>";
                        }
                    ?>
                </select><br><br>

                <label for="CV">CV (PDF):</label>
                <input type="file" id="CV" name="txtCV" accept="application/pdf" required><br><br>

                <input type="submit" class="button" name="btnGuardar" value="Guardar"><br><br>
        </form>
    </center>
    <br>
    <!-- Método POST para agregar el participante a la base de datos -->
    <?php
    // Función para establecer la conexión a la base de datos
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

    // Función para guardar los datos del participante
    function guardar_datos() {
        $conn = getDatabaseConnection();

        // Obtener datos del formulario
        $nombre = $_POST['txtNombre'];
        $apellidos = $_POST['txtApellidos'];
        $correo = $_POST['txtCorreo'];
        $telefono = $_POST['txtTelefono'];
        $puesto = $_POST['txtPuesto'];
        $cv_data = file_get_contents($_FILES['txtCV']['tmp_name']);

        // Preparar la consulta SQL
        $sql = "INSERT INTO participantes (Nombre, Apellidos, Correo, Telefono,Puesto, CV) VALUES (:nombre, :apellidos, :correo, :telefono,:puesto, :cv_data)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':puesto',$puesto);
        $stmt->bindParam(':cv_data', $cv_data, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            echo "Sus datos se han guardado correctamente.";
        } else {
            echo "Error: No se pudieron guardar los datos.";
        }
    }

    if (isset($_POST['btnGuardar'])) {
        // Validar el nombre
        if (empty($_POST['txtNombre'])) {
            echo "El campo Nombre es obligatorio.";
        }

        // Validar los apellidos
        else if (empty($_POST['txtApellidos'])) {
            echo "El campo Apellidos es obligatorio.";
        }

        // Validar el correo
        else if (!filter_var($_POST['txtCorreo'], FILTER_VALIDATE_EMAIL)) {
            echo "El correo electrónico proporcionado no es válido.";
        }

        // Validar el teléfono (opcionalmente, podrías usar expresiones regulares para validar formato)
        else if (empty($_POST['txtTelefono'])) {
            echo "El número de teléfono es valido.";
        }

        else if(empty($_POST['txtPuesto'])){
            echo "No ha selecionado ningun puesto";
        }

        // Validar el archivo CV
        else if (isset($_FILES['txtCV']) && $_FILES['txtCV']['error'] === UPLOAD_ERR_OK) {
            $allowed_types = ['application/pdf'];
            $file_type = mime_content_type($_FILES['txtCV']['tmp_name']);
            $file_size = $_FILES['txtCV']['size'];

            if (!in_array($file_type, $allowed_types)) {
                echo "Error: Solo se permiten archivos PDF.";
            } else if ($file_size > 5 * 1024 * 1024) { // 5MB máximo
                echo "Error: El archivo es demasiado grande. El límite es de 5MB.";
            } else {
                // Si todo está bien, llamar a la función para guardar los datos
                guardar_datos();
            }
        } else {
            echo "Error: No se recibió el archivo CV o se produjo un error al subirlo.";
        }
    }
    ?>

<!-- Enviar un correo de que su solicitud se ha completado-->

<?php 
// Usar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_SERVER['REQUEST_METHOD']=='POST'){
require 'C:/xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'C:/xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/PHPMailer-master/PHPMailer-master/src/SMTP.php';
require 'C:/xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/PHPMailer-master/PHPMailer-master/src/Exception.php';


$nombre = $_POST['txtNombre'];
$apellidos=$_POST['txtApellidos'];
$correo=$_POST['txtCorreo'];
$puesto=$_POST['txtPuesto'];
$cv=$_POST['txtCV'];
if (isset($_FILES['txtCV']) && $_FILES['txtCV']['error'] === UPLOAD_ERR_OK) {
    $cv = $_FILES['txtCV'];
} else {
    echo "Error: No se ha subido el archivo o se ha producido un error.";
    exit;
}

$mail = new PHPMailer(true);
//ijvf vduh lbbt mqqy-mi contraseña de enviar correos
try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'empleoscoarsacr@gmail.com'; // Tu correo de Gmail
    $mail->Password = 'lbxo hfhk milf tafp'; // Contraseña de tu correo de Gmail o app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Cifrado TLS
    $mail->Port = 587; // Puerto SMTP de Gmail

    $mail->setFrom('josanzm2002@gmail.com', 'Solicitud de empleo');
    $mail->addAddress('empleoscoarsacr@gmail.com', 'Grupo Coarsa');
    // Contenido del correo
    $mail->isHTML(true); // Establecer el correo en formato HTML
    $mail->Subject = 'Nueva solicitud de empleo';
    $mail->Body = "
        <p>Hola Recursos Humanos un nuevo candidato esta aplicando.</p>
        <p> Puesto: {$puesto}</p>
        <p> Nombre Completo: {$nombre}{$apellidos}</p>
        <p> Correo: {$correo}</p>
        <p>Para cualquier informacion se le adjunta el CV
    ";
    $mail->addAttachment($cv['tmp_name'],$cv['name']);
    // Enviar el correo
    $mail->send();
    echo 'El correo ha sido enviado correctamente';
} catch (Exception $e) {
    echo "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
}
}

?>
</body>
</html>
