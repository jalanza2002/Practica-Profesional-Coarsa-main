<?php 
function getDatabaseConnection(){

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

function CrearUsuario(){

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btncrear'])){

        $conn = getDatabaseConnection();

        $Nombre = $_POST['Nombretxt'];
        $Apellidos = $_POST['Apellidostxt'];
        $Puesto = $_POST['Puestotxt'];
        $Usuario = $_POST['Usuariotxt'];
        $Clave = $_POST['Clavetxt'];
        $Rol = 3;
        $Estado = 'Activo';

        // encriptación de la contraseña
        $pass = password_hash($Clave, PASSWORD_DEFAULT);

        // Verificar si el usuario ya existe en la base de datos
        $sqlVerificarUsuario = "SELECT COUNT(*) FROM usuarios WHERE Usuario = :usuario";
        $stmtVerificarUsuario = $conn->prepare($sqlVerificarUsuario);
        $stmtVerificarUsuario->bindParam(':usuario', $Usuario);
        $stmtVerificarUsuario->execute();
        $usuarioExiste = $stmtVerificarUsuario->fetchColumn();

        if ($usuarioExiste > 0) {
            // Si el usuario ya existe, mostrar un mensaje de error
            echo '<script language="javascript">alert("El nombre de usuario ya existe. Por favor, elige otro.");</script>';
            echo '<script language="javascript">location.href = "/Pages/CrearUsuario.php";</script>';
        } else {
            // Verificar si la contraseña ingresada ya existe
            $sqlVerificarClave = "SELECT Clave FROM usuarios";
            $stmtVerificarClave = $conn->prepare($sqlVerificarClave);
            $stmtVerificarClave->execute();
            $contrasenas = $stmtVerificarClave->fetchAll(PDO::FETCH_ASSOC);

            $claveExistente = false;
            foreach ($contrasenas as $fila) {
                // Usar password_verify para comparar las contraseñas encriptadas
                if (password_verify($Clave, $fila['Clave'])) {
                    $claveExistente = true;
                    break;
                }
            }

            if ($claveExistente) {
                echo '<script language="javascript">alert("La contraseña ingresada ya ha sido utilizada. Por favor, elige otra.");</script>';
                echo '<script language="javascript">location.href = "/Pages/CrearUsuario.php";</script>';
            } else {
                // Si la contraseña no existe, proceder con la inserción
                $sql = "INSERT INTO usuarios (NombreEmpleado, ApellidosEmpleado, Puesto, Clave, Usuario, Rol, Estado) VALUES 
                                           (:nombre, :apellidos, :puesto, :clave, :usuario, :rol, :estado)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nombre', $Nombre);
                $stmt->bindParam(':apellidos', $Apellidos);
                $stmt->bindParam(':puesto', $Puesto);
                $stmt->bindParam(':clave', $pass);
                $stmt->bindParam(':usuario', $Usuario);
                $stmt->bindParam(':rol', $Rol);
                $stmt->bindParam(':estado', $Estado);

                if ($stmt->execute()) {
                    echo '<script language="javascript">alert("El empleado se creó correctamente.");</script>';
                    echo '<script language="javascript">location.href = "/Pages/CrearUsuario.php";</script>';
                } else {
                    echo "Error: No se pudo crear el usuario.";
                }
            }
        }
    }
}
?>
