

<div class="lista-resultados">  
    <div class="resultado">
            <a class="perfil-resultado" href="ver_cuenta.php">
                                <img src="<?php echo 'images/bradfoto.jpg'//$foto_perfil?>">
                                <p> <?php echo 'nombre_usuario'?></p>     
                            </a>
    </div>
    <hr>
    <div class="resultado" id="persona<?php echo $id_solicitud?>">
            <a class="perfil-resultado" 
             href="ver_cuenta_usuario.php?id=<?php echo $id_usuario_encontrado?>">
                <img src="<?php echo 'images/bradfoto.jpg'//$foto_perfil?>">
                <p><?php echo 'nombre usuario' //$nombre_usuario?></p>    
            </a>
            <form action="procesar_solicitud.php" method="GET">
                <input type="hidden" value="<?php echo $id_solicitud?>" name="id_solicitud">
                <input type="hidden" value="<?php echo $id_usuario?>" name="id_solicitante">
                <input type="hidden" value="<?php echo $id_usuario_encontrado?>" name="id_solicitado">
                <input type="submit" class="procesar-solicitud-input" value="Enviar solicitud" name="solicitar">
            </form>
    </div>
    <hr>
    <div class="resultado">
            <a class="perfil-resultado" id="persona<?php echo $id_solicitud?>"
             href="ver_cuenta_usuario.php?id=<?php echo $id_usuario_encontrado?>">
                <img src="<?php echo 'images/bradfoto.jpg'//$foto_perfil?>">
                <p><?php echo 'nombre usuario' //$nombre_usuario?></p>    
            </a>
            <form >
                <input type="hidden" value="<?php echo $id_usuario?>" name="id_solicitante">
                <input type="hidden" value="<?php echo $id_usuario_encontrado?>" name="id_solicitado">
                <input type="button" class="procesar-solicitud-input" value="Eliminar" onclick="eliminar_amigo(<?php echo $id_solicitud?>)">
            </form>  
    </div>
    <hr>
    <div class="resultado">
            <a class="perfil-resultado" id="persona<?php echo $id_solicitud?>" 
            href="ver_cuenta_usuario.php?id=<?php echo $id_usuario_encontrado?>">
                <img src="<?php echo 'images/bradfoto.jpg'//$foto_perfil?>">
                <p><?php echo 'nombre usuario' //$nombre_usuario?></p>    
            </a>
            <form class="form-rechazar-aceptar" action="procesar_solicitud.php?id=" method="GET">
                <input type="hidden" value="<?php echo $id_solicitud?>" name="id_solicitud">
                <input type="hidden" value="<?php echo $id_usuario?>" name="id_solicitante">
                <input type="hidden" value="<?php echo $id_usuario_encontrado?>" name="id_solicitado">
                <p>Te envio una solicitud de amistad</p>
                <div class="inputs">
                    <input type="submit" class="procesar-solicitud-input" value="Rechazar" name="cancelar">
                    <input type="submit" class="procesar-solicitud-input" value="Aceptar" name="aceptar">
                </div>
            </form>
    </div>
    <hr>
    <div class="resultado">
            <a  class="perfil-resultado" id="persona<?php echo $id_solicitud?>" 
            href="ver_cuenta_usuario.php?id=<?php echo $id_usuario_encontrado?>">
                <img src="<?php echo 'images/bradfoto.jpg'//$foto_perfil?>">
                <p><?php echo 'nombre usuario' //$nombre_usuario?></p>    
            </a>
            <form action="procesar_solicitud.php?id=" method="GET">
                <input type="hidden" value="<?php echo $id_solicitud?>" name="id_solicitud">
                <input type="hidden" value="<?php echo $id_usuario?>" name="id_solicitante">
                <input type="hidden" value="<?php echo $id_usuario_encontrado?>" name="id_solicitado">
                <input type="submit" class="procesar-solicitud-input" value="Cancelar solicitud" name="cancelar">
            </form>
    </div>
    <hr>
</div>