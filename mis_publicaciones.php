<div class="contenedor_publicaciones">
<div class="publicacion mi_publicacion">
    <div class="publicacion_info">
        <a href="ver_cuenta.php">
            <img class="foto_perfil" src="<?php echo                         
            $foto_perfil_us = $foto_perfil;?>" alt="foto perfil">
        </a>
        <a class="ver_cuenta_link " href="ver_cuenta.php">
            <p class="nombre_usuario_link"><?php echo $nombre_usuario_pub;?></p>
            <p><?php $fecha_pub = include("calcular_fecha.php");?></p>
        </a>
    </div>
    <div class="contenido_publicacion">
        <p class="txt_publicacion"><?php echo $contenido?></p>
        <img class="publicacion_img_adjunta" src="<?php echo $adjunto?>" alt="">
    </div>
    <div class="contenedor_estadisticas_publicacion">
        <p class="total_me_gusta" id="publicacion<?php echo $id_publicacion?>">
            <?php
            $ver_me_gustas="SELECT id_me_gusta FROM me_gustas
            WHERE id_elemento ='$id_publicacion' 
            AND tipo_elemento = 'publicacion'";
            $total_me_gustas= mysqli_query($conexion,$ver_me_gustas);
            if(mysqli_num_rows($total_me_gustas)>0){
                echo mysqli_num_rows($total_me_gustas).' me gusta';
            }
            ?>
        </p>        
        <p class="total_comentarios" id="comentarios_publicacion<?php echo $id_publicacion?>">
                <?php     
                $buscar_comentarios = "SELECT id_comentario FROM comentarios 
                WHERE comentarios.id_publicacion = $id_publicacion";
                $total_comentarios = mysqli_query($conexion,$buscar_comentarios);
            if(mysqli_num_rows($total_comentarios)>0){
                echo mysqli_num_rows($total_comentarios).' comentarios';
            }?></p>
    </div>
    <div class="contenedor_opciones_publicacion">
        <i class="fas fa-thumbs-up" onclick="me_gusta(<?php echo $id_publicacion?>,'publicacion',<?php echo $id_usuario?>)"></i>
        <i class="fas fa-comment" onclick="ver_comentarios(<?php echo $id_publicacion?>)"></i>    
    </div>
    <?php include("comentarios.php");?>

</div>
</div>