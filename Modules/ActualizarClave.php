<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar contraseña empleado</title>
</head>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Correotxt']) && isset($_POST['Clavetxt'])) {
    // Obtener los datos del formulario
    $correo = $_POST['Correotxt'];
    $nuevaClave = $_POST['Clavetxt'];

    $pass= password_hash($nuevaClave, PASSWORD_DEFAULT);
    // Función para obtener la conexión a la base de datos
    function getDataBaseConnection(){
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
            exit;
        }
    }

    // Función para actualizar la clave en la base de datos
    function ActualizarClave($correo, $pass){
        $conn = getDataBaseConnection();
        $sql = "UPDATE usuarios SET Clave = :nuevaclave WHERE Usuario = :correo";  // Correo se usa como identificador en este caso
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nuevaclave', $pass);
        $stmt->bindParam(':correo', $correo);

        if ($stmt->execute()) {
            echo '<script language="javascript">location.href = "/Pages/FinalizacionTarea_Clave_Usuario";</script>';
        } else {
            echo '<script language="javascript">alert("La clave no actualizo correctamente.");</script>';
            echo '<script language="javascript">location.href = "/Pages/Datos Empleado.php";</script>';
        }
    }

    // Llamar a la función para actualizar la clave
    ActualizarClave($correo, $pass);
} else {
    echo '<script language="javascript">alert("Error no se recibio ningun dato.");</script>';
    echo '<script language="javascript">location.href = "/Pages/Datos Empleado.php";</script>';
}

?>


</html>