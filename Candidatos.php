<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Candidatos</title>
</head>
<body>
    <div>
    <center><h3>Tabla de Canditatos</h3></center>
    </div>
    <br>

    <div>
        <center>
            <table border=1>
                <tr>
                    <th>IdCandidato</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>IdPuesto</th>
                    <th>Cv</th>
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

                    //funcion para mostrar los datos de los postulantes
                    function MostrarPostulantes(){
                        $conn =getDatabaseConnection();
                        $sql= "Call ObtenerParticipantes";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute();
                        $Vacantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach($Vacantes as $Vacante){
                            echo'<tr>';
                            echo '<td>' .$Vacante['IdParticipante']. '</td>';
                            echo '<td>' .$Vacante['Nombre']. '</td>';
                            echo '<td>' .$Vacante['Apellidos']. '</td>';
                            echo '<td>' .$Vacante['telefono']. '</td>';
                            echo '<td>' .$Vacante['Correo']. '</td>';
                            echo '<td>' .$Vacante['Puesto']. '</td>';
                            echo "<td>";
                            echo '<a href="data:application/pdf;base64,' . base64_encode($Vacante["CV"]) . '">Download CV</a>';
                            echo "</td>";
                            echo'</tr>';
                        }
                    }
                MostrarPostulantes();
                ?>  
            </table>
        </center>

    </div>
</body>
</html>