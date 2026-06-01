<?php
$email = $_POST['email'];
include("con_db.php");

//verifico que el correo no este en la BBDD
$buscar_usuario = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($conexion, $buscar_usuario);
//verifico que se haya encontrado una fila que coincida con la busqueda
if(mysqli_num_rows($resultado)){
    //solo usuarios no registrados
    $registro_encontrado = true;
    
}else{
    $registro_encontrado = false;
            
}
return $registro_encontrado;

mysqli_close($conexion);



?>