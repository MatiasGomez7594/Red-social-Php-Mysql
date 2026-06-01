
<form class="postear" id= "nueva_publicacion"  enctype="multipart/form-data">
            <div class="mi-post">
                <img class="foto-perfil" src="<?php 
                            $id_foto_buscada = $id_usuario;
                            include("ver_foto_perfil.php");
                            echo $foto;?>" alt="foto perfil" width="50px">
                 <textarea name="contenido" id="mi-publicacion-txt"cols="100" rows="3" autocomplete="off" type="text" placeholder="<?php echo $nombre_usuario;?> escribe algo..."></textarea>
                 <div class="input-adjunto">
                    <i class="fas fa-image"></i>
                    <input name="adjunto" type="file" id="mi-publicacion-archivo-adjunto" accept="image/*">
                </div>
            </div>
            <input type="hidden" name="id" id="id-usuario-sesion" value="<?php echo $id_usuario;?>">
            <input type="button" class="btnPublicar" id="btnPublicar" name="postear" value="publicar"   onclick="guardar_publicacion()">
            <div id="preview-adjunto">
            </div>
</form>
<script>
            var textarea = document.querySelector('#mi-publicacion-txt');
            textarea.addEventListener('keydown', autosize);
            function autosize(){
                var el = this;
                setTimeout(function(){
                    el.style.cssText = 'height:auto; padding:0';
                    el.style.cssText = 'height:' + el.scrollHeight + 'px';
                    },0);
            }       
        </script>
