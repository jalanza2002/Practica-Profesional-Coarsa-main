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
$Cedula = isset($_SESSION['Cedula']) ? $_SESSION['Cedula']: '';
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/Estilo General.css">
    <link rel="stylesheet" href="/Estilos/style terminos y condiciones.css">
    <title>Pagina de Empleados</title>
</head>
<body>
<header class="header">
        <a href="Menu Empleado.php">
            <img src="/Estilos/images/fecha atras.png" alt="12px" class="back-arrow">
        </a>
        <img src="/Estilos/images/Logo Coarsa con slogan png.png" alt="Logo de Coarsa"> <!-- Asegúrate de cambiar "logo.png" por la ruta correcta de tu logo -->
        <a href="logout.php" class="logout">Cerrar sesión</a>
    </header>
    
    <script src="/Estilos/mecanismo de ventana emergente.js"></script>

    <form method="post" action="/Modules/Enviar Solicitud.php">
    <div>
        <center>
            <h1>Solicitud de prestamos y vacaciones para los empleados de Coarsa</h1>
            <br>
            <label for="Cedula"></label>
            <input type="int" name="Cedulatxt" id="Cedulatxt" value="<?php echo $Cedula ?> "readonly><br>
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
                    <option >25000</option>
                    <option >50000</option>
                    <option >75000</option>
                    <option >100000</option>
                </select><br>
                <br>
            </div>
            <label for="Descripcion"></label>
            <textarea id="Descripciontxt" name="Descripciontxt" rows="10" cols="50" placeholder="por favor descria su solicitud"></textarea>
            <br>
            <br>
            <label>
                <input type="checkbox" name="acepta_terminos" id="acepta_terminos">
                Acepto los <a href="javascript:void(0);" id="abrirModal" onclick="abrirModal()">Términos y Condiciones</a>
            </label>
            <br>
            <br>
            <input type="submit" name="Enviarbtn" id="Enviarbtn" value="Enviar Solicitud"><br>
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

<div id="modal" class="modal" style="display:none; position:fixed; left:50%; top:50%; transform:translate(-50%, -50%); background-color:white; padding:20px; border:1px solid #ccc; z-index:1000; width: 600px; height: 400px;">
    <h2>Términos y Condiciones del préstamo</h2>
    <p> • Objetivo </p>
    <p>Establecer normas y procedimientos para dar apoyo al personal colaborador de Distribuidora </p>
    <p>COARSA, brindando la oportunidad de acceder a préstamos con 0% de intereses; la finalidad es </p>
    <p>mejorar su limitación con un trámite ágil y cuotas accesibles, proporcionando capital para utilizar en </p>
    <p>caso de situaciones consideradas como urgencia, es decir, recursos para que pueda resolver su </p>
    <p>necesidad. </p>

    <p>• Alcance </p>
    
       <p> Estos lineamientos son aplicables para todo el personal de Distribuidora COARSA.</p> 

    <p>• Requisitos Generales: </p>

       <p> 1- Ser colaborador, contrato por tiempo indefinido, y más de 3 meses de laborar en la empresa,</p> 
        <p>para solicitud del préstamo. </p>

        <p>2- Se otorgan préstamos exclusivamente a colaboradores que estén atravesando alguna</p> 
        <p>situación de urgencia o con un motivo de necesidad justificable. </p>

        <p>3- El préstamo está sujeto a aprobación por parte de la persona encargada para autorizarlo.</p> 

        <p>4- Se aprueban máximo 2 préstamos al año por colaborador, tomando en cuenta que el </p>
        <p>préstamo anterior ya haya sido liquidado, no se pueden tener dos préstamos al mismo tiempo.</p>
        <p>No se podrán solicitar nuevos préstamos internos si ya se tiene uno pendiente o activo, </p>
        <p>como por ejemplo préstamo para compra de lentes, préstamos para situaciones de salud </p>
        <p>(odontólogo, medicina general), préstamos con alguna entidad financiera que estén</p> 
        <p>autorizados rebajar de planilla, entre otros posibles casos.</p>

        <p>5- Los préstamos otorgados a colaboradores no devengaran intereses. </p>

        <p>6- El colaborador debe llenar el formato establecido para solicitar el préstamo. </p>

        <p>7- Al momento de solicitar un préstamo, el colaborador debe autorizar por escrito al patrono </p>
        <p>para realizar los rebajos de los montos del salario acordados, los cuales están establecidos</p> 
        <p>en esta política.</p>

        <p>8- Una vez aprobados los préstamos y con el formulario firmado por el colaborador, el monto</p> 
        <p>del préstamo será entregado a través de depósito en su cuenta bancaria.  </p>

        <p>9- El préstamo que se le otorgue al colaborador empezará a ser descontado de su salario en la</p> 
        <p>quincena inmediata posterior a la solicitud y aprobación. </p>

        <p>10- Si la persona beneficiada con el préstamo pierde la condición de colaborador de la Empresa,</p> 
        <p>el saldo que adeuda del préstamo otorgado, debe ser cancelado en su totalidad. </p>

        <p>11- Los montos de las cuotas varían de acuerdo a la cantidad solicitada en el préstamo. </p>

        <p>12- En ningún caso la Empresa estará obligada legalmente a conceder el préstamo solicitado</p> 
        como tampoco a expresar causa en el caso de negativa. </p>

        <p>13- El monto máximo de préstamo será de ₡100.000 (cien mil colones)</p>  
    
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

  
    <p>Realizado por: </p>
    <p>Licda. Victoria Calderón Chaves</p> 
    <p>Recursos Humanos </p>

    <p>Revisado por: </p>
    <p>Licda. Melissa Villalobos Vásquez</p> 
    <p>Jefatura de Recursos Humanos</p> 

    <p>Aprobado por: </p>
    <p>Licda. Kattya Alpizar Quesada</p> 
    <p>Directora Administrativa</p> 

    
    <button onclick="cerrarModal()">Cerrar</button>
</div>

<div id="fondo" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:transparent; z-index:999;"></div>
<script>
// Función para abrir el modal
function abrirModal() {
    document.getElementById('modal').style.display = 'block';
    document.getElementById('fondo').style.display = 'block';
}

// Función para cerrar el modal
function cerrarModal() {
    document.getElementById('modal').style.display = 'none';
    document.getElementById('fondo').style.display = 'none';
}
</script>
</body>
</html>