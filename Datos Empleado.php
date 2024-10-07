<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    echo "Error: No hay una sesión activa.";
    exit();
/*
$correoUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
$nombreUsuario = isset($_SESSION['NombreEmpleado']) ? $_SESSION['NombreEmpleado'] : '';
$apellidosUsuario = isset($_SESSION['ApellidosEmpleado']) ? $_SESSION['ApellidosEmpleado'] : '';
$puestoUsuario = isset($_SESSION['Puesto']) ? $_SESSION['Puesto'] : '';
$ClaveUsuario = isset($_SESSION['Clave'])? $_SESSION['Clave']:'';
*/
var_dump($_SESSION);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Informacion Personal</title>
</head>
<body>
<div class="header">
    <h1>Coarsa</h1>
    <div class="nav-buttons">
        <a href="SolicitudesEmpleado.php">Crear una Solicitud</a>
        <a href="Consultar solicitudes.php">Consultar Solicitudes</a>
        <a href="Datos Empleado.php">Mis Datos</a>
        <a href="Log In.php">Salir</a>
    </div>
</div>
    <center>
        <h1>Mis Datos Personales</h1>
        <br>
       <!-- <label for="Nombre"></label>
        <input type="text" name="Nombretxt" id="Nombretxt" value="" readonly><br>
        <br>
        <label for="Apellidos"></label>
        <input type="text" name="Apellidostxt" id="Apellidostxt" value="" readonly><br>
        <br>
        <label for="Correo"></label>
        <input type="text" name="Correotxt" id="Correotxt" value="" readonly><br>
        <br>
        <label for="Puestotxt"></label>
        <input type="text" name="Puestotxt" id="Puestotxt" value="" readonly><br>
        <br>
        <label for="Clavetxt"></label>
        <input type="password" name="Clavetxt" id="Clavetxt" value="" readonly><br>
        -->
    </center>
</body>
</html>