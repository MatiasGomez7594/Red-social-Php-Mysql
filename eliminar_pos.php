<?php


//print_r($_GET);
include("con_db.php");
$id_post = $_GET['id_post'];
$urlPagina = $_GET['url'];
$consulta = "SELECT contenido FROM usuarios_posts WHERE id_post ='$id_post'";
$resultado = $conexion->query($consulta);
if($resultado){
    $row = $resultado->fetch_assoc();
    //echo $row['contenido'];
}else{
    header("location: $urlPagina");
}

?>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/editar_publicacion.css">
<form class="editar-publicacion" method="POST" action="eliminar.php">
    <h1>¿De verdad desea eliminar su publicación?</h1>
    <input type="text" value="<?php echo $row['contenido']?>" style="border:none;"name="contenido" disabled="true">
    <img src="ver_adjunto.php?id=<?php echo $id_post?>">
    <div class="contenedor-input">
    <input type="hidden" value="<?php echo $urlPagina?>" name="url" >
    <input type="hidden" value="<?php echo $id_post?>" name="id_post">
    <input type="submit" value="Aceptar" name="aceptar">
    <input type="submit" value="Cancelar" name="cancelar">
    </div>
</form>
<?php
//print_r($_GET);

