<?php include("buscar_amigos.php");?>
    <div class="lista-amigos">
            <?php if($amigos){ 
                    while($row = $amigos->fetch_array()){
                            $id_solicitud=$row['id_solicitud'];
                            $id_solicitante = $row['id_solicitante'];
                            $id_solicitado = $row['id_solicitado'];
                        if($id_solicitante!=$id_usuario){
                            $id_buscado=$id_solicitante;
                            include("buscar_nombres.php");
                            $id_foto_buscada = $id_solicitante;
                            include("ver_foto_perfil.php");
                            ?>
                            <div class="amigo" id="persona<?php echo $id_solicitud?>">
                                <div class="perfil-amigo">
                                    <img src="<?php echo $foto?>">
                                </div>
                                <a href="ver_cuenta_usuario.php?id=<?php echo $id_solicitante?>">
                                    <?php echo $nombre_encontrado?>
                                </a>
                        <?php
                        }else if($id_solicitado != $id_usuario){
                            $id_buscado=$id_solicitado;
                            include("buscar_nombres.php");
                            $id_foto_buscada = $id_solicitado;
                            include("ver_foto_perfil.php");
                            ?>
                            <div class="amigo" id="persona<?php echo $id_solicitud?>">
                                <div class="perfil-amigo">
                                    <img src="<?php echo $foto?>">
                                </div>
                                <a href="ver_cuenta_usuario.php?id=<?php echo $id_solicitado?>">
                                    <?php echo $nombre_encontrado?>
                                </a>

                         <?php
                        }
                        ?>
                        <div  class="eliminar-amigo">
                            <input type="hidden" name="id_solicitud" id="solicitud<?php echo $id_solicitud?>" value="<?php echo $id_solicitud?>">
                            <input type="hidden" name="id_solicitante">
                            <input type="hidden" name="id_solicitado">
                            <input type="button" value="Eliminar" name="eliminar" onclick="eliminar_amigo(<?php echo $id_solicitud?>)">
                        </div>
                    </div>
                <?php
                    }
                }
                ?>

    </div>
<script src="scripts/eliminar_amigo.js">
</script>