<?php
include("con_db.php");
    $id_post = $_POST['id_post'];
    $consulta = "DELETE FROM usuarios_posts WHERE id_post ='$id_post'";
    $resultado = $conexion->query($consulta);
    if($resultado){
        echo "ok";
    }else{
        echo "no";
    }



