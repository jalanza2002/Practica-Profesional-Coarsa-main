<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Log In Coarsa</title>
</head>
<body>
<div>
    <a href="Quienes Somos.php">Quiénes Somos</a>
    <a href="Vacantes.php">Trabaje con Nosotros</a>
    <a href="Log In.php">Ingresar</a>
</div>
    
    <form method="post" action="ValidarUsuario.php">
        <div>
            <center>
                <label for="Usuario"></label>
                <input type="text" id="Usuariotxt" name="Usuariotxt" placeholder="Igrese su Usuario" required>

                <label for="Clave"></label>
                <input type="text" id="Clavetxt" name="Clavetxt" placeholder="Ingrese su Clave" required>

                <label for="Ingresar"></label>

                <input type="submit" value="Ingresar" name="Ingresarbtn" id="Ingresarbtn">

            </center>

        </div>

    </form>
