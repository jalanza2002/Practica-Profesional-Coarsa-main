<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Estilos/Estilo Log In.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
     <div class="form-floating mb-3">
     <input id="Usuariotxt" class="form-control" name="Usuariotxt" required type="text"/>
     <label for="floatingInput">Ingrese su Usuario</label>
     </div>
     <br/>
     <div class="form-floating mb-3">
     <input id="Clavetxt" class="form-control" name="Clavetxt" required type="password"/><br>
     <label for="floatingInput">Ingrese su Clave</label>
     </div>
     </center>
     <input type="checkbox" id="showPassword"> 
     <label for="showPassword">Mostrar Contraseña</label>
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
