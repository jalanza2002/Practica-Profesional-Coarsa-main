<?php
session_start(); // Iniciar la sesión

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

// Verificar si se hizo clic en el botón de ingresar
if (isset($_POST['Ingresarbtn'])) {
    // Obtener los datos ingresados
    $Correo = trim($_POST['Usuariotxt']);
    $Password = trim($_POST['Clavetxt']);

    // Preparar la consulta para evitar inyección SQL
    $stmt = $conexion->prepare("SELECT Clave, Usuario, Rol, NombreEmpleado, ApellidosEmpleado,
                                Puesto FROM usuarios WHERE Usuario = ?");
    $stmt->bind_param("s", $Correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si el usuario existe
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();

        // Comparar la contraseña ingresada con la almacenada
        if ($fila['Clave'] === $Password) {
            // Almacenar información en la sesión
            $_SESSION['usuario'] = $fila['Usuario'];
            $_SESSION['rol'] = $fila['Rol']; // Guardar el rol en la sesión
            $_SESSION['NombreEmpleado']= $fila['NombreEmpleado'];
            $_SESSION['ApellidosEmpleado']= $fila['ApellidosEmpleado'];
            $_SESSION['Puesto']= $fila['Puesto'];


            // Redirigir según el rol del usuario
            if ($fila['Rol'] == 2) {
                // Redirigir a la página de Recursos Humanos
                echo '<script language="javascript">location.href = "Menu RH.php";</script>';
            } elseif ($fila['Rol'] == 3) {
                // Redirigir a la página de Empleado
                echo '<script language="javascript">location.href = "Menu Empleado.php";</script>';
            } else {
                echo '<script language="javascript">alert("Rol no reconocido.");</script>';
                echo '<script language="javascript">location.href = "Log In.php";</script>';
            }
        } else {
            echo '<script language="javascript">alert("Contraseña incorrecta.");</script>';
            echo '<script language="javascript">location.href = "Log In.php";</script>';
        }
    } else {
        echo '<script language="javascript">alert("El usuario no existe.");</script>';
        echo '<script language="javascript">location.href = "Log In.php";</script>';
    }

    // Cerrar la consulta
    $stmt->close();
} else {
    echo '<script language="javascript">alert("Error al procesar la solicitud.");</script>';
    echo '<script language="javascript">location.href = "Log In.php";</script>';
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
