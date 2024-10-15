<?php 
    include 'C:\xampp\htdocs\practica coarsa\Practica-Profesional-Coarsa-main\Modules\InsertarUsuario.php';
    CrearUsuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="C:\xampp\htdocs\practica coarsa\Practica-Profesional-Coarsa-main\Estilos">
    <title>Crear Usuario de Empleado</title>
</head>
<body>
<div class="header">
<h2>Coarsa Recursos Humanos</h2>
<div class="nav-buttons">
    <a href="Menu RH.php">Volver</a>
</div>
</div>

<div class="contenedor">
<center>
        <h2 class="titulo">Agregue un nuevo Usuario</h2>
        <p class="texto">Con este Usuario podra tener acceso a la pagina de empleados
            y poder hacer sus solicitudes.
        </p>
    <center>
    <form  method="post" action="CrearUsuario.php">
        <center>
        <label for="Nombretxt">Nombre del Empleado: </label>
        <input type="text" name="Nombretxt" id="Nombretxt" placeholder="Ingrese el Nombre"><br>
        <br>
        <label for="Apellidostxt">Apellidos del Empleado: </label>
        <input type="text" name="Apellidostxt" id="Apellidostxt" placeholder="Ingrese los Apellidos"><br>
        <br>
        <label for="Puestotxt">Puesto en que trabaja: </label>
        <input type="text" name="Puestotxt" id="Puestotxt" placeholder="Ingrese el Puesto"><br>
        <br>
        <label for="Usuariotxt">Correo: </label>
        <input type="text" name="Usuariotxt" id="Usuariotxt" placeholder="Ingrese la Correo"><br>
        <br>
        <label for="Clavetxt">Clave: </label>
        <input type="text" name="Clavetxt" id="Clavetxt" placeholder="Ingrese la clave"><br>
        <br>
        <input class="button"  type="Submit" name="btncrear" value="Crear Usuario Nuevo">
        </center>
    </div>
    </form>
</body>
</html>