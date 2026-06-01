<?php
    include("con_db.php");
    $consulta = "SELECT  * FROM mensajes WHERE id_usuario='$id_usuario'  ORDER BY fecha DESC";
    $mensajes = $conexion->query($consulta);
    $contador_mensajes = $mensajes->num_rows;
?>

