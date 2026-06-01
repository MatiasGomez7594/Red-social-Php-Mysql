<?php 
    $buscar_comentarios = "SELECT comentarios.id_comentario,comentarios.id_usuario,
    comentarios.contenido,comentarios.fecha_comentario,usuarios.usuario,usuarios.foto_perfil 
    FROM comentarios INNER JOIN usuarios 
    WHERE comentarios.id_usuario = usuarios.id_usuario AND comentarios.id_publicacion = $id_publicacion
    ORDER BY fecha_comentario DESC;";
    $comentarios = mysqli_query($conexion,$buscar_comentarios);
            //verifico que se haya encontrado una fila que coincida con la busqueda
            if(mysqli_num_rows($comentarios)>0){
                $total_comentarios =  mysqli_num_rows($comentarios);
                while($fila=mysqli_fetch_array($comentarios)){
                    $id_usuario_com = $fila['id_usuario'];
                    $id_comentario = $fila['id_comentario'];
                    $nombre_usuario_com = $fila['usuario'];
                    $foto_perfil= $fila['foto_perfil'];
                    $contenido = $fila['contenido'];
                    $fecha_com = $fila['fecha_comentario'];
                    $fecha_pub = $fecha_com;
                    include("todos_los_comentarios.php");
                
                }
            }
            ?>