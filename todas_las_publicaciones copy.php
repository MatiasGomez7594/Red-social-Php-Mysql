
<?php
include("con_db.php");
#para ver mis publicaciones y las de mis amigos
$consulta ="SELECT DISTINCT id_publicacion,id_usuario,contenido,arch_adjunto,fecha_publicacion
FROM publicaciones AS up INNER JOIN solicitudes_amistad AS sa 
WHERE up.id_usuario = '$id_usuario' OR (up.id_usuario = sa.id_solicitante AND sa.id_solicitado ='$id_usuario' 
OR up.id_usuario = sa.id_solicitado AND sa.id_solicitante ='$id_usuario') 
AND sa.estado_solicitud ='2' ORDER BY fecha_publicacion DESC";
$publicaciones = mysqli_query($conexion,$consulta);
if($publicaciones){
    ?>
    <div class="all-posts" id="allposts">
    <?php
    while($row=$publicaciones->fetch_array()){
        $id_usuario_pub = $row['id_usuario'];
        $id_publicacion = $row['id_publicacion'];
        $contenido = $row['contenido'];
        $adjunto  = $row['arch_adjunto'];
        $fecha_pub = $row['fecha_publicacion'];
        #$id_elemento_likes_buscado =$id_publicacion;
       # $tipo_publicacion = 'publicacion';
        #include("mostrar_likes.php");
        $id_foto_buscada = $id_usuario_pub;
        include("ver_foto_perfil.php");
        ?>

        <div class="publicacion">
            <h2><?php echo "publicacion".$id_publicacion?></h2>
            <h3><?php echo $contenido?></h3>
        </div>
        
        <div class="post" id="<?php echo "publicacion".$id_publicacion?>">
            <div class="user-post-info">
            <?php 
            if($id_usuario_pub == $id_usuario){
                ?>
                <a class="ver-cuenta" href="ver_cuenta.php">
                    <img class="foto-perfil" 
                            src="<?php echo $foto;?>" 
                            alt="foto perfil">
                    <div>
                        <p class="nombre-usuario"><?php echo $nombre_usuario;?></p>
                        <p class="fecha-publicacion"><?php include("calcular_fecha.php");?></p>
                    </div>
                </a>
                <div class="opciones-publicacion" id="<?php echo "opciones-publicacion".$id_publicacion?>">
                        <input class="eliminar-publicacion" type="button" name="eliminar" value="Eliminar"  
                        onclick="eliminar_publicacion(<?php echo $id_publicacion?>)">
                        <input class="editar-publicacion" type="button" name="editar" value="Editar"
                        onclick="editar_publicacion(<?php echo $id_publicacion?>)">
                </div>
                <i class="fas fa-ellipsis-v" onclick="mostrarOpcionesPublicacion(<?php echo $id_publicacion?>)"></i>
                <script>
                    function ver_opciones_publicacion(id_post){
                        //var all_posts = document.getElementById("allposts")
                        //console.log(all_posts.childElementCount)
                       var opciones_publicacion = document.getElementById("publicacion"+id_post)
                        if(opciones_publicacion.style.display=="none"){
                            opciones_publicacion.style.display="flex"
                        }else{
                            opciones_publicacion.style.display="none"
                        }
                    }
                </script>
                <?php
            }else{
                    ?>
                    <a class="ver-cuenta" href="ver_cuenta_usuario.php?id=<?php echo $id_usuario_pub?>">
                        <img class="foto-perfil" 
                        src="<?php echo $foto;?>" 
                        alt="foto perfil">
                        <div>
                            <p class="nombre-usuario"><?php 
                            $id_buscado = $id_usuario_pub;
                            include("buscar_nombres.php");
                            echo $nombre_encontrado ?></p>
                            <p class="fecha-publicacion"><?php include("calcular_fecha.php");?></p>
                        </div>
                    </a>
                    <?php
                }
                ?>
            </div>
            <div class="post-content post-content<?php echo $id_publicacion?>">
                <p class="publicacion-texto publicacion-texto<?php echo $id_publicacion?>"><?php if($contenido){echo $contenido;}?></p>
                <?php 
                if( $adjunto){
                    ?>    
                    <img class="publicacion-adjunto publicacion-adjunto<?php echo $id_publicacion?>" src="<?php echo $adjunto;?>" alt="">
                <?php
                }else{
                    echo "<hr>";
                }
                ?>
            </div>
            <div class="post-options">
                <i class="input-like fas fa-thumbs-up" onclick="guardar_like('like',<?php echo $id_publicacion?>,'<?php echo $tipo_publicacion?>',<?php echo $id_usuario?>,<?php echo $id_usuario_pub?>,<?php echo $id_publicacion?>)"></i>
                <p class="total-likes total-likes-<?php echo $id_publicacion?>-<?php echo $tipo_publicacion?>"><?php
                    if($contadorLikes){
                        echo $contadorLikes;
                    } 
                ?>
                </p>
                    <i class="input-unlike fas fa-thumbs-down" onclick="guardar_like('unlike',<?php echo $id_publicacion?>,'<?php echo $tipo_publicacion?>',<?php echo $id_usuario?>,<?php echo $id_usuario_pub?>,<?php echo $id_publicacion?>)"></i>
                <p class="total-likes total-unlikes-<?php echo $id_publicacion?>-<?php echo $tipo_publicacion?>">
                    <?php 
                    if($contadorDislikes){
                        echo $contadorDislikes;
                    }
                    ?>
                </p>
                <i class="fas fa-reply"  onclick="comentar_publicacion(<?php echo $id_publicacion?>)"> 
                    Responder
                </i>
                <i class="fas fa-share"  onclick="compartir_publicacion(<?php echo $id_publicacion?>,<?php echo $id_usuario?>)">
                    Compartir
                </i>
            </div>
            <div class="post-coments">
                <?php include("coments.php");?>
                <div id="form-comentar<?php echo $id_publicacion?>" class="form-comentar" >
                    <label   for="input-comentar<?php echo $id_publicacion;?>">
                        <img class="foto-perfil" src="<?php 
                        $id_foto_buscada = $id_usuario;
                        include("ver_foto_perfil.php");
                        echo $foto;?>" alt="foto-perfil" >
                    </label>
                    <input type="hidden" name="id_post" id="id_post<?php echo $id_publicacion;?>" value="<?php echo $id_publicacion;?>">
                    <input type="hidden" name="id_usuario_post" id="id_usuario_post<?php echo $id_usuario_pub;?>" value="<?php echo $id_usuario_pub;?>">
                    <input type="hidden" name="id_usuario" id="id_usuario<?php echo $id_usuario;?>" value="<?php echo $id_usuario;?>">
                    <input class="input-comentar" id="input-comentar<?php echo $id_publicacion;?>"type="text" 
                    name="comentario" placeholder="Escribe un comentario..." autocomplete="off"
                    onkeypress="comentar(<?php echo $id_publicacion;?>,<?php echo $id_usuario_pub;?>,<?php echo $id_usuario;?>)">
                </div>
            </div>
        </div>
        <script>
            function comentar_publicacion(id_post){
                //console.log(id_post)
                $("#form-comentar"+id_post).css("display", "flex")
                //$("#form-comentar"+id_post).show()
                /*
                $("#input-comentar"+id_post).val()
               
                var newDiv = document.createElement("div");
                
                var newContent = document.createTextNode("ADSADSA");
                newDiv.appendChild(newContent) //añade texto al div creado.
                var currentDiv = document.getElementById("comentarios"+id_post);
                currentDiv.appendChild(newDiv)*/

            }
        </script>
  
<?php
    }
    ?>
    </div>
    <?php
}

