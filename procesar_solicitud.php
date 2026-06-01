<?php
//print_r($_GET);
$id_solicitud = $_GET['id_solicitud'];
$id_solicitante = $_GET['id_solicitante'];
$id_solicitado = $_GET['id_solicitado'];
include("con_db.php");

if(isset($_GET['solicitar'])){
    $consulta = "INSERT INTO solicitudes_amistad (id_solicitante,id_solicitado,estado)
                VALUES('$id_solicitante','$id_solicitado','1')";
    $resultado = $conexion->query($consulta);
    if($resultado){
        $mensaje ="te ha enviado una solicitud de amistad";
        $consulta = "INSERT INTO mensajes (id_usuario,id_remitente,mensaje,tipo_mensaje)
                    VALUES('$id_solicitado','$id_solicitante','$mensaje','solicitud')";
        $resultado = $conexion->query($consulta);
        echo "<script type='text/javascript'>
        window.history.back(-1)</script>";
    }

    
}else if(isset($_GET['cancelar'])){
        $consulta = "DELETE FROM solicitudes_amistad WHERE id_solicitud = '$id_solicitud'";
        $resultado = $conexion->query($consulta);
        if($resultado){
            $consulta = "DELETE FROM mensajes WHERE id_remitente='$id_solicitante' AND 
            id_usuario = '$id_solicitado' AND
            tipo_mensaje = 'solicitud'";
            $resultado = $conexion->query($consulta);
        }

}else if(isset($_GET['aceptar'])){
        $consulta ="UPDATE solicitudes_amistad SET estado='2'
                    WHERE id_solicitud = '$id_solicitud'";
        $resultado = $conexion->query($consulta);
        if($resultado){
            $mensaje ="aceptó tu solicitud de amistad";
            $consulta = "INSERT INTO mensajes (id_usuario,id_remitente,mensaje,tipo_mensaje)
                        VALUES('$id_solicitante','$id_solicitado','$mensaje','notificacion_solicitud')";
            $resultado = $conexion->query($consulta);
            if($resultado){
                $consulta = "DELETE FROM mensajes WHERE id_remitente='$id_solicitante' AND id_usuario='$id_solicitado'
                AND tipo_mensaje='solicitud'";
                $resultado = $conexion->query($consulta);
            }

        }
}else{
    $consulta = "DELETE FROM solicitudes_amistad WHERE id_solicitud = '$id_solicitud'";
    $resultado = $conexion->query($consulta);
    if($resultado){
        $consulta = "DELETE FROM mensajes WHERE id_remitente='$id_solicitante' AND id_usuario='$id_solicitado'
        AND tipo_mensaje='solicitud'";
        $resultado = $conexion->query($consulta);
        
    }
}

?>