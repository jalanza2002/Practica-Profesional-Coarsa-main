<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/Estilo Log In.css">
    <!-- <link rel="stylesheet" href="/Estilos/EstiloVacante.css"> -->
    <title>Log In Coarsa</title>
</head>
<body>
<div >
    <a href="/Pages/Quienes Somos.php">
    <img src="/Estilos/images/fecha atras.png" alt="16px" class="back-arrow">
    </a>
</div>
  <div class="login-container">
   <form action="/Modules/ValidarUsuario.php" method="post">
    <center>
     <img  src="/Estilos/images/Logo Coarsa con slogan png.png">
     <br/>
     <br/>
     <div>
     <input id="Usuariotxt" class="form-control" name="Usuariotxt" required type="text" 
     placeholder="Ingrese su Usuario"/>
     </div>
     <div>
     <input id="Clavetxt" class="form-control" name="Clavetxt" required type="password"
     placeholder="Ingrese su Clave"/><br>
     </div>
     </center>
     <input type="checkbox" id="showPassword"> 
     <label for="showPassword">Mostrar Contraseña</label>
     <br>
     <br>
     <center>
     <label for="Ingresar">
     </label>
     <input class="login-button" id="Ingresarbtn" name="Ingresarbtn" type="submit" value="Ingresar"/>
     <br/>
    </center>
    <br>
    <a class="forgot-password" href="PagRestaurarClave.php">
     ¿Olvidó su Contraseña?
    </a>
   </form>
  </div>
    <script>

    // JavaScript para alternar visibilidad de la contraseña
    const passwordInput = document.getElementById('Clavetxt');
    const showPasswordCheckbox = document.getElementById('showPassword');

    showPasswordCheckbox.addEventListener('change', function() {
        // Alternar el tipo de input entre 'password' y 'text'
        passwordInput.type = this.checked ? 'text' : 'password';
    });

    </script>
</body>
</html>
