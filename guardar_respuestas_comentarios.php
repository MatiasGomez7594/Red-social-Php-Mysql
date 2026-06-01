<?php
include("con_db.php");
//print_r($_POST);
    $id_comentario = $_POST['id_comentario'];
    $id_usuario = $_POST['id_usuario'];
    $respuesta = $_POST['respuesta'];
    //$id_receptor = $_POST['id_receptor'];
    $guardar_respuesta="INSERT INTO respuestas_comentarios 
                (contenido_res,id_comentario,id_usuario_respuesta) 
                VALUES('$respuesta','$id_comentario','$id_usuario')";
    $nueva_respuesta = mysqli_query($conexion,$guardar_respuesta);
    if($nueva_respuesta){
        include("nueva_respuesta.php");  
    }
/*
    if($resultado && $id_receptor != $id_usuario){
        $mensaje ="respondió a tu comentario";
        $consulta = "INSERT INTO mensajes (id_usuario,id_remitente,mensaje,tipo_mensaje,id_publicacion)
                    VALUES('$id_receptor','$id_usuario','$mensaje','notificacion','$id_post')";
        $resultado = $conexion->query($consulta);
        $id_comentario;
        include("nueva_respuesta.php");       
    }else{
        include("nueva_respuesta.php");  
    }
*/