<?php 
    include 'C:\xampp\htdocs\practica coarsa\Practica-Profesional-Coarsa-main\Modules\InsertarUsuario.php';
    CrearUsuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/EstiloVacante.css">
    <title>Crear Usuario de Empleado</title>
</head>
<body>
<div>
    <a href="/Pages/Menu RH.php">
        <img src="/Estilos/images/fecha atras.png" alt="16px" class="back-arrow">
    </a>
</div>

<div class="container">
<center>
        <h2 class="titulo">Agregue un nuevo Usuario</h2>
        <p class="texto">Con este Usuario podra tener acceso a la pagina de empleados
            y poder hacer sus solicitudes.
        </p>
    <center>
    <form  method="post" action="CrearUsuario.php">
        <center>
        <input type="text" name="Cedulatxt" id="Cedulatxt" placeholder="Ingrese la Cédula" required><br>
        <br>
        <input type="text" name="Nombretxt" id="Nombretxt" placeholder="Ingrese el Nombre" required><br>
        <br>
        <input type="text" name="Apellidostxt" id="Apellidostxt" placeholder="Ingrese los Apellidos" required><br>
        <br>
        <input type="text" name="Puestotxt" id="Puestotxt" placeholder="Ingrese el Puesto" required><br>
        <br>
        <input type="text" name="Usuariotxt" id="Usuariotxt" placeholder="Ingrese la Correo" required><br>
        <br>
        <input type="password" name="Clavetxt" id="Clavetxt" placeholder="Ingrese la clave" required><br>
        <br>
        <input class="button"  type="Submit" name="btncrear" value="Crear Usuario Nuevo">
        </center>
    </div>
    </form>
</body>
</html>