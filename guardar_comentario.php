<?php
include("con_db.php");
//print_r($_POST);
    $id_usuario = $_POST['id_usuario'];
    $id_publicacion = $_POST['id_publicacion'];
    $comentario = $_POST['comentario'];
    $consulta="INSERT INTO comentarios 
                (id_publicacion,id_usuario,contenido) 
                VALUES('$id_publicacion','$id_usuario','$comentario')";
    $nuevo_comentario = mysqli_query($conexion,$consulta);
    /*
    if($resultado && $id_usuario_post!= $id_usuario){
        $mensaje="comentó tu publicacion";
        $consulta = "INSERT INTO mensajes (id_usuario,id_remitente,mensaje,tipo_mensaje,id_publicacion)
        VALUES('$id_usuario_post','$id_usuario','$mensaje','notificacion','$id_post')";
        $resultado = $conexion->query($consulta);
        include("nuevo_comentario.php");        

    }*/
    if($nuevo_comentario){
        include("nuevo_comentario.php");   

    }
    


