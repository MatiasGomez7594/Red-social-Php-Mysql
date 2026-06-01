<?php

include("con_db.php");
//print_r($_POST);
//print_r($_FILES);
$id_post = $_POST['id_post'];
$publicacion_compartir = "SELECT contenido,adjunto FROM usuarios_posts 
                        WHERE id_post = '$id_post'";
$resultado = mysqli_query($conexion,$publicacion_compartir);
if($resultado){
    $id_usuario=$_POST['id_usuario'];
    while($publicacion = $resultado->fetch_assoc()){
        $contenido = $publicacion['contenido'];
        $adjunto = $publicacion['adjunto'];
    }
    if($adjunto){
        $consulta = "INSERT INTO usuarios_posts (id_usuario,contenido,adjunto)
        VALUES('$id_usuario','$contenido','$adjunto')";
    }else{
        $consulta = "INSERT INTO usuarios_posts (id_usuario,contenido)
        VALUES('$id_usuario','$contenido')";
    }
    $resultado = mysqli_query($conexion,$consulta);
    if($resultado){
        echo 'Compartiste esta publicacion';
    }else{
        echo 'No se puede compartir la publicacion';
        
    }
     
 }else{
    echo 'No se puede compartir la publicacion';
 }





