<?php
include ("con_db.php");
#para ver mis publicaciones y las de mis amigos
/*
SELECT DISTINCT publicaciones.id_publicacion,publicaciones.id_usuario,publicaciones.contenido, publicaciones.arch_adjunto,publicaciones.fecha_publicacion,usuarios.usuario,usuarios.foto_perfil, comentarios.contenido,comentarios.fecha_comentario FROM publicaciones INNER JOIN solicitudes_amistad ON publicaciones.id_usuario = '2' OR (publicaciones.id_usuario = solicitudes_amistad.id_solicitante AND solicitudes_amistad.id_solicitado ='2' OR solicitudes_amistad.id_solicitante ='2' AND publicaciones.id_usuario = solicitudes_amistad.id_solicitado) AND solicitudes_amistad.estado_solicitud ='2' INNER JOIN usuarios ON usuarios.id_usuario = publicaciones.id_usuario LEFT JOIN comentarios ON publicaciones.id_publicacion = comentarios.id_publicacion ORDER BY fecha_publicacion DESC;

*/

$todas_las_publicaciones ="SELECT DISTINCT publicaciones.id_publicacion,publicaciones.id_usuario,publicaciones.contenido, 
publicaciones.arch_adjunto,publicaciones.fecha_publicacion,usuarios.usuario,usuarios.foto_perfil 
FROM publicaciones INNER JOIN solicitudes_amistad ON publicaciones.id_usuario = '$id_usuario' 
OR (publicaciones.id_usuario = solicitudes_amistad.id_solicitante AND solicitudes_amistad.id_solicitado ='$id_usuario' 
OR solicitudes_amistad.id_solicitante ='$id_usuario'
 AND publicaciones.id_usuario = solicitudes_amistad.id_solicitado) 
 AND solicitudes_amistad.estado_solicitud ='2' 
 INNER JOIN usuarios ON usuarios.id_usuario = publicaciones.id_usuario 
 ORDER BY fecha_publicacion DESC";

$publicaciones = mysqli_query($conexion,$todas_las_publicaciones);

if(mysqli_num_rows($publicaciones)>0){
    while($fila=mysqli_fetch_array($publicaciones)){
        $id_usuario_pub = $fila['id_usuario'];
        $nombre_usuario_pub = $fila['usuario'];
        $foto_perfil= $fila['foto_perfil'];
        $id_publicacion = $fila['id_publicacion'];
        $contenido = $fila['contenido'];
        $adjunto  = $fila['arch_adjunto'];
        $fecha_pub = $fila['fecha_publicacion'];
        #$id_elemento_likes_buscado =$id_publicacion;
       # $tipo_publicacion = 'publicacion';
        #include("mostrar_likes.php");
        include("todas_las_publicaciones.php");
    }
#sino tengo amigos solo veo mis publicaciones
}else{
    include("mis_publicaciones_bbdd.php");
}

