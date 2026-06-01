<?php

include("con_db.php");
$consulta = "SELECT id_solicitud,id_solicitado,id_solicitante FROM solicitudes_amistad WHERE (id_solicitante ='$id_usuario'  
                OR id_solicitado = '$id_usuario') AND estado='2'";
$amigos = $conexion->query($consulta);




?>
