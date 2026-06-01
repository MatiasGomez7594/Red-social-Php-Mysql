<?php
//print_r ($_GET);
include("componentes/sesion.php");
include("componentes/header.php");
$id_otro_usuario = $_GET['id']; 
$consulta = "SELECT usuario,id_usuario FROM usuarios WHERE id_usuario='$id_otro_usuario' AND
id_usuario  <> '$id_usuario'";
$resultado = $conexion->query($consulta);
$row = $resultado->fetch_assoc();
$nombre_otro_usuario = $row['nombre_usuario'];
$id_otro = $row['id'];
include("componentes/header_cuenta_usuario.php");
$vista = isset($_GET['p']) ? strtolower($_GET['p']) : 'publicaciones_usuario';
require_once 'componentes/'.$vista.'.php';
include("componentes/footer.php");

 
    
?>

