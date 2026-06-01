<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/publicaciones.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <link rel="stylesheet" href="../fontawesome-free-6.3.0-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/editar_publicacion.css">
    <link rel="stylesheet" href="css/todas_publicaciones.css">
    <title>Inicio</title>
</head>
<body>
    <div class="header">
        <div class="header-left">
             <a href="inicio.php">
                <i class="fas fa-home"></i>
            </a>
        </div>
        <div class="header-center">
            <form action="buscar_personas.php" method="GET">
                <input type="text" placeholder="Buscar..." name="usuario_buscado">     
                <input type="submit" name="buscar" value="Buscar">
            </form>
        </div>
        <div class="header-right">
            <a href="ver_cuenta.php"><?php echo $nombre_usuario;?></a>
                        <a href="cerrar_sesion.php">Cerrar sesión</a>

        </div>
             
            
    </div>


<?php include("footer.php");?>