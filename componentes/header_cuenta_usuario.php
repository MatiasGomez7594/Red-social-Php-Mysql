<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header_cuenta.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>
<body>
    <div class="contenedor">
        <div class="perfil-usuario">
            <img src="<?php 
                            $id_foto_buscada = $id_otro_usuario;
                            include("ver_foto_perfil.php");
                            echo $foto;?> " alt="foto perfil">
        </div>
        <h2><?php echo $nombre_otro_usuario;?></h2>
    </div>
    <div class="menu-usuario">
        <div><a href="?id=<?php echo $id_otro_usuario;?>&p=publicaciones_usuario" class="menu-item">Publicaciones</a></div>
        <div><a href="?id=<?php echo $id_otro_usuario;?>&p=informacion_usuario" class="menu-item">Información</a></div>
        <div><a href="?id=<?php echo $id_otro_usuario;?>&p=amigos_usuario" class="menu-item">Amigos</a></div>
        <div onclick="verMensajesPrivados()"class="menu-item"><i class="fas fa-comment-dots" ></i>  Mensaje privado</div>
    </div>

    <?php include("mensajes_privados.php");?>
</body>
<script src="scripts/mensajes_privados.js">
</script>
<script src="scripts/guardar_mensajes.js">
</script>
</html>

