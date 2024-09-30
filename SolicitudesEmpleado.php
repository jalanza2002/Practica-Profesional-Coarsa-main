<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes</title>
</head>
<body>
<div>
    <a href="SolicitudesEmpleado.php">Ver Solicitudes</a>
    <a href="PaginaEmpleado.php">Crear Solicitud</a>
</div>
    <center><h1>Solicitudes que has hecho</h1></center>

    <form action="Consultar Solicitudes.php" method="post">
        <div>
            <label for="nombre_usuario">Digite su Nombre:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            <input type="submit" value="consultar solicitudes">
        </div>

    </form>
</body>  
</html>