<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento Usuarios</title>
</head>
<body>
    <?php 
    
    function getDatabaseConnection(){

    $servername = "localhost"; 
    $username = "root";       
    $password = "JoSu2002@";  
    $dbname = "dbcoarsa"; 

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            exit;
            }

    }

    function ConsultarUsuarios(){
        if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['btnconsultar'])){

            $conn=getDataBaseConnection();
            $stmt = $conn->prepare("SELECT * FROM usuarios");
            $stmt->execute();
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(count($result)>0){
                foreach($result as $row){
                    echo "Usuario ID: " . $row['IdUsuario'] . " - Nombre: " . $row['Nombre'] . "<br>";
                    
                }


            }
        }

    }
    
    
    
    ?>
</body>
</html>