<?php

include("con_db.php");
$buscar_amigo_comun="SELECT id_solicitud,id_solicitante,id_solicitado,estado 
                    FROM solicitudes_amistad 
                    WHERE id_solicitante='$id_amigo_comun'
                    AND id_solicitado='$id_usuario_copia'
                    OR id_solicitante='$id_usuario_copia' 
                    AND id_solicitado='$id_amigo_comun'";
$amigo_comun=$conexion->query($buscar_amigo_comun);
$estado_solicitud_comun=0;
if($amigo_comun){
    $row=$amigo_comun->fetch_assoc();
    $id_solicitud_comun=$row['id_solicitud'];
    $id_solicitante_comun=$row['id_solicitante'];
    $id_solicitado_comun=$row['id_solicitado'];
    $estado_solicitud_comun=$row['estado'];

}
?>