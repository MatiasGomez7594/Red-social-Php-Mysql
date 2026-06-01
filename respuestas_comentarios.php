                <div class="contenedor_respuestas_comentario contenedor_respuestas_comentario<?php echo $id_comentario?>" id="contenedor_respuestas_comentario<?php echo $id_comentario?>">
                    <div class="respuesta respuesta<?php echo $id_comentario?>" >
                        <div class="respuesta_info">
                            <a class="foto_perfil_link" href="ver_cuenta.php">
                             <img class="foto_perfil" src="<?php echo $foto_perfil_us;?>" alt="foto perfil">
                            </a>
                            <a class="ver_cuenta_link " href="ver_cuenta.php">
                                <p class="nombre_usuario_link"><?php echo $nombre_usuario_res;?></p>
                                <p><?php  $fecha_pub = include("calcular_fecha.php");?></p>
                            </a>
                        </div>
                        <div class="contenido_respuesta">
                            <h3><?php echo $contenido_res?></h3>
                        </div>
                        <div class="contenedor_opciones_respuesta">
                            <i class="fas fa-thumbs-up"><?php echo '12'?></i>  
                            <button onclick="ver_form_responder(<?php echo $id_comentario.$id_respuesta;?>)">Responder</button>
                        </div> 
                        <div id="form_responder<?php echo $id_comentario.$id_respuesta;?>" class=" form_responder" >
                            <div class="contenedor_info_responder">
                                <label   for="input_responder<?php echo $id_publicacion;?>">
                                    <img class="foto_perfil" src="<?php echo $foto_perfil_us;?>" alt="foto-perfil" >
                                </label>
                                <input type="hidden" name="id_usuario_post" id="id_usuario_publicacion<?php echo $id_usuario_pub;?>" value="<?php echo $id_usuario_pub;?>">
                                <input class="input_responder" id="input_responder<?php echo $id_comentario.$id_respuesta;?>"type="text" 
                                name="comentario" placeholder="Escribe una respuesta ...<?php echo $id_comentario.$id_respuesta;?>" autocomplete="off">
                            </div>
                            <div class="respuesta_opciones">
                                <input type="button" value="Responder" onclick="responder(<?php echo $id_comentario;?>,<?php echo $id_usuario;?>,<?php echo $id_respuesta;?>)">
                                <input type="button" value="cancelar" onclick="ocultar_form_responder(<?php echo $id_comentario;?>)">
                            </div>
                        </div>
                    </div>
                </div>