<?php
include("componentes/sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Modificar_informacion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

</head>
<body>
    <div class="contenedor">
        <h1>Configuración de la cuenta</h1>
        <form id="formulario" action="modificar.php" class="opciones" method="POST" enctype="multipart/form-data">
            <div class="campo-usuario">
                <label for="">Foto de perfil</label>
                <img src="
                <?php 
                $id_foto_buscada = $id_usuario;
                include("ver_foto_perfil.php");
                echo $foto;?>" 
                alt="foto perfil">
            </div>
            <div class="campo-usuario"  id="preview-imagen">
            </div>
            <div class="campo-usuario" id="input-file">
                <div>
                    <i class="fas fa-upload">Subir foto</i>
                </div>
                <input name="adjunto" type="file"  id="adjunto" accept="image/*">
            </div>
           
            <div class="campo-usuario">
               <label>Nombre</label><input name="nombre" type="text"  id="usuario"  value="<?php echo $nombre_usuario;?>">
            </div>
            <div class="campo-usuario">
               <label>Email</label><input name="email" type="text"  id="email" value="<?php echo $email_usuario;?>">
            </div>
            <div class="campo-usuario">
               <label>Password</label>
               <div class="usuario-password">
                    <input name="password" type="password"  id="password" value="<?php echo $password_usuario?>">
                    <input type="checkbox" onChange="verPassword();" value="Ver password" id="ver"/>
                    <label for="ver">Ver password</label>
                </div>
            </div>
            <input type="hidden" name="id" value=<?php echo $id_usuario?>>
            <input type="submit" name="aceptar" onclick="cerrar()" value="Guardar cambios" id="aceptar">
            <input type="button" value="Cancelar" onclick="volver()">
        </form>
    </div>
    <script src="scripts/validar_datos.js"></script>
    <script src="scripts/preview_imagen.js"></script>
    <script>
        function verPassword(){
            var ver= document.getElementById("ver");
            var password = document.querySelector("#password");
            if(ver.checked===true){
                password.type="text";
            }else{
                password.type="password";
            }
        }
    </script>
        <script>
        function volver(){
            window.location="bienvenida.php";
        }
    </script>
    
</body>
</html>