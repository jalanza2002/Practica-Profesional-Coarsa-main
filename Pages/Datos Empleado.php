<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    echo "Error: No hay una sesión activa.";
    exit();
}
$correoUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
$nombreUsuario = isset($_SESSION['NombreEmpleado']) ? $_SESSION['NombreEmpleado'] : '';
$apellidosUsuario = isset($_SESSION['ApellidosEmpleado']) ? $_SESSION['ApellidosEmpleado'] : '';
$puestoUsuario = isset($_SESSION['Puesto']) ? $_SESSION['Puesto'] : '';
$claveUsuario = isset($_SESSION['Clave'])? $_SESSION['Clave']: '';
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/Estilo Tabla.css">
    <title>Informacion Personal</title>
</head>
<body>
<header class="header">
        <a href="Menu Empleado.php">
            <img src="/Estilos/images/fecha atras.png" alt="12px" class="back-arrow">
        </a>
        <img src="/Estilos/images/Logo Coarsa con slogan png.png" alt="Logo de Coarsa"> <!-- Asegúrate de cambiar "logo.png" por la ruta correcta de tu logo -->
        <a href="logout.php" class="logout">Cerrar sesión</a>
    </header>
    <center>
        <h1>Mis Datos Personales</h1>
        <br>
        <form action="/Modules/ActualizarClave.php" method="post">
        <label for="Nombre"></label>
        <input type="text" name="Nombretxt" id="Nombretxt" value="<?php echo $nombreUsuario ?>" readonly><br>
        <br>
        <label for="Apellidos"></label>
        <input type="text" name="Apellidostxt" id="Apellidostxt" value="<?php echo $apellidosUsuario ?>" readonly><br>
        <br>
        <label for="Correo"></label>
        <input type="text" name="Correotxt" id="Correotxt" value="<?php echo $correoUsuario ?>" readonly><br>
        <br>
        <label for="Puestotxt"></label>
        <input type="text" name="Puestotxt" id="Puestotxt" value="<?php echo $puestoUsuario ?>" readonly><br>
        <br>
        <label for="Clavetxt"></label>
        <input type="text" name="Clavetxt" id="Clavetxt" value="<?php echo $claveUsuario ?>" required><br>
        
        <br>
        <input type="submit" name="Actualizarbtn" id="Actualizarbtn" value="Actualizar contraseña">
        </form>
    </center>
</body>
</html>