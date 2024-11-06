<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/Estilo Log In.css">
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
     <img  src="/Estilos/images/Logo coarsa SOLIDO.jpg">
     <br/>
     <br/>
     <label for="Usuario">
     </label>
     <input id="Usuariotxt" name="Usuariotxt" placeholder="Ingrese su Usuario" required type="text"/>
     <br/>
     <br/>
     <label for="Clave">
     </label>
     <input id="Clavetxt" name="Clavetxt" placeholder="Ingrese su Clave" required type="password"/><br>
     <input type="checkbox" id="showPassword"> 
     <label for="showPassword">Mostrar Contraseña</label>
     <br>
     <br>
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
