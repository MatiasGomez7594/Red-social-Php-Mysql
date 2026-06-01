<?php
$foto_perfil = "SELECT foto_perfil FROM usuarios WHERE id_usuario='$id_foto_buscada'";
$buscar_foto = mysqli_query($conexion,$foto_perfil);
if($buscar_foto){
    $foto_encontrada=$buscar_foto->fetch_array();
    $foto = $foto_encontrada['foto_perfil'];

}