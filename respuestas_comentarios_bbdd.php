<?php 
    $buscar_respuestas = "SELECT respuestas_comentarios.id_respuesta,respuestas_comentarios.id_comentario, 
    respuestas_comentarios.id_usuario_respuesta, respuestas_comentarios.contenido_res,
    respuestas_comentarios.fecha_respuesta, usuarios.usuario,usuarios.foto_perfil 
    FROM respuestas_comentarios INNER JOIN usuarios WHERE respuestas_comentarios.id_comentario = $id_comentario 
    AND respuestas_comentarios.id_usuario_respuesta = usuarios.id_usuario ORDER BY fecha_respuesta DESC;";
    $respuestas = mysqli_query($conexion,$buscar_respuestas);
            //verifico que se haya encontrado una fila que coincida con la busqueda
            if(mysqli_num_rows($respuestas)>0){
                $total_respuestas =  mysqli_num_rows($respuestas);
                while($fila=mysqli_fetch_array($respuestas)){
                    $id_usuario_respuesta = $fila['id_usuario_respuesta'];
                    $id_respuesta = $fila['id_respuesta'];
                    $id_comentario = $fila['id_comentario'];
                    $nombre_usuario_res = $fila['usuario'];
                    $foto_perfil= $fila['foto_perfil'];
                    $contenido_res = $fila['contenido_res'];
                    $fecha_res = $fila['fecha_respuesta'];
                    $fecha_pub = $fecha_res;
                    include("respuestas_comentarios.php");
                
                }
            }

?>