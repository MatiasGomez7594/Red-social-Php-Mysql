<?php

include("con_db.php");
$id_post = $_POST['id-publicacion'];
$contenido = $_POST['contenido'];

$adjunto=$_FILES['adjunto']['tmp_name'];
if($adjunto){
    $adjunto_name = $_FILES['adjunto']['name'];
    // ruta absolute del servidor de archivos donde se guardarán las imágenes que subamos
    $file_server= $_SERVER['DOCUMENT_ROOT'].'/REDSOCIAL-PHP-MYSQL/images/';
    //echo $file_server;
    //carpeta donde están almacenadas todas las imagenes
    $directorio = "images/";
    //otra manera de obtener el nombre del archivo que subo
    $image_name = basename($adjunto_name);
    //echo $image_name;
    //esta es la ruta absoluta del archivo
    $route = $directorio.$image_name;
    //echo $route;
    // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
    //concatenado al nombre del archivo subido
    move_uploaded_file($adjunto,$file_server.$image_name);
    //echo $foto=$_FILES['foto']['tmp_name'];
    //esto es la imagen 
    $consulta = "UPDATE usuarios_posts  SET contenido='$contenido',
                adjunto = '$route' WHERE id_post ='$id_post'";
}else {
    if(isset($_POST['adjunto_eliminado'])){
        $adjunto = $_POST['adjunto_eliminado'];
        $consulta ="UPDATE usuarios_posts  SET contenido='$contenido', adjunto = '' 
                    WHERE id_post ='$id_post'";
    }else{
        $consulta ="UPDATE usuarios_posts  SET contenido='$contenido' 
        WHERE id_post ='$id_post'";

    }

}

$resultado = $conexion->query($consulta);
if($resultado){
    include("actualizar_publicacion.php");
}else{
    echo "Hubo un error pruebe mas tarde";

  }
                    



?>