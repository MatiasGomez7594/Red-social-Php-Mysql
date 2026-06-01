<?php

include("con_db.php");
$consulta = "SELECT * FROM solicitudes_amistad WHERE id_solicitante ='$id_usuario'  
                AND id_solicitado='$id_usuario_encontrado' OR id_solicitante ='$id_usuario_encontrado'  
                AND id_solicitado='$id_usuario'";
$solicitud = $conexion->query($consulta);
$estado_solicitud = 0;
if($solicitud){ 
    while( $row = $solicitud->fetch_array()){
        $id_solicitante = $row['id_solicitante'];
        $id_solicitado = $row['id_solicitado'];
        $estado_solicitud = $row['estado'];
        $id_solicitud = $row['id_solicitud'];   
    }
   

}


?>