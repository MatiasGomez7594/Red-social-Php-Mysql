<div id="notifications" class="notifications">
                <div class="mensajes">
                    <?php 
                        include("mensajes_recibidos.php");
                        if($contador_mensajes){
                            $contador_mensajes=0;
                            while($row = $mensajes->fetch_array()){
                                $id_mensaje = $row['id_mensaje'];
                                $mensaje = $row['mensaje'];
                                $id_remitente = $row['id_remitente'];
                                $tipo_mensaje=$row['tipo_mensaje'];
                                $estado_mensaje=$row['estado'];
                                $id_publicacion = $row['id_publicacion'];
                                if($estado_mensaje =='no_leido' && $id_remitente != $id_usuario){
                                    $contador_mensajes++;
                                }
                                $fecha = $row['fecha'];
                                $id_usuario_encontrado = $id_remitente;
                                $id_buscado = $id_usuario_encontrado;
                                include("buscar_nombres.php");
                                include("buscar_solicitud.php");     
                                if($estado_solicitud == 1 && $id_solicitado == $id_usuario && $tipo_mensaje == 'solicitud'){                  
                                ?>
                                    <div class="message-solicitud-amistad">
                                        <img src="<?php 
                                                $id_foto_buscada = $id_remitente;
                                                include("ver_foto_perfil.php");
                                                echo $foto;?>" alt="mensaje recibido">
                                        <form class="form-rechazar-aceptar" action="procesar_solicitud.php?id=" method="GET">
                                            <input type="hidden" value="<?php echo $id_solicitud?>" name="id_solicitud">
                                            <input type="hidden" value="<?php echo $id_usuario?>" name="id_solicitado">
                                            <input type="hidden" value="<?php echo $id_solicitante?>" name="id_solicitante">
                                            <p><?php echo $nombre_encontrado." ".$mensaje."<br>";?></p>
                                            <div class="inputs">
                                                <input type="submit" value="Rechazar" name="cancelar">
                                                <input type="submit" value="Aceptar" name="aceptar">
                                            </div>
                                        </form>
                                    </div>
                                <?php
                                }else if($tipo_mensaje == 'mensaje'){
                                    $id_otro_usuario = $row['id_remitente'];
                                    $nombre_otro_usuario = $nombre_encontrado;
                                    ?>
                                    <div class="message">
                                        <img src="<?php 
                                        $id_foto_buscada = $id_remitente;
                                        include("ver_foto_perfil.php");
                                        echo $foto;?>" 
                                        alt="mensaje recibido">
                                        <a href="chat_privado.php?id=<?php echo $id_remitente?>">
                                            <p><?php echo $nombre_encontrado." te envio un mensaje privado"?></p>
                                            <p><?php echo $mensaje?></p>
                                            <b><?php  $fecha;
                                            include("calcular_fecha.php");
                                            ?></b>
                                        </a>
                                    </div>
                                <?php
                                }else if($tipo_mensaje == 'notificacion_solicitud'){
                                            ?>
                                            <div class="message">
                                                <img src="<?php 
                                                $id_foto_buscada = $id_remitente;
                                                include("ver_foto_perfil.php");
                                                echo $foto;?>" 
                                                alt="mensaje recibido">
                                                <a href="ver_cuenta_usuario.php?id=<?php echo $id_remitente?>">
                                                    <p><?php echo $nombre_encontrado?></p>
                                                    <p><?php echo $mensaje?></p>
                                                    <b><?php  $fecha;
                                                    include("calcular_fecha.php");
                                                    ?></b>
                                                </a>
                                            </div>
                                     <?php
                                }else{
                                    ?>
                                    <div class="message">
                                            <img src="<?php 
                                                $id_foto_buscada = $id_remitente;
                                                include("ver_foto_perfil.php");
                                                echo $foto;?>" 
                                                alt="mensaje recibido">
                                            <a href="ver_notificacion.php?id=<?php echo $id_remitente;?>&&id_publicacion=<?php echo $id_publicacion;?> ">
                                                <p><?php echo $nombre_encontrado?></p>
                                                <p><?php echo $mensaje?></p>
                                                <b><?php  $fecha;
                                                include("calcular_fecha.php");
                                                ?></b>
                                            </a>
                                    </div>
                         <?php
                                }
                            }      
                        }else{
                            ?>
                            <div class="no-message">
                                <h1>No hay mensajes que mostrar</h1>
                            </div>
                      <?php 
                        }
                    ?>
                </div>
            </div>
                <form  onclick="mostrar_notificaciones();">
                <?php
                    if($contador_mensajes>0){
                        ?>
                        <p class="total-notificaciones">                    
                        <?php
                        
                        if($contador_mensajes>99){
                            echo '99+';
                        }else{
                            echo $contador_mensajes;
                        }
                        ?>
                        </p>
                    <?php
                    }
                    ?>
                    <input type="hidden" name="id_usuario" id="id-usuario" value="<?php echo $id_usuario;?>">
                    <i class="campana-notificaciones fas fa-bell"></i>
                </form>
            <div id="options-user" class="options-user">
                <a class="cuenta" href="ver_cuenta.php">
                        <img class="foto-perfil-header" 
                        src="<?php 
                            $id_foto_buscada = $id_usuario;
                            include("ver_foto_perfil.php");
                            echo $foto;?>"
                        alt="foto perfil"> 
                    <div>
                        <span><?php echo $nombre_usuario;?></span>
                        <p>Ver perfil</p>
                    </div>
                </a>
                <a href="modificar_informacion.php">
                    <i class="fas fa-cog">  Configuración</i>
                </a>
                <a href="cerrar_sesion.php">
                    <i class="fas fa-sign-out-alt">  Cerrar sesión</i>
                </a>
            </div>
                <a id="usuario" onclick="mostrarMenu();" >
                    <i class="fas fa-chevron-circle-down"></i>
                </a>
            </div>