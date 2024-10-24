<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/Estilo Log In.css">
    <title>Log In Coarsa</title>
</head>
<body>
<div class="header">
   <h1>
    Coarsa
   </h1>
   <div class="nav-buttons">
    <a href="Quienes Somos.php">
     Quiénes Somos
    </a>
    <a href="Vacantes.php">
     Trabaje con Nosotros
    </a>
    <a href="Log In.php">
     Ingresar
    </a>
   </div>
  </div>
  <div class="con login-container">
   <form action="/Modules/ValidarUsuario.php" method="post">
    <center>
     <img height="100" src="usuario.png" width="100"/>
     <br/>
     <br/>
     <label for="Usuario">
     </label>
     <input id="Usuariotxt" name="Usuariotxt" placeholder="Ingrese su Usuario" required="" type="text"/>
     <br/>
     <br/>
     <label for="Clave">
     </label>
     <input id="Clavetxt" name="Clavetxt" placeholder="Ingrese su Clave" required="" type="password"/>
     <img alt="Mostrar clave" class="toggle-password" height="25" id="togglePassword" src="/Estilos/images/eye close.png" width="25"/>
     <br/>
     <br/>
     <label for="Ingresar">
     </label>
     <input class="login-button" id="Ingresarbtn" name="Ingresarbtn" type="submit" value="Ingresar"/>
     <br/>
    </center>
    <a class="forgot-password" href="PagRestaurarClave.php">
     ¿Olvidó su Contraseña?
    </a>
   </form>
  </div>
    <script>
        // JavaScript para alternar visibilidad de la contraseña
        const passwordInput = document.getElementById('Clavetxt');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function() {
            // Alternar el tipo de input entre 'password' y 'text'
            const isPasswordVisible = passwordInput.type === 'text';
            passwordInput.type = isPasswordVisible ? 'password' : 'text';

            // Cambiar la imagen según la visibilidad de la contraseña
            togglePassword.src = isPasswordVisible ? '/Estilos/images/eye close.png' : '/Estilos/images/eye open.png';
        });
    </script>
</body>
</html>
