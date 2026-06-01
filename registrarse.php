<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <script defer src="scripts/validar_datos.js"></script>

    <title>Guardar datos</title>
</head>
<body>
    <form>
        <h1>Registrarse</h1>
        <p class="error-registro"></p>
        <p class="message-registro"></p>
        <div id="error-usuario">Nombre de usuario invalido</div>
        <input name="usuario" id="usuario" placeholder="Usuario"  type="text">
        <div id="error-email">El email debe ser email@ejemplo.com</div>
        <input name="email" id="email" placeholder="Email"  type="email">
        <input name="password" id="password" placeholder="Password" autocomplete="off" type="password">
        <div id="error-password">La contraseña debe tener un minimo de 4 caracteres</div>
        <input type="button" name="submit" value="Enviar"  id="btnRegistrarse">
        <p>¿Ya tiene una cuenta? Inicie sesión <a href="index.php">aquí</a></p>
    </form>
    
</body>
</html>