<?php
//print_r($_POST);
    include("con_db.php");
    $id_elemento=$_POST['id_elemento'];
    $id_usuario = $_POST['id_usuario'];
    $tipo_elemento = $_POST['tipo_elemento'];
    $buscar_me_gusta="SELECT id_me_gusta FROM me_gustas 
                    WHERE id_elemento='$id_elemento' 
                    AND id_usuario='$id_usuario' 
                    AND tipo_elemento='$tipo_elemento'";
    $resultado = mysqli_query($conexion,$buscar_me_gusta);
    if(mysqli_num_rows($resultado)>0){
        $borrar_me_gusta="DELETE FROM me_gustas WHERE id_elemento='$id_elemento'
                    AND id_usuario='$id_usuario' AND tipo_elemento='$tipo_elemento'";
        $resultado = mysqli_query($conexion,$borrar_me_gusta);  
      
    }else{
        $guardar_me_gusta="INSERT INTO me_gustas(id_usuario,id_elemento,tipo_elemento) 
            VALUES('$id_usuario','$id_elemento','$tipo_elemento')";
        $resultado = mysqli_query($conexion,$guardar_me_gusta);  
      
        /*
            if($resultadoLikes && $id_otro !=$id_usuario){ 
                $mensaje=" le gusta tu ".$tipo_elemento;
                $guardarMensaje="INSERT INTO mensajes(id_usuario,id_remitente,mensaje,tipo_mensaje,id_publicacion)
                                VALUES ('$id_otro','$id_usuario','$mensaje','notificacion','$id_publicacion')";
                $resultado=$conexion->query($guardarMensaje);
            }
            */
        
    }
    require("ver_me_gustas.php");

    
   


?>