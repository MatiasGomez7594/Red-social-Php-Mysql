<?php
    $id_usuario_copia = $id_usuario;
    $id_usuario = $id_otro_usuario;
    include("buscar_amigos.php");
?>
    <div class="lista-amigos">
    <?php 
        if($amigos){ 
            while($row = $amigos->fetch_array()){
                $id_solicitud=$row['id_solicitud'];
                $id_solicitante = $row['id_solicitante'];
                $id_solicitado = $row['id_solicitado'];
                if($id_solicitante!==$id_otro_usuario ){
                        if($id_solicitante==$id_usuario_copia){
                            ?>
                            <div class="amigo yo-mismo">
                                <div class="perfil-amigo">
                                    <img src="<?php $id_foto_buscada = $id_usuario_copia;
                            include("ver_foto_perfil.php");
                            echo $foto;?>">
                                </div>
                                <a href="ver_cuenta.php">
                                    <?php echo $nombre_usuario?>
                                </a>
                            </div>
                        <?php 
                        }else{
                            $id_amigo_comun = $id_solicitante;
                            include("buscar_amigo_comun.php");
                            $id_buscado = $id_solicitante;
                            include("buscar_nombres.php");
                            $id_foto_buscada = $id_solicitante;
                            include("ver_foto_perfil.php");
                            ?>
                            <div class="amigo" id="persona<?php echo $id_solicitud_comun?>">
                                <div class="perfil-amigo">
                                    <img src="<?php echo $foto;?>">
                                </div>
                                <a href="ver_cuenta_usuario.php?id=<?php echo $id_solicitante?>">
                                    <p style="color: #000;"><?php echo $nombre_encontrado?></p>
                                </a>
                                <?php
                                if($estado_solicitud_comun==2 && $id_solicitante_comun=$id_amigo_comun
                                    || $estado_solicitud_comun==2 && $id_solicitado_comun=$id_amigo_comun){
                                    ?>
                                    <form  class="eliminar-amigo">
                                        <input type="hidden" name="id_solicitud" value="<?php echo $id_solicitud_comun?>">
                                        <input type="button" value="Eliminar" onclick="eliminar_amigo(<?php echo $id_solicitud_comun?>)">
                                        <input type="hidden" name="id_solicitante">
                                        <input type="hidden" name="id_solicitado">
                                    </form>
                                <?php
                                }else if($estado_solicitud_comun == 1 ){
                                    if($id_solicitante_comun==$id_amigo_comun){
                                        ?>
                                        <form class="aceptar-rechazar" >
                                            <input type="hidden" value="<?php echo $id_solicitud_comun?>" name="id_solicitud">
                                            <input type="hidden" value="<?php echo $id_amigo_comun?>" name="id_solicitante">
                                            <input type="hidden" value="<?php echo $id_usuario_copia?>" name="id_solicitado">
                                            <input type="button" value="Aceptar" name="aceptar">
                                            <input type="button" value="Rechazar" name="cancelar" onclick="eliminar_amigo(<?php echo $id_solicitud_comun?>)">
                                        </form>
                                    <?php
                                    }else{
                                        ?>
                                        <form class="eliminar-amigo" >
                                            <input type="hidden" value="<?php echo $id_solicitud_comun?>" name="id_solicitud">
                                            <input type="hidden" value="<?php echo $id_usuario_copia?>" name="id_solicitante">
                                            <input type="hidden" value="<?php echo $id_amigo_comun?>" name="id_solicitado">
                                            <input  value="Cancelar" name="cancelar" type="button" onclick="eliminar_amigo(<?php echo $id_solicitud_comun?>)">
                                        </form>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <form class="eliminar-amigo" >
                                        <input type="hidden"  name="id_solicitud">
                                        <input type="hidden" value="<?php echo $id_usuario_copia?>" name="id_solicitante">
                                        <input type="hidden" value="<?php echo $id_amigo_comun?>" name="id_solicitado">
                                        <input type="submit" value="Agregar" name="solicitar">
                                    </form>

                                <?php

                                }
                                ?>
                            </div>

                <?php
                        }
                }else if($id_solicitado !== $id_otro_usuario ){
                            if($id_solicitado==$id_usuario_copia){
                                ?>
                                <div class="amigo yo-mismo">
                                    <div class="perfil-amigo">
                                        <img src="<?php $id_foto_buscada = $id_usuario_copia;
                            include("ver_foto_perfil.php");
                            echo $foto;?>">
                                    </div>
                                    <a href="ver_cuenta.php">
                                        <?php echo $nombre_usuario?>
                                    </a>
                                </div>
                        <?php
                            }else{
                                $id_amigo_comun = $id_solicitado;
                                include("buscar_amigo_comun.php");
                                $id_buscado = $id_solicitado;
                                include("buscar_nombres.php");
                                $id_foto_buscada = $id_solicitado;
                                include("ver_foto_perfil.php");
                                ?>
                                <div class="amigo" id="persona<?php echo $id_solicitud_comun?>">
                                    <div class="perfil-amigo">
                                        <img src="<?php echo $foto?>">
                                    </div>
                                    <a href="ver_cuenta_usuario.php?id=<?php echo $id_solicitado?>">
                                        <p style="color: #000;"><?php echo $nombre_encontrado?></p>
                                    </a>
                                    <?php
                                        if($estado_solicitud_comun==2 && $id_solicitante_comun==$id_amigo_comun
                                            ||$estado_solicitud_comun==2 && $id_solicitado_comun==$id_amigo_comun){
                                            ?>
                                             <form  class="eliminar-amigo">
                                                <input type="hidden" name="id_solicitud" value="<?php echo $id_solicitud_comun?>">
                                                <input type="button" value="Eliminar" onclick="eliminar_amigo(<?php echo $id_solicitud_comun?>)">                                                
                                                
                                            </form>
                                    <?php
                                        }else if($estado_solicitud_comun==1){
                                                if($id_solicitante_comun==$id_amigo_comun){
                                                    ?>
                                                    <form class="aceptar-rechazar" >
                                                        <input type="hidden" value="<?php echo $id_solicitud_comun?>" name="id_solicitud">
                                                        <input type="hidden" value="<?php echo $id_amigo_comun?>" name="id_solicitante">
                                                        <input type="hidden" value="<?php echo $id_usuario_copia?>" name="id_solicitado">
                                                        <input type="button" value="Aceptar" name="aceptar">
                                                        <input type="button" value="Rechazar" name="cancelar"  onclick="eliminar_amigo(<?php echo $id_solicitud_comun?>)">
                                                    </form>
                                            <?php
                                                }else{
                                                    ?>
                                                    <form class="eliminar-amigo" >
                                                        <input type="hidden" value="<?php echo $id_solicitud_comun?>" name="id_solicitud">
                                                        <input type="hidden" value="<?php echo $id_usuario_copia?>" name="id_solicitante">
                                                        <input type="hidden" value="<?php echo $id_amigo_comun?>" name="id_solicitado">
                                                        <input type="button" value="Cancelar" name="cancelar" onclick="eliminar_amigo(<?php echo $id_solicitud_comun?>)">
                                                    </form>
                                            <?php
                                                }
                                            ?>
                                    <?php
                                        }else{
                                            ?>
                                            <form class="eliminar-amigo" action="procesar_solicitud.php" method="GET">
                                                <input type="hidden"  name="id_solicitud">
                                                <input type="hidden" value="<?php echo $id_usuario_copia?>" name="id_solicitante">
                                                <input type="hidden" value="<?php echo $id_amigo_comun?>" name="id_solicitado">
                                                <input type="submit" value="Agregar" name="solicitar">
                                            </form>
                                        <?php
                                        }
                                    ?>                        
                                </div>
                    <?php
                            }
                }
            }
        }
                ?>
    </div>
    
    <script src="scripts/eliminar_amigo.js">
</script>