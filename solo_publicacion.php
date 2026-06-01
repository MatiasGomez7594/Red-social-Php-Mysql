<div class="ver_solo_publicacion">
        <form class="solo_publicacion" enctype="multipart/form-data">
            <div class="solo_publicacion_menu">
                <input type="button" value="Cancelar" onclick="mostrar_editar_publicacion()">
                <h1>Editar tu publicacion</h1>
                <input type="submit" value="Guardar" id="editar-publicacion">
            </div>
            <div class="editar-adjunto">
                <i class="fas fa-file-upload"></i>
                <input name="adjunto" type="file" id="editar-adjunto">
            </div>
            
            <input type="hidden" name="id-publicacion" id="id-publicacion">
            <textarea class="editar-comentario" name="contenido" id="editar-comentario" placeholder="Escribe algo..." rows='1'></textarea>
            <div class="solo_publicacion_img">
                <img class="editar-img" alt="publicacion" id="editar-img" >
                <p class="cerrar">X</p>
            </div>
        </form >
</div>
        <script>
            var textarea = document.querySelector('textarea');
            textarea.addEventListener('keydown', autosize);
            function autosize(){
                var el = this;
                setTimeout(function(){
                    el.style.cssText = 'height:auto; padding:0';
                    el.style.cssText = 'height:' + el.scrollHeight + 'px';
                    },0);
            }       
        </script>