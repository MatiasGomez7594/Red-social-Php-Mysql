<?php
//para crear una sesion
session_start();
//para evitar que ingresen sin iniciar sesión
//sino existe la variable sesion 
//por ejemplo al cerrar la sesión
if(!isset($_SESSION['usuario'])){
    header("location: index.php");
    session_destroy();
    die();
}

include('con_db.php');

$id_usuario = $_SESSION['usuario'];

$buscar_usuario_sesion = "SELECT * FROM usuarios WHERE id_usuario='$id_usuario'";

$resultado = mysqli_query($conexion,$buscar_usuario_sesion);


$row = $resultado->fetch_assoc();
$nombre_usuario = $row['usuario'];
$email_usuario = $row['email'];
$password_usuario = $row['contrasena'];

?>

