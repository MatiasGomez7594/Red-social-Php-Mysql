<div id="contenedor-mensajes" class="contenedor-mensajes-privado">
        <div class="header-mensaje-privado">
            <div class="header-izquierda">
                <a >
                    <img src="<?php echo $foto;?>" alt="foto perfil">
                </a>
                <p><?php echo $nombre_otro_usuario;?></p>
            </div>
            <div class="header-derecha">
                <i onclick="minimizarMensajesPrivados()" class="far fa-window-minimize"></i>
                <i onclick="verMensajesPrivados()" class="fas fa-times"></i>
            </div>
        </div>
        <div class="mensajes-privados">
            <?php 
                $consulta = "SELECT  * FROM mensajes WHERE id_usuario='$id_usuario' 
                            OR id_remitente ='$id_usuario'";
                $mensajes = $conexion->query($consulta);
                if($mensajes){
                    while($row=$mensajes->fetch_array()){
                        $mensaje=$row['mensaje'];
                        $tipo_mensaje=$row['tipo_mensaje'];
                        $id_usuario_2=$row['id_usuario'];
                        $id_remitente=$row['id_remitente'];
                        if($id_remitente==$id_usuario && $id_usuario_2==$id_otro_usuario && $tipo_mensaje=='mensaje'){
                            ?>
                            <p class="mensaje-usuario"><?php echo $mensaje?></p>
                        <?php
                        }
                        else if($id_remitente==$id_otro_usuario && $id_usuario_2==$id_usuario && $tipo_mensaje=='mensaje'){
                            ?>
                             <p class="mensaje-otro-usuario"><?php echo $mensaje?></p>
                        <?php
                        }
                    }
                }
            ?>
            
        </div>
        <input type="hidden" id="id_remitente" name="id_usuario" value="<?php echo $id_usuario;?>">
        <input type="hidden" id="id_receptor" name="id_otro_usuario" value="<?php echo $id_otro_usuario;?>">
        <input name="mensaje" class="input-mensaje-privado" type="text" autocomplete = "off"
        placeholder="Escribe un mensaje a <?php echo $nombre_otro_usuario;?>"
        id="mensaje-privado"  
        >
    </div>