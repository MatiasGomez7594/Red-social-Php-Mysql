<?php
include("con_db.php");
$consulta = "SELECT nombre_usuario FROM usuarios WHERE id='$id_buscado'";
$nombreResultado= $conexion->query($consulta);
if($nombreResultado){
    $row = $nombreResultado->fetch_array();
    $nombre_encontrado = $row['nombre_usuario'];
}

?>
