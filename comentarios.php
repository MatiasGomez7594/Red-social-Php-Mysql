            
            <div class="contenedor_comentarios" id="contenedor_comentarios<?php echo $id_publicacion?>">
                <div id="form_comentar<?php echo $id_publicacion?>" class="form_comentar" >
                <div class="contenedor_info_comentar">
                    <label   for="input_comentar<?php echo $id_publicacion;?>">
                        <img class="foto_perfil" src="<?php echo $foto_perfil_us;?>" alt="foto-perfil" >
                    </label>
                    <input type="hidden" name="id_usuario_post" id="id_usuario_publicacion<?php echo $id_usuario_pub;?>" value="<?php echo $id_usuario_pub;?>">
                    <input class="input_comentar" id="input_comentar<?php echo $id_publicacion;?>"type="text" 
                    name="comentario" placeholder="Escribe un comentario..." autocomplete="off">
                </div>
                    <div class="comentario_opciones">
                        <input type="button" value="Comentar" onclick="comentar(<?php echo $id_publicacion;?>,<?php echo $id_usuario;?>)">
                        <input type="button" value="cancelar" onclick="ocultar_comentarios(<?php echo $id_publicacion;?>)">
                    </div>
                </div>
                <?php include('comentarios_bbdd.php');?>

            </div>