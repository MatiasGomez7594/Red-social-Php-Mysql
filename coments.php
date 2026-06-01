<?php
                    include("mostrar_comentarios.php");
                    if($comentarios){
                        ?>
                        <div class="comentarios comentarios<?php echo $id_post?>" id="comentarios<?php echo $id_post?>">
                        <?php
                        while($row=$comentarios->fetch_array()){
                            $comentario = $row['comentario'];
                            $id_usuario_comentario = $row['id_usuario'];
                            $fecha = $row['fecha'];
                            $id_buscado = $id_usuario_comentario;
                            $id_comentario = $row['id_comentario'];
                            include("buscar_nombres.php");
                            $id_elemento_likes_buscado = $id_comentario;
                            $tipo_publicacion = 'comentario';
                            include("mostrar_likes.php");
                            
                            $id_foto_buscada = $id_usuario_comentario;
                            include("ver_foto_perfil.php");
                        ?>
                        <div id="comentario<?php echo $id_comentario?>" class="comentario" >
                            <?php
                            if($id_usuario_comentario == $id_usuario){
                                ?>
                                <a class="ver-cuenta" href="ver_cuenta.php">
                                    <img class="foto-perfil" src="<?php 
                                    $id_foto_buscada = $id_usuario;
                                        include("ver_foto_perfil.php");
                                        echo $foto;?>" alt="foto-perfil" >
                                    <div>
                                        <p class="nombre-usuario"><?php echo $nombre_usuario?></p>
                                        <p class="fecha-publicacion"><?php include("calcular_fecha.php");?></p>
                                    </div>
                                </a>
                                <?php
                                }else{
                                    ?>
                                    <a class="ver-cuenta" href="ver_cuenta_usuario.php?id=<?php echo $id_usuario_comentario?>">
                                        <img class="foto-perfil" src="<?php 
                                        $id_foto_buscada =$id_usuario_comentario;
                                        include("ver_foto_perfil.php");
                                        echo $foto;?>" alt="foto-perfil" >
                                    <div>
                                        <p class="nombre-usuario"><?php echo  $nombre_encontrado?></p>
                                        <p class="fecha-publicacion"><?php include("calcular_fecha.php");?></p>
                                    </div>
                                    </a>
                                <?php
                                }
                                ?>
                                <p class="comentario-texto">
                                <?php echo $comentario?>
                                </p>
                                <div class="comentario-opciones">
                                    <i class="input-like fas fa-thumbs-up" onclick="guardar_like('like',<?php echo $id_comentario?>,'<?php echo $tipo_publicacion?>',<?php echo $id_usuario?>,<?php echo  $id_usuario_comentario?>,<?php echo $id_post?>)"></i>
                                    <p class="total-likes total-likes-<?php echo $id_comentario?>-<?php echo $tipo_publicacion?>"><?php
                                    if($contadorLikes){
                                        echo $contadorLikes;
                                    } 
                                    ?>
                                    </p>
                                    <i class="input-unlike fas fa-thumbs-down" onclick="guardar_like('unlike',<?php echo $id_comentario?>,'<?php echo $tipo_publicacion?>',<?php echo $id_usuario?>,<?php echo  $id_usuario_comentario?>,<?php echo $id_post?>)"></i>
                                    <p class="total-likes total-unlikes-<?php echo $id_comentario?>-<?php echo $tipo_publicacion?>">
                                    <?php 
                                    if($contadorDislikes){
                                        echo $contadorDislikes;
                                    }
                                    ?>
                                    </p>
                                    <p class="responder-comentario"  onclick="verResponderComentario(<?php echo $id_comentario;?>,<?php echo  $id_usuario_comentario;?>,'comentario')"> 
                                        Responder
                                    </p>
                                </div>
                        <!-- respuestas al comentario-->
                        <?php include("resp.php");?>
                 
                        </div>
                    <?php
                        }
                              
                    }
                    ?>

                    </div>
                    <script>
            function verResponderComentario(id_respuesta,id_receptor,tipo){
                    //var id_usuario = document.getElementByName("id_usuario").value
                    //console.log("id_comentario: "+id_comentario+" id_usuario: "+id_usuario+"  id_receptor: "+id_receptor)
                    //el id debe ser diferente del name
                    $("#id-receptor"+id_respuesta+tipo).val(id_receptor)
                    console.log(id_receptor)
                    //var input_respuesta = document.getElementById("input-respuesta").value = id_receptor
                    var responderComentario = document.getElementById('responder'+id_respuesta+tipo)
                    if(responderComentario.style.display=="none"){
                        responderComentario.style.display="flex";
                    }else{
                        responderComentario.style.display="none";
                    }
                    }
        </script>