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
    $stmt = $conexion->prepare("SELECT IdUsuario, Clave, Usuario, Rol, NombreEmpleado, ApellidosEmpleado, Puesto, Estado
                                FROM usuarios WHERE Usuario = ?");
    $stmt->bind_param("s", $Correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si el usuario existe
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();

        // Verificar si el usuario está activo
        if ($fila['Estado'] == 'Activo') {
            // Comparar la contraseña ingresada con la almacenada
            if (password_verify($Password,$fila['Clave'])) {
                // Almacenar información en la sesión
                $_SESSION['usuario'] = $fila['Usuario'];
                $_SESSION['rol'] = $fila['Rol']; // Guardar el rol en la sesión
                $_SESSION['NombreEmpleado'] = $fila['NombreEmpleado'];
                $_SESSION['ApellidosEmpleado'] = $fila['ApellidosEmpleado'];
                $_SESSION['Puesto'] = $fila['Puesto'];
                $_SESSION['IdUsuario'] = $fila['IdUsuario']; // Guardamos el IdUsuario en la sesión

                // Insertar en la bitácora la entrada
                $IdUsuario = $fila['IdUsuario'];
                $stmt_bitacora = $conexion->prepare("INSERT INTO bitacora (IdUsuario, FechaEntrada) VALUES (?, NOW())");
                $stmt_bitacora->bind_param("i", $IdUsuario);
                $stmt_bitacora->execute();
                $stmt_bitacora->close();

                // Redirigir según el rol del usuario
                if ($fila['Rol'] == 1) {
                    echo '<script language="javascript">location.href = "/Pages/Menu Admin.php";</script>';
                } elseif ($fila['Rol'] == 2) {
                    echo '<script language="javascript">location.href = "/Pages/Menu RH.php";</script>';
                } elseif ($fila['Rol'] == 3) {
                    echo '<script language="javascript">location.href = "/Pages/Menu Empleado.php";</script>';
                } else {
                    echo '<script language="javascript">alert("Rol no reconocido.");</script>';
                    echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';
                }
            } else {
                echo '<script language="javascript">alert("Contraseña incorrecta.");</script>';
                echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';
            }
        } else {
            echo '<script language="javascript">alert("Usuario inactivo. Contacte al administrador.");</script>';
            echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';
        }
    } else {
        echo '<script language="javascript">alert("El usuario no existe.");</script>';
        echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';
    }

    // Cerrar la consulta
    $stmt->close();
} else {
    echo '<script language="javascript">alert("Error al procesar la solicitud.");</script>';
    echo '<script language="javascript">location.href = "/Pages/Log In.php";</script>';
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
