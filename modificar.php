<?php
    //print_r($_POST);
    //print_r($_FILES);
    if(isset($_POST['aceptar'])){
            include("con_db.php");
            $id=$_POST['id'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $foto = $_FILES['adjunto']['tmp_name'];
            if($foto){
                $foto_name = $_FILES['adjunto']['name'];
                // ruta absolute del servidor de archivos donde se guardarán las imágenes que subamos
                $file_server= $_SERVER['DOCUMENT_ROOT'].'/REDSOCIAL-PHP-MYSQL/images/';
                //echo $file_server;
                //carpeta donde están almacenadas todas las imagenes
                $directorio = "images/";
                //otra manera de obtener el nombre del archivo que subo
                $image_name = basename($foto_name);
                //echo $image_name;
                //esta es la ruta absoluta del archivo
                $route = $directorio.$image_name;
                //echo $route;
                // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                //concatenado al nombre del archivo subido
                move_uploaded_file($foto,$file_server.$image_name);
                //echo $foto=$_FILES['adjunto']['tmp_name'];
                //esto es la imagen 
                $consulta = "UPDATE
                usuarios SET nombre_usuario ='$nombre', correo ='$email', contrasena ='$password',
                foto_perfil='$route'
                WHERE id='$id'";
            }else{
                $consulta = "UPDATE
                usuarios SET nombre_usuario ='$nombre', correo ='$email', contrasena ='$password'
                WHERE id='$id'";
            }
            $resultado = mysqli_query($conexion,$consulta);
            if($resultado){
                ?>
                <script>
                       window.location = "modificar_informacion.php"
                </script>
            <?php
            }else{
                ?>
                <script>
                        alert("Hubo un error intente mas tarde")
                       window.location = "modificar_informacion.php"
                </script>
              <?php
            }
    }
?>
