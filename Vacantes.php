<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Coarsa</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>
        /* Estilo general del cuerpo */
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(255, 255, 255);
            margin: 0;
            padding: 0;
        }

        /* Encabezado */
        .header {
            background-color: #ffffff;
            padding: 20px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: rgb(0, 0, 0);
            position: fixed; /* Fija el header en la parte superior */
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000; /* Hace que el header esté por encima de otros elementos */
        }

        .header h1 {
            margin: 0;
            padding-left: 20px;
        }

        .nav-buttons {
            padding-right: 20px;
        }

        .nav-buttons a {
            text-decoration: none;
            color: rgb(0, 0, 0);
            background-color: #ffffff;
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 5px;
            font-size: 20px;
            transition: background-color 0.3s;
        }

        .nav-buttons a:hover {
            background-color: #0060A9;
        }

        /* Contenedor principal */
        .contenedor {
            background-color: #ffd900;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin: 100px auto 20px; /* Alinea el contenedor en el centro con márgenes superiores e inferiores */
        }

        .titulo {
            text-align: center;
            color: #000000;
            margin-bottom: 20px;
        }

        .texto {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
        }

        .button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #0060A9;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
        }

        .contenedor button:hover {
            background-color: #004c8c;
        }
        input[type=text] {
            width: 30%;
            padding: 12px 10px;
            margin: 8px 0;
            box-sizing: line;
          }
    </style>
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

<div class="contenedor">
    <center>
        <h2 class="titulo">Trabaje para Nosotros</h2>
        <p class="texto">SI desea formar parte de Coarsa complete este formulario y con gusto
            será tomado en cuenta para próximas vacantes.
        </p>
        <form>
            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required><br><br>
            <input type="text" id="email" name="email" placeholder="Escribe tu correo" required><br><br>
            <input type="text" id="apellidos" name="apellidos" placeholder="Escribe tus apellidos" required><br><br>
            <input type="text" id="telefono" name="telefono" placeholder="Digite su telefono" required><br><br>
            <select>
                <option value="valor1">Elija un área de interés</option>
                <option value="valor2">Opción 2</option>
                <option value="valor3">Opción 3</option>
                <option value="valor4">Opción 4</option>
            </select><br><br>
            <input type="file" id="CV" name="CV" aria-placeholder="Subir hoja de Vida" required><br><br>
            <input class="button" type="submit" value="Enviar">
        </form>
    </center>
</div>
<?php 
    echo 'hola';
    echo 'mi nombre es Josue'

?>
</body>
</html>