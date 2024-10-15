<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    echo "Error: No hay una sesión activa.";
    exit();
}

// Obtener los datos del usuario desde la sesión
$correoUsuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
$nombreUsuario = isset($_SESSION['NombreEmpleado']) ? $_SESSION['NombreEmpleado'] : '';
$apellidosUsuario = isset($_SESSION['ApellidosEmpleado']) ? $_SESSION['ApellidosEmpleado'] : '';
$puestoUsuario = isset($_SESSION['Puesto']) ? $_SESSION['Puesto'] : '';
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Pagina de Empleados</title>
</head>

<body>
    <div class="header">
        <div class="nav-buttons">
        <a href="Consultar Solicitudes.php">Ver Solicitudes</a>
        <a href="PaginaEmpleado.php">Crear Solicitud</a>
        <a href="Menu Empleado.php">Volver</a>
        </div>
    </div>
    

    <form method="post" action="C:xampp/htdocs/practica coarsa/Practica-Profesional-Coarsa-main/Modules/Enviar Solicitud.php">
    <div>
        <center>
            <h1>Solicitud de prestamos y vacaciones para los empleados de Coarsa</h1>
            <br>
            <label for="Correo"></label>
            <input type="text" name="Correotxt" id="Correotxt" value="<?php echo $correoUsuario?>" readonly><br>
            <br>
            <label for="Nombre"></label>
            <input type="text" name="Nombretxt" id="Nombretxt" value="<?php echo $nombreUsuario; ?>" readonly><br>
            <br>
            <label for="Apellidos"></label>
            <input type="text" name="Apellidostxt" id="Apellidostxt" value="<?php echo $apellidosUsuario; ?>" readonly><br>
            <br>
            <label for="Puestotxt"></label>
            <input type="text" name="Puestotxt" id="Puestotxt" value="<?php echo $puestoUsuario; ?>" readonly><br>
            <br>
            <label for="Solicitud"></label>
            <select name="Solicitudtxt" id="Solicitudtxt" onchange="mostrarCampoFecha()">
                <option>Seleccione la Solicitud</option>
                <option value="Vacaciones">Vacaciones</option>
                <option value="Prestamos">Prestamos</option>
            </select><br>
            <br>
            <div id="fechaVacaciones" style="display:none;">
                <label for="fechatxt">Seleccione la Fecha de Vacaciones:</label>
                <input type="date" name="fechatxt" id="fechatxt"><br><br>
                <label for="Entradatxt">Seleccione la Fecha de entrada al trabajo:</label>
                <input type="date" name="Entradatxt" id="Entradatxt"><br><br>
            </div>
            <br>
            <div id="Prestamos" style="display: none;">
                <label for="Prestamotxt">Seleccione un prestamo:</label>
                <select name="Prestamotxt" id="Prestamotxt">
                    <option >Seleccione un Monto</option>
                    <option >25.000</option>
                    <option >50.000</option>
                    <option >75.000</option>
                    <option >100.000</option>
                </select><br>
                <br>
            </div>
            <label for="Descripcion"></label>
            <textarea id="Descripciontxt" name="Descripciontxt" rows="10" cols="50" placeholder="por favor descria su solicitud"></textarea>
            <br>
            <br>
            <label>
                <input type="checkbox" name="acepta_terminos">
                Acepto los <a href="Terminos y Condiciones.php" target="_blank">Términos y Condiciones</a>
            </label>
            <br>
            <br>
            <input type="submit" name="Enviarbtn" id="Enviarbtn" value="Enviar Solicitud"><br>
            <br>
            <input type="submit" name="salirbtn" id="salirbtn" value="Salir de la Pagina"><br>
            <br>
        </center>
    </div>
    </form>

    <div>
        <center>
            <table border="2">
                <tr>
                    <th>Monto del Prestamo</th>
                    <th>Monto mínimo a rebajar por quincena</th>
                </tr>
                <tr>
                    <td>25.000</td>
                    <td>5.000</td>
                </tr>
                <tr>
                    <td>50.000</td>
                    <td>10.000</td>
                </tr>
                <tr>
                    <td>75.000</td>
                    <td>10.000</td>
                </tr>
                <tr>
                    <td>100.000</td>
                    <td>10.000</td>
                </tr>
            </table><br>
            <br>
        </center>
    </div>
    </form>
    <!--Funcion para ocultar y mostrar el campo fecha-->
    <script>
        function mostrarCampoFecha() {
            var solicitud = document.getElementById("Solicitudtxt").value;
            var fechaVacaciones = document.getElementById("fechaVacaciones");
            var Prestamos = document.getElementById("Prestamos")

            if (solicitud === "Vacaciones") {
                fechaVacaciones.style.display = "block";
            } else {
                fechaVacaciones.style.display = "none";
            }
            if(solicitud==="Prestamos"){
                Prestamos.style.display = "block";
            }
            else{
                Prestamos.style.display = "none";
            }
        }
    </script>

</body>
</html>