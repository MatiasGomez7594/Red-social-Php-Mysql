            <div class="comentario mi_comentario" id="comentario<?php echo $id_comentario?> ">
                <div class="comentario_info">
                    <a class="foto_perfil_link" href="ver_cuenta.php">
                        <img class="foto_perfil" src="<?php 
                        $foto_perfil_us = $foto_perfil;
                        echo $foto_perfil;?>" alt="foto perfil">
                    </a>
                    <a class="ver_cuenta_link " href="ver_cuenta.php">
                        <p class="nombre_usuario_link"><?php echo $nombre_usuario_com;?></p>
                        <p><?php  $fecha_pub = include("calcular_fecha.php");?></p>
                    </a>
                </div>
                <div class="contenido_comentario">
                    <h3><?php echo $contenido?></h3>
                </div>
                <div class="contenedor_opciones_comentario">
                    <i class="fas fa-thumbs-up"><?php echo '12'?></i>
                    <i class="fas fa-comment" onclick="ver_respuestas(<?php echo $id_comentario?>)">
                        <?php echo '3'?>
                    </i>    
                    <button onclick="ver_form_responder(<?php echo $id_comentario?>)">Responder</button>
                </div>
                    <div id="form_responder<?php echo $id_comentario?>" class="form_responder" >
                        <div class="contenedor_info_responder">
                            <label   for="input_responder<?php echo $id_publicacion;?>">
                                <img class="foto_perfil" src="<?php echo $foto_perfil_us;?>" alt="foto-perfil" >
                            </label>
                            <input type="hidden" name="id_usuario_post" id="id_usuario_publicacion<?php echo $id_usuario_pub;?>" value="<?php echo $id_usuario_pub;?>">
                            <input class="input_responder" id="input_responder<?php echo $id_comentario;?>"type="text" 
                            name="comentario" placeholder="Escribe una respuesta..." autocomplete="off">
                        </div>
                        <div class="respuesta_opciones">
                            <input type="button" value="Responder" onclick="responder(<?php echo $id_comentario;?>,<?php echo $id_usuario;?>)">
                            <input type="button" value="cancelar" onclick="ocultar_form_responder(<?php echo $id_comentario;?>)">
                        </div>
                    </div>
                <?php include('respuestas_comentarios_bbdd.php')?>
            </div>