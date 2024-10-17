<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/styles.css">
    <title>Document</title>
</head>
<body>
    <h1>Bitacora de ingresos a la pagina</h1>
    <div class="nav-buttons">
        <a href="Menu Admin.php">Volver</a>
    </div>
    <br>
    <center><h2>Tabla de Bitacoras</h2></center>
    <br>

    <div>
        <center>
            <table border="1">
                <tr>
                    <th>IdBitacora</th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Puesto</th>
                    <th>Ingreso</th>
                    <th>Salida</th>
                </tr>

                <?php 
                    function getDatabaseConnection(){
                        $servername = "localhost"; 
                        $username = "root";       
                        $password = "JoSu2002@";  
                        $dbname = "dbcoarsa"; 
    
                        try{
    
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            return $conn;
                        }catch(Exception $e){
                                echo "Error de conexion: ". $e->getMessage();
                                exit;
                        }
                    }
                    
                    function Mostrarbitacora(){
                        $conn =getDatabaseConnection();
                        $sql= "Call Consultar_bitacora";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute();
                        $bitacotas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach($bitacotas as $b){
                            echo '<tr>';
                            echo '<td>' .$b['IdBitacora']. '</td>';
                            echo '<td>' .$b['Cedula']. '</td>';
                            echo '<td>' .$b['NombreEmpleado']. '</td>';
                            echo '<td>' .$b['ApellidosEmpleado']. '</td>';
                            echo '<td>' .$b['Puesto']. '</td>';
                            echo '<td>' .$b['FechaEntrada']. '</td>';
                            echo '<td>' .$b['FechaSalida']. '</td>';
                        }
                    }
                    Mostrarbitacora();
                ?>
            </table>
        </center>
    </div>
</body>
</html>