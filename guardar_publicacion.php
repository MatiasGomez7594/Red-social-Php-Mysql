<?php


//echo "la url es".$urlPagina;
    include("con_db.php");
    //print_r($_POST);
    $id_usuario=$_POST['id_usuario'];
    $contenido = $_POST['contenido'];
    $archivo_adjunto=$_FILES;
    if($archivo_adjunto){
        $archivo_adjunto=$_FILES['archivo_adjunto']['tmp_name'];
        $adjunto_name = $_FILES['archivo_adjunto']['name'];
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
        move_uploaded_file($archivo_adjunto,$file_server.$image_name);
        //echo $foto=$_FILES['foto']['tmp_name'];
        //esto es la imagen 
        $consulta = "INSERT INTO publicaciones (id_usuario,contenido,arch_adjunto)
        VALUES('$id_usuario','$contenido','$route')";
    }else{
        $consulta = "INSERT INTO publicaciones (id_usuario,contenido)
        VALUES('$id_usuario','$contenido')";
    }
    $resultado = mysqli_query($conexion,$consulta);
    if($resultado){
        echo "ok";
        //include("nueva_publicacion.php");
    }else{
        header("location: inicio.php");

    }



?>
