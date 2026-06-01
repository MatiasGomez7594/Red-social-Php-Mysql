<div class="respuestas">
    <form id="responder<?php echo $id_comentario?>comentario" class="form-responder">
        <label   for="input-responder<?php echo $id_comentario;?>">
        <img class="foto-perfil" src="<?php 
        $id_foto_buscada = $id_usuario;
        include("ver_foto_perfil.php");
        echo $foto;?>" alt="foto-perfil" >
        </label>
        <input type="hidden" name="id_comentario" value="<?php echo $id_comentario;?>">
        <input type="hidden" name="id_receptor" id="id-receptor<?php echo $id_comentario.'comentario';?>">                    
        <input type="hidden" name="id_usuario_post" value="<?php echo $id_usuario_post;?>">
        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario;?>">
        <input class="input-responder" id="input-responder<?php echo $id_comentario.'comentario';?>"
        type="text" 
        name="respuesta" placeholder="Escribe una respuesta..."
        autocomplete="off"
        onkeypress="responder(<?php echo $id_comentario;?>,'comentario',<?php echo $id_comentario;?>,<?php echo $id_usuario;?>,<?php echo $id_post;?>)"
        >
    </form>
<?php 
$id_comentario;
include("con_db.php");
$consulta = "SELECT * FROM respuestas_comentarios 
WHERE id_comentario='$id_comentario'
AND id_emisor = '$id_usuario'
ORDER BY fecha DESC LIMIT 1";
$nueva_respuesta = $conexion->query($consulta);
if($nueva_respuesta){
    ?>
    <?php 
    while($row=$nueva_respuesta->fetch_array()){
        $id_respuesta=$row['id_respuesta'];
        $fecha_respuesta = $row['fecha'];
        $id_receptor = $row['id_receptor'];
        $respuesta_comentario = $row['respuesta_contenido'];
        $id_emisor = $row['id_emisor'];
        //para buscar el nombre del emisor
        $id_buscado = $id_emisor;
        include("buscar_nombres.php");
        $id_elemento_likes_buscado = $id_respuesta;
        $tipo_publicacion = 'respuesta'; 
        include("mostrar_likes.php");
        $id_foto_buscada =  $id_emisor;
        include("ver_foto_perfil.php");
        ?>
        <div class="respuesta">
                <a class="ver-cuenta" href="ver_cuenta.php">
                    <img class="foto-perfil" src="<?php 
                    $id_foto_buscada = $id_emisor;
                    include("ver_foto_perfil.php");
                    echo $foto;?>" alt="foto-perfil" >
                    <div>
                        <p class="nombre-usuario"><?php echo $nombre_encontrado?></p>
                        <p class="fecha-publicacion"><?php 
                         $fecha = $fecha_respuesta;
                        include("calcular_fecha.php");?></p>
                    </div>
                </a>

            <p class="respuesta-texto"><?php echo $respuesta_comentario?></p>
            <div class="respuesta-opciones">
                <i class="input-like fas fa-thumbs-up" onclick="guardar_like('like',<?php echo $id_respuesta?>,'<?php echo $tipo_publicacion?>',<?php echo $id_emisor?>,<?php echo $id_emisor?>,<?php echo $id_post?>)"></i>
                <p class="total-likes total-likes-<?php echo $id_respuesta?>-<?php echo $tipo_publicacion?>"><?php
                if($contadorLikes){
                    echo $contadorLikes;
                } 
                ?>
                </p>
                <i class="input-unlike fas fa-thumbs-down" onclick="guardar_like('unlike',<?php echo $id_respuesta?>,'<?php echo $tipo_publicacion?>',<?php echo $id_emisor?>,<?php echo $id_emisor?>,<?php echo $id_post?>)"></i>
                <p class="total-likes total-unlikes-<?php echo $id_respuesta?>-<?php echo $tipo_publicacion?>">
                <?php 
                if($contadorDislikes){
                    echo $contadorDislikes;
                }
                ?>
                </p>
                <p class="responder-respuesta"  onclick="verResponderComentario(<?php echo $id_respuesta;?>,<?php echo $id_emisor;?>,'respuesta')"> 
                    Responder
                </p>
            </div>
            <form class="form-responder" id="<?php echo 'responder'.$id_respuesta.'respuesta'?>">
                <label for="input-comentar">
                    <img class="foto-perfil" src="<?php 
                    $id_foto_buscada = $id_usuario;
                    include("ver_foto_perfil.php");
                    echo $foto;?>" alt="foto-perfil"
                    >
                </label>
                <input type="hidden" name="id_comentario" value="<?php echo $id_comentario;?>">
                <input type="hidden" name="id_receptor" id="id-receptor<?php echo $id_respuesta.'respuesta';?>">                    
                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario;?>">
                <input type="text" class="input-responder" placeholder="Escribe una respuesta "  name="respuesta"
                id="input-responder<?php echo $id_respuesta.'respuesta'?>" autocomplete="off"
                onkeypress="responder(<?php echo $id_comentario;?>,'respuesta',<?php echo $id_respuesta;?>,<?php echo $id_usuario;?>,<?php echo $id_post;?>)"
                >                                    
            </form>
        </div>
        <script>
            function verResponderComentario(id_respuesta,id_receptor,tipo){
                    //var id_usuario = document.getElementByName("id_usuario").value
                    //console.log("id_comentario: "+id_comentario+" id_usuario: "+id_usuario+"  id_receptor: "+id_receptor)
                    //el id debe ser diferente del name
                    $("#id-receptor"+id_respuesta+tipo).val(id_receptor)
                    //console.log(id_receptor)
                    //var input_respuesta = document.getElementById("input-respuesta").value = id_receptor
                    var responderComentario = document.getElementById('responder'+id_respuesta+tipo)
                    if(responderComentario.style.display=="none"){
                        responderComentario.style.display="flex";
                    }else{
                        responderComentario.style.display="none";
                    }
                    }
        </script>
    <?php                                   
    }
}
?>
</div>

