<?php

//print_r($_POST);
    if(!empty($_POST['mensaje'])){
        include("con_db.php");
        $id_usuario = $_POST['id_remitente'];
        $id_receptor = $_POST['id_receptor'];
        $mensaje = $_POST['mensaje'];
        $guardarMensaje = "INSERT INTO mensajes(id_remitente,id_usuario,mensaje,tipo_mensaje)
                            VALUES('$id_usuario','$id_receptor','$mensaje','mensaje')";
        $resultado = $conexion->query($guardarMensaje);
        if($resultado){
            echo $mensaje;
        }
    }
?>