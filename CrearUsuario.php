<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Crear Usuario de Empleado</title>
</head>
<body>
<div>
    <a href="Candidatos.php">Candidatos</a>
    <a href="PaginaRH.php">Puestos</a>
    <a href="CrearUsuario.php">Nuevos Usuarios</a>
</div>

    <form  method="post" action="">
    <div>
        <center>
        <label for="Nombre">Nombre del Empleado: </label>
        <input type="text" name="Nombretxt" id="Nombretxt" placeholder="Ingrese el Nombre"><br>
        <br>
        <label for="Apellidos">Apellidos del Empleado: </label>
        <input type="text" name="Apellidostxt" id="Apellidostxt" placeholder="Ingrese los Apellidos"><br>
        <br>
        <label for="Puesto">Puesto en que trabaja: </label>
        <input type="text" name="Puestotxt" id="Puestotxt" placeholder="Ingrese el Puesto"><br>
        <br>
        <label for="Usuario">Nuevo Unsuario: </label>
        <input type="text" name="Usuariotxt" id="Usuariotxt" placeholder="Ingrese el Usuario"><br>
        <br>
        <label for="Contraseña">Nueva contraseña: </label>
        <input type="text" name="Contraseñatxt" id="Contraseñatxt" placeholder="Ingrese la contraseña"><br>
        <br>
        <label for="Rol">Rol del Empleado</label>
        <select name="Roltxt" id="Roltxt">
        <option>Ingrese el Rol del Empleado</option>
        <option>2</option>
        <option>3</option>
        </select><br>
        <br>
        <input type="Submit" name="btncrear" value="Crear Usuario Nuevo">
        </center>
    </div>
    </form>
</body>
</html>