<?php
//para cuando inicio sesión permanezca en la página bienvenida.php
//salvo que cierre la sesión en la ventana bienvenida.php
session_start();
if(isset($_SESSION['usuario'])){
    header("location: bienvenida.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Iniciar sesión</title>
</head>
<body>
    <form >
    <h1>Iniciar Sesión</h1>
    <div id="mensaje-login">Usuario y/o contraseña incorrectos</div>
    <p id="error-campos">
       Complete todos los campos
    </p>
    <input name="email"  id="email" placeholder="Email" type="text">
    <p id="error-email">
        El email debe ser del tipo email@ejemplo.com
    </p>
    <input  name="password" id="password"  placeholder="Password" autocomplete="off" type="password">
    <p id="error-password">
       La contraseña debe tener un minimo 4 caracteres
    </p>
    <input type="button" onclick="validar_login()" value="Ingresar">
    <p>
    ¿No tienes cuenta? Registrate <a href="registrarse.php">aqui</a>
    </p>

    </form>
    <script src="scripts/validar_login.js"></script>
</body>
</html>