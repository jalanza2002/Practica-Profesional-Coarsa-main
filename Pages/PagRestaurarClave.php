<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/Estilo Log In.css">
    <title>Restaurar Contraseña</title>
</head>
<body>
<div >
    <a href="Log In.php">
    <img src="/Estilos/images/fecha atras.png" alt="16px" class="back-arrow">
    </a>
</div>
    <div class="login-container">
        <center>
        <h2>Restaurar Clave</h2>
        <br>
        <p>Se le enviara un correo donde podra actualizar su contraseña
            de nuevo por medio de un link, por favor no contestar el correo.
        </p>
        <br>
        
        <form action="/Modules/Enviar_Token.php" method="post">
            <input type="text" name="txtcorreo" id="txtcorreo" placeholder="Digite su Correo" required>
            <br>
            <br>
            <input class="button" type="submit" name="btnenviar" id="btnenviar">
            </center>
        </form>





    </div>
    
</body>
</html>