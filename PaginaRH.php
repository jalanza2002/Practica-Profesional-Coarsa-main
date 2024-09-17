<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coarsa</title>
    <style>
        /* Contenedor principal */
        .contenedor {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin: 100px auto 20px; /* Alinea el contenedor en el centro con márgenes superiores e inferiores */
        }
        input[type=text], input[type=email], input[type=tel], input[type=file] {
            width: 100%;
            padding: 12px 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        .button {
            display: block;
            width: 20%;
            padding: 10px;
            background-color: #0060A9;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
        }
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
        .contenedor {
            background-color: #ffd900;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            margin: 100px auto 20px; /* Alinea el contenedor en el centro con márgenes superiores e inferiores */
        }

    </style>
</head>
<body>
    <h2>Coarsa Recursos Humanos</h2>

    <div class="header">
    <h2>Coarsa Recursos Humanos</h2>
    <div class="nav-buttons">
        <a href="Canditados.php">Candidatos</a>
        <a href="Puestos.php">Puestos</a>
    </div>
    </div>

        <div class="contenedor">
            <center>
                <h2>Agregue un puesto</h2><br>
                <form method="post">
                    <label for="Puesto">Agregue un puesto </label>
                    <input type="text" id="Puestotxt" name="Puestotxt" required><br>

                    <input type="submit" id="enviar" name="enviar"><br><br>
                </form>

            </center>
        </div>






</body>
</html>
