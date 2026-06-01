<?php
include("con_db.php");
$consulta = "SELECT id_comentario,id_usuario,comentario,fecha FROM comentarios WHERE id_post='$id_post'";
$comentarios = $conexion->query($consulta);

?>