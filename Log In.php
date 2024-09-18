<!-- Aquí comienza el código HTML -->
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
            background-color: transparent;
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

        input[type=text], input[type=password] {
            width: 30%;
            padding: 12px 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        .button {
            display: block;
            width: 20%;
            padding: 10px;
            background-color: #0060A9;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
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
        <img src="usuario.png" style="width:75px;height:75px;">
        <form method="POST">
            <label for="correo"></label>
            <input type="text" id="correo" name="correo" placeholder="Digite su Correo" required><br>
            <label for="Clave"></label>
            <input type="password" id="Clave" name="Clave" placeholder="Digite su Clave" required><br>
            <input class="button" type="submit" value="Ingresar">
        </form>
    </center>
</div>
<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
function getDatabaseConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "JoSu2002@";
    $dbname = "dbcoarsa";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        exit;}}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['correo']);
    $password = trim($_POST['Clave']);

    if (empty($username) || empty($password)) {
        echo "Por favor complete ambos campos";
        exit;}
    $con = getDatabaseConnection();
    $sql = "SELECT Clave FROM usuarios WHERE Usuario = :username";
    $stms = $con->prepare($sql);
    $stms->bindParam(':username', $username);
    $stms->execute();
    $user = $stms->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        // Hashear la contraseña ingresada por el usuario
        $hashedPassword = hash('sha256', $password);
        // Imprimir los hashes para depuración
        //echo "Hash ingresado: " . $hashedPassword . "<br>";
        //echo "Hash en la base de datos: " . $user['Clave'] . "<br>";
        if ($hashedPassword === $user['Clave']) {
            // Iniciar sesión si el hash coincide
            $_SESSION['username'] = $user['Usuario'];
            ob_end_clean();
            echo "Bienvenido:$username";
            header('Location: PaginaRH.php');
        } else {
            echo "Contraseña incorrecta";}
    } else {
        echo "Usuario no existe";
    }
}
ob_end_flush();
?>
</body>
</html>
