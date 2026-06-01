<?php

$mis_publicaciones = "SELECT publicaciones.id_publicacion,
publicaciones.id_usuario,publicaciones.contenido,publicaciones.arch_adjunto,
publicaciones.fecha_publicacion,
usuarios.usuario,usuarios.foto_perfil
 FROM publicaciones  INNER JOIN usuarios ON publicaciones.id_usuario = '$id_usuario'
 AND usuarios.id_usuario = '$id_usuario' 
 ORDER BY fecha_publicacion DESC";
$todas_mis_publicaciones = mysqli_query($conexion,$mis_publicaciones);

//verifico que se haya encontrado una fila que coincida con la busqueda
if(mysqli_num_rows($todas_mis_publicaciones)>0){
    while($fila=mysqli_fetch_array($todas_mis_publicaciones)){
        $id_usuario_pub = $fila['id_usuario'];
        $id_publicacion = $fila['id_publicacion'];
        $nombre_usuario_pub = $fila['usuario'];
        $foto_perfil= $fila['foto_perfil'];
        $contenido = $fila['contenido'];
        $adjunto  = $fila['arch_adjunto'];
        $fecha_pub = $fila['fecha_publicacion'];
        

        #$id_elemento_likes_buscado =$id_publicacion;
       # $tipo_publicacion = 'publicacion';
        #include("mostrar_likes.php");
        #$id_foto_buscada = $id_usuario_pub;
        #include("ver_foto_perfil.php");
        include("mis_publicaciones.php");
    
    }
    
    

}