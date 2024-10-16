<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/styles.css">
    <title>Log In Coarsa</title>
</head>
<body>
<div class="header">
    <h1>Coarsa</h1>
    <div class="nav-buttons">
    <a href="Quienes Somos.php">Quiénes Somos</a>
    <a href="Vacantes.php">Trabaje con Nosotros</a>
    <a href="Log In.php">Ingresar</a>
    </div>
</div>
    <div class="contenedor1">
        <form method="post" action="/Modules/ValidarUsuario.php">
            <center>
                <img src="usuario.png" width="100" height="100"><br>
                <br>
                <label for="Usuario"></label>
                <input type="text" id="Usuariotxt" name="Usuariotxt" placeholder="Igrese su Usuario" required><br>
                <br>
                <label for="Clave"></label>
                <input type="password" id="Clavetxt" name="Clavetxt" placeholder="Ingrese su Clave" required><br>
                <br>
                <label for="Ingresar"></label>
                <input class="button" type="submit" value="Ingresar" name="Ingresarbtn" id="Ingresarbtn">
                <br>
            </center>
            <a href="PagRestaurarClave.php">Olvido su Contraseña</a>
        </form>
    </div>
        
