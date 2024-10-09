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

    if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['btncrear'])){

        $conn = getDatabaseConnection();

        $Nombre= $_POST['Nombretxt'];
        $Apellidos= $_POST['Appellidos'];
        $Puesto= $_POST['Puestotxt'];
        $Usuario= $_POST['Usuariotxt'];
        $Clave= $_POST['Clavetxt'];
        $Rol= 3;
        $Estado='Activo';

        $sql="INSERT INTO usuarios (NombreEmpleado, ApellidosEmpleado, Puesto, Clave, Usuario, Rol, Estado) VALUES 
                                   (:nombre, :apellidos, :puesto, :clave, :usuario, :rol, estado)";


        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $Nombre);
        $stmt->bindParam(':apellidos', $Apellidos);
        $stmt->bindParam(':puesto', $Puesto);
        $stmt->bindParam(':clave', $Clave);
        $stmt->bindParam(':usuario', $Usuario);
        $stmt->bindParam(':rol', $Rol);
        $stmt->bindParam(':estado', $Estado);

        if ($stmt->execute()) {
            echo '<script language="javascript">alert("El empleado se creado correctamente correctamente");</script>';
            echo '<script language="javascript">location.href = "CrearUsuario.php";</script>';
        } else {
            echo "Error: No se pudo crear el usuario.";
            }
        
    }
}








?>