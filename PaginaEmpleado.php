<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Empleados</title>
</head>

<body>
    <div>
        <a href="SolicitudesEmpleado.php">Ver Solicitudes</a>
        <a href="PaginaEmpleado.php">Crear Solicitud</a>
    </div>

    <form method="post" action="Enviar Solicitud.php"></form>
    <div>
        <center>
            <h1>Solicitud de prestamos y vacaciones para los empleados de Coarsa</h1>
            <br>
            <label for="Nombre"></label>
            <input type="text" name="Nombretxt" id="Nombretxt" placeholder="Digite su Nombre"><br>
            <br>
            <label for="Apellidos"></label>
            <input type="text" name="Apellidostxt" id="Apellidostxt" placeholder="Digite sus Apellidos"><br>
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
            <label for="Descripcion"></label>
            <textarea id="Descripciontxt" name="Descripciontxt" rows="10" cols="50" placeholder="por favor descripa su solicitud"></textarea>
            <br>
            <br>
            <input type="submit" name="Enviarbtn" id="Enviarbtn" value="Enviar Solicitud"><br>
            <br>
        </center>
    </div>

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
    <form method="post" action="Enviar Solicitud.php">
        <div>
            <center>
                <input type="submit" name="salirbtn" id="salirbtn" value="Salir de la Pagina">
            </center>
        </div>
    </form>
    <!--Funcion para ocultar y mostrar el campo fecha-->
    <script>
        function mostrarCampoFecha() {
            var solicitud = document.getElementById("Solicitudtxt").value;
            var fechaVacaciones = document.getElementById("fechaVacaciones");

            if (solicitud === "Vacaciones") {
                fechaVacaciones.style.display = "block";
            } else {
                fechaVacaciones.style.display = "none";
            }
        }
    </script>

</body>

</html>