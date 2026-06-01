<?php
    include("con_db.php");
    if(isset($_POST['mensajes_leidos'])){
        $id_receptor=$_POST['id_usuario'];
        $mensajes_leidos="UPDATE mensajes SET estado='leido'
                    WHERE id_usuario='$id_receptor'";
        $resultado=$conexion->query($mensajes_leidos);
        if($resultado){
            return true;
    
        }
    }
                
