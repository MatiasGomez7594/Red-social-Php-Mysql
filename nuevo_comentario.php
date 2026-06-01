<?php
//con esta consulta obtengo el comentario mas reciente hecho por el usuario
    $buscar_comentario = "SELECT comentarios.id_comentario,comentarios.id_usuario,
    comentarios.contenido,comentarios.fecha_comentario,usuarios.usuario,usuarios.foto_perfil 
    FROM comentarios INNER JOIN usuarios 
    WHERE comentarios.id_usuario = usuarios.id_usuario AND comentarios.id_publicacion = $id_publicacion
    AND comentarios.id_usuario = $id_usuario
    ORDER BY fecha_comentario DESC LIMIT 1;";
    $comentario = mysqli_query($conexion,$buscar_comentario);
            //verifico que se haya encontrado una fila que coincida con la busqueda
            if(mysqli_num_rows($comentario)>0){
                while($fila=mysqli_fetch_array($comentario)){
                    $id_usuario_com = $fila['id_usuario'];
                    $id_comentario = $fila['id_comentario'];
                    $nombre_usuario_com = $fila['usuario'];
                    $foto_perfil= $fila['foto_perfil'];
                    $contenido = $fila['contenido'];
                    $fecha_com = $fila['fecha_comentario'];
                    $fecha_pub = $fecha_com;
                    #$id_elemento_likes_buscado =$id_publicacion;
                   # $tipo_publicacion = 'publicacion';
                    #include("mostrar_likes.php");
                    #$id_foto_buscada = $id_usuario_pub;
                
                }
            }?>
            <div class="comentario mi_comentario" id="comentario<?php echo $id_comentario?>">
                <div class="comentario_info">
                    <a class="foto_perfil_link" href="ver_cuenta.php">
                        <img class="foto_perfil" src="<?php 
                        $foto_perfil_us = $foto_perfil;
                        echo $foto_perfil_us;?>" alt="foto perfil">
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
                    <i class="fas fa-thumbs-up">1</i>
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