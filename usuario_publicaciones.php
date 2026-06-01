
    
<?php
$id_buscado = $id_otro;
include("buscar_nombres.php");
                           
$consulta = "SELECT id_post,contenido,adjunto,fecha FROM usuarios_posts WHERE id_usuario = '$id_otro' ORDER BY fecha DESC";
$resultado = $conexion->query($consulta);
//verifico que se haya encontrado una fila que coincida con la busqueda
if($resultado){
    while($row=$resultado->fetch_array()){
        $id_post = $row['id_post'];
        $contenido = $row['contenido'];
        $adjunto  = $row['adjunto'];
        $fecha = $row['fecha'];
        $id_elemento_likes_buscado =$id_post;
        $tipo_publicacion = 'publicacion';
        include("mostrar_likes.php");
        $id_foto_buscada = $id_otro;
        include("ver_foto_perfil.php");
        ?>
<div class="post" id="<?php echo "publicacion".$id_post?>">
            <div class="user-post-info">
                <a class="ver-cuenta" href="ver_cuenta.php">
                    <img class="foto-perfil" 
                            src="<?php echo $foto;?>" 
                            alt="foto perfil">
                    <div>
                        <p class="nombre-usuario"><?php echo $nombre_encontrado;?></p>
                        <p class="fecha-publicacion"><?php include("calcular_fecha.php");?></p>
                    </div>
                </a>
            </div>
            <div class="post-content">
                <p class="publicacion-texto publicacion-texto<?php echo $id_post?>"><?php if($contenido){echo $contenido;}?></p>
                <?php 
              
                if( $adjunto){
                    ?>
                    <img class="publicacion-adjunto publicacion-adjunto<?php echo $id_post?>" src="<?php echo $adjunto;?>" alt="">
                <?php
                }else{
                    echo "<hr>";
                }
                ?>
            </div>
            <div class="post-options">
                <i class="input-like fas fa-thumbs-up" onclick="guardar_like('like',<?php echo $id_post?>,'<?php echo $tipo_publicacion?>',<?php echo $id_usuario?>,<?php echo $id_otro?>,<?php echo $id_post?>)"></i>
                <p class="total-likes total-likes-<?php echo $id_post?>-<?php echo $tipo_publicacion?>"><?php
                    if($contadorLikes){
                        echo $contadorLikes;
                    } 
                ?>
                </p>
                    <i class="input-unlike fas fa-thumbs-down" onclick="guardar_like('unlike',<?php echo $id_post?>,'<?php echo $tipo_publicacion?>',<?php echo $id_usuario?>,<?php echo $id_otro?>,<?php echo $id_post?>)"></i>
                <p class="total-likes total-unlikes-<?php echo $id_post?>-<?php echo $tipo_publicacion?>">
                    <?php 
                    if($contadorDislikes){
                        echo $contadorDislikes;
                    }
                    ?>
                </p>
                <i class="fas fa-reply"  onclick="comentar_publicacion(<?php echo $id_post?>)"> 
                    Responder
                </i>
                <i class="fas fa-share"  onclick="compartir_publicacion(<?php echo $id_post?>,<?php echo $id_otro?>)">
                    Compartir
                </i>
            </div>
            <div class="post-coments">
                <?php include("coments.php");?>
                <form id="form-comentar<?php echo $id_post?>" >
                    <label   for="input-comentar<?php echo $id_post;?>">
                        <img class="foto-perfil" src="<?php 
                        $id_foto_buscada = $id_usuario;
                        include("ver_foto_perfil.php");
                        echo $foto;?>" alt="foto-perfil" >
                    </label>
                    <input type="hidden" name="id_post<?php echo $id_post;?>" value="<?php echo $id_post;?>">
                    <input type="hidden" name="id_usuario_post" id="id_usuario_post<?php echo $id_otro;?>" value="<?php echo $id_otro;?>">
                    <input type="hidden" name="id_usuario" id="id_usuario<?php echo $id_usuario;?>" value="<?php echo $id_usuario;?>">
                    <input class="input-comentar" id="input-comentar<?php echo $id_post;?>"type="text" 
                    autocomplete="off"
                    name="comentario" placeholder="Escribe un comentario..."
                    onkeypress="comentar(<?php echo $id_post;?>,<?php echo $id_otro;?>,<?php echo $id_usuario;?>)"
                    >
                </form>
            </div>
        </div>
        <script>
            function comentar_publicacion(id_post){
                console.log(id_post)
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
            function responder_comentario(id_post){
                $("#form-responder"+id_post).css("display", "flex")
                //$("#form-comentar"+id_post).show()
            }
        </script>
  
<?php
    }
    ?>
    </div>
    <?php
}