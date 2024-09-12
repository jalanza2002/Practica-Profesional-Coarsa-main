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
            background-color:transparent;
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
        input[type=text], input[type=password] {
            width: 30%;
            padding: 12px 10px;
            margin: 8px 0;
            box-sizing: line;
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
      <img src="usuario.png"style="width:75px;height:75px;">
      <form>
          <label for="correo"></label>
          <input type="text" id="correo" name="correo" placeholder="Digite su Correo" required><br>
          <label for="Clave"></label>
          <input type="password" id="Clave" name="Clave" placeholder="Digite su Clave" required><br>
          <input class="button" type="submit" value="Ingresar">
      </form>

  </center>
  <script>
      async function hashPassword(event) {
          event.preventDefault(); 
      
     t
          const passwordField = document.getElementById('Clave');
          const password = passwordField.value;
      
       
          const hashedPassword = await sha256(password);
      
 
          passwordField.value = hashedPassword;
      
          document.getElementById('myForm').submit();
      }
      
      async function sha256(message) {
          const msgBuffer = new TextEncoder().encode(message);
          const hashBuffer = await crypto.subtle.digest('SHA-256', msgBuffer);
          const hashArray = Array.from(new Uint8Array(hashBuffer));
          const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
          return hashHex;
      }
      </script>
        <?php 
        $serverName = "JSM\SQL2022DEV";  // Reemplaza con tu nombre de servidor y puerto
        $connectionOptions = array(
            "Database" => "DBCoarsa",
            "Uid" => "sa",
            "PWD" => "SmJ2002@",
            "ConnectionPooling" => false
        );
        
        try {
            $conn = new PDO("sqlsrv:server=$serverName;Database=DBCoarsa;LoginTimeout=10", $connectionOptions['Uid'], $connectionOptions['PWD']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa";
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    
    
    
    ?>

</body>
</html>