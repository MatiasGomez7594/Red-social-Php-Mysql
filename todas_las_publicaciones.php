<div class="contenedor_publicaciones">
    <?php
        if($id_usuario_pub == $id_usuario){
            ?>
            <div class="publicacion mi_publicacion">
                <div class="publicacion_info">
                    <a class="foto_perfil_link" href="ver_cuenta.php">
                        <img class="foto_perfil" src="<?php 
                        $foto_perfil_us = $foto_perfil;
                        echo $foto_perfil;?>" alt="foto perfil">
                    </a>
                    <a class="ver_cuenta_link " href="ver_cuenta.php">
                        <p class="nombre_usuario_link"><?php echo $nombre_usuario_pub;?></p>
                        <p><?php $fecha_pub = include("calcular_fecha.php");?></p>
                    </a>
                </div>
                <div class="contenido_publicacion">
                    <h3><?php echo $contenido?></h3>
                    <img src="<?php echo $adjunto?>" alt="">
                </div>
                <div class="contenedor_estadisticas_publicacion">
                    <p class="total_me_gusta" id="publicacion<?php echo $id_publicacion?>">
                    <?
                    $id_elemento = $id_publicacion;
                    $tipo_elemento = 'publicacion';
                    require('ver_me_gustas.php')?>
                    </p>                    
                    <p class="total_comentarios">4 comentarios</p>
                </div>
                <div class="contenedor_opciones_publicacion">
                    <i class="fas fa-thumbs-up" onclick="me_gusta(<?php echo $id_publicacion?>,'publicacion',<?php echo $id_usuario?>)"></i>
                    <i class="fas fa-comment" onclick="ver_comentarios(<?php echo $id_publicacion?>)"></i>    
                </div>
                <?php include("comentarios.php");?>
            </div>
            <?php

        }else{
            ?>
            <div class="publicacion publicacion_de_otro">
                <div class="publicacion_info">
                    <a href="ver_cuenta_otro_usuario.php?id=<?php echo $id_usuario_pub?>">
                        <img class="foto_perfil" src="<?php echo $foto_perfil;?>" alt="foto perfil">
                    </a>
                    <a class="ver_cuenta_link " href="ver_cuenta.php">
                        <p class="nombre_usuario_link"><?php echo $nombre_usuario_pub;?></p>
                        <p><?php $fecha_pub = include("calcular_fecha.php");?></p>
                    </a>
                </div>
                <div class="contenido_publicacion">
                    <h3><?php echo $contenido?></h3>
                    <img src="<?php echo $adjunto?>" alt="">
                </div>
                <div class="contenedor_estadisticas_publicacion">
                    <p class="total_me_gusta" id="publicacion<?php echo $id_publicacion?>">
                    <?
                        $id_elemento = $id_publicacion;
                        $tipo_elemento = 'publicacion';
                        require('ver_me_gustas.php')?>
                    </p>        
                    <p class="total_comentarios">6 comentarios</p>
                </div>
                <div class="contenedor_opciones_publicacion">
                <i class="fas fa-thumbs-up"  onclick="me_gusta(<?php echo $id_publicacion?>,'publicacion',<?php echo $id_usuario?>)"></i>
                    <i class="fas fa-comment" onclick="ver_comentarios(<?php echo $id_publicacion?>)"></i>    
                </div>
                <?php include("comentarios.php");?>
            </div>
    <?php
        }
    
    ?>
</div>