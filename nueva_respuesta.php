<?php
//con esta consulta obtengo el comentario mas reciente hecho por el usuario
    $buscar_respuesta = "SELECT respuestas_comentarios.id_comentario,
    respuestas_comentarios.id_usuario_respuesta,
    respuestas_comentarios.id_respuesta,
    respuestas_comentarios.contenido_res,
    respuestas_comentarios.fecha_respuesta,
    usuarios.usuario,usuarios.foto_perfil 
    FROM respuestas_comentarios INNER JOIN usuarios 
    WHERE respuestas_comentarios.id_usuario_respuesta = usuarios.id_usuario 
    AND respuestas_comentarios.id_comentario = $id_comentario
    AND respuestas_comentarios.id_usuario_respuesta = $id_usuario
    ORDER BY fecha_respuesta DESC LIMIT 1;";
    $respuesta = mysqli_query($conexion,$buscar_respuesta);
            //verifico que se haya encontrado una fila que coincida con la busqueda
            if(mysqli_num_rows($respuesta)>0){
                while($fila=mysqli_fetch_array($respuesta)){
                    $id_usuario_respuesta = $fila['id_usuario_respuesta'];
                    $id_respuesta = $fila['id_respuesta'];
                    $id_comentario = $fila['id_comentario'];
                    $nombre_usuario_res = $fila['usuario'];
                    $foto_perfil= $fila['foto_perfil'];
                    $contenido_res = $fila['contenido_res'];
                    $fecha_res = $fila['fecha_respuesta'];
                    $fecha_pub = $fecha_res;
                    #$id_elemento_likes_buscado =$id_publicacion;
                   # $tipo_publicacion = 'publicacion';
                    #include("mostrar_likes.php");
                    #$id_foto_buscada = $id_usuario_pub;
                
                }
            }?>                    
                    <div class="respuesta respuesta<?php echo $id_comentario?>" >
                        <div class="respuesta_info">
                            <a class="foto_perfil_link" href="ver_cuenta.php">
                             <img class="foto_perfil" src="<?php 
                                echo $foto_perfil;?>" alt="foto perfil">
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
                            <i class="fas fa-thumbs-up"><?php echo '1'?></i>
                            <button onclick="ver_form_responder(<?php echo $id_comentario.$id_respuesta;?>)">Responder</button>
                        </div> 
                        <div id="form_responder<?php echo $id_comentario.$id_respuesta?>" class=" form_responder" >
                            <div class="contenedor_info_responder">
                                <label   for="input_responder<?php echo $id_comentario.$id_respuesta;?>">
                                    <img class="foto_perfil" src="<?php echo $foto_perfil;?>" alt="foto-perfil" >
                                </label>
                                <input class="input_responder" id="input_responder<?php echo $id_comentario.$id_respuesta;?>"type="text" 
                                 name="comentario" placeholder="Escribe una respuesta..." autocomplete="off">
                             </div>
                            <div class="respuesta_opciones">
                                <input type="button" value="Responder" onclick="responder(<?php echo $id_comentario;?>,<?php echo $id_usuario;?>,<?php echo $id_respuesta;?>)">
                                <input type="button" value="cancelar" onclick="ocultar_form_responder(<?php echo $id_comentario.$id_respuesta;?>)">
                            </div>
                        </div>
                    </div>