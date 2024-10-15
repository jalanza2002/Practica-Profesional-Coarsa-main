<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Restaurar Contraseña</title>
</head>
<body>


    <div class="contenedor">
        <center>
        <h2 class="titulo">Restaurar Clave</h2>
        <p class="texto">Se le enviara un correo con un token donde podra actualizar su contraseña
            de nuevo por medio de un link, por favor no contestar el correo.
        </p>
        </center>

        <form action="Enviar_Token.php" method="post">
            <label for="txtcorreo">Digite su Correo: </label>
            <input type="text" name="txtcorreo" id="txtcorreo">
            <br>
            <input class="button" type="submit" name="btnenviar" id="btnenviar">

        </form>





    </div>
    
</body>
</html>