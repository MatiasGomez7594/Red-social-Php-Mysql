<?php
include("con_db.php");
$consulta = "SELECT * FROM respuestas_comentarios WHERE id_comentario='$id_comentario'";
$respuestas = $conexion->query($consulta);


?>