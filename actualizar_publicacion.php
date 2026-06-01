<?php

include("con_db.php");
$id_post = $_POST['id-publicacion'];
$consulta = "SELECT contenido,adjunto FROM usuarios_posts WHERE id_post ='$id_post'";
$resultado = $conexion->query($consulta);
if($resultado){
    $row = $resultado->fetch_assoc();
    $contenido = $row['contenido'];
    $adjunto = $row['adjunto'];
    print_r(json_encode(array($contenido,$adjunto)));
}else{
    header("location: bienvenida.php");
}

?>
