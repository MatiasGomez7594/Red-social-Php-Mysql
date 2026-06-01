<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/header_cuenta.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>
<body>
<?php include("solo_publicacion.php");?>

    <div class="contenedor">
        <div class="perfil-usuario">
            <a href="#">
                <img src="<?php 
                            $id_foto_buscada = $id_usuario;
                            include("ver_foto_perfil.php");
                            echo $foto;?>" alt="foto perfil">
            </a>
            <i class="fas fa-image"></i>
        </div>
        <h2><?php echo $nombre_usuario;?></h2>
    </div>
    <div class="menu-usuario">
            <div><a href="?p=mis_publicaciones" class="menu-item">Publicaciones</a></div>
            <div><a href="?p=informacion" class="menu-item">Información</a></div>
            <div><a href="?p=amigos" class="menu-item">Mis amigos</a></div>
    </div>
    

</body>
</html>