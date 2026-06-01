<?php
include("componentes/sesion.php");

if(isset($_GET['buscar'])){
    include("componentes/header.php");
    if(!empty($_GET['usuario_buscado'])){
        include("con_db.php");
        $usuario_buscado = $_GET['usuario_buscado'];
        $consulta = "SELECT idUsuario,foto_perfil,nombre_usuario FROM usuarios WHERE nombre_usuario='$usuario_buscado'
        OR nombre_usuario LIKE '%$usuario_buscado%'";
        $resultado = $conexion->query($consulta);
        $resultados_busqueda = $resultado->num_rows;
        if($resultados_busqueda > 0){
            ?>
            <link rel="stylesheet" href="css/buscar_personas.css">
            <div class="lista-resultados">
            <?php
            while($row=$resultado->fetch_array()){
                $nombre_usuario=$row['nombre_usuario'];
                $id_usuario_encontrado = $row['id'];
                $foto_perfil = $row['foto_perfil'];
                //echo $nombre_usuario;
                include("buscar_solicitud.php"); 
                if($id_usuario_encontrado == $id_usuario){
                    ?>
                        <div class="resultado">
                            <a class="perfil-resultado" href="ver_cuenta.php">
                                <img src="<?php echo $foto_perfil?>">
                                <p> <?php echo $nombre_usuario?></p>     
                            </a>
                        </div>
                        <hr>
                    <?php
                }else{
                    if($estado_solicitud==0){
                        ?>
                        <div class="resultado" id="persona<?php echo $id_solicitud?>">
                            <a class="perfil-resultado" 
                            href="ver_cuenta_usuario.php?id=<?php echo $id_usuario_encontrado?>">
                            <img src="<?php echo $foto_perfil?>">
                            <p><?php echo $nombre_usuario?></p>    
                            </a>
                            <form action="procesar_solicitud.php" method="GET">
                                <input type="hidden" value="<?php echo $id_solicitud?>" name="id_solicitud">
                                <input type="hidden" value="<?php echo $id_usuario?>" name="id_solicitante">
                                <input type="hidden" value="<?php echo $id_usuario_encontrado?>" name="id_solicitado">
                                <input type="submit" class="procesar-solicitud-input" value="Enviar solicitud" name="solicitar">
                            </form>
                        </div>
                        <hr>
                <?php           
                    }else if($estado_solicitud == 1 && $id_solicitante == $id_usuario){
                        ?>
                        <div class="resultado">
                            <a  class="perfil-resultado" id="persona<?php echo $id_solicitud?>" 
                                href="ver_cuenta_usuario.php?id=<?php echo $id_usuario_encontrado?>">
                                <img src="<?php echo $foto_perfil?>">
                                <p><?php echo $nombre_usuario?></p>    
                            </a>
                            <form action="procesar_solicitud.php?id=" method="GET">
                                <input type="hidden" value="<?php echo $id_solicitud?>" name="id_solicitud">
                                <input type="hidden" value="<?php echo $id_usuario?>" name="id_solicitante">
                                <input type="hidden" value="<?php echo $id_usuario_encontrado?>" name="id_solicitado">
                                <input type="submit" class="procesar-solicitud-input" value="Cancelar solicitud" name="cancelar">
                            </form>
                        </div>
                        <hr>
                    <?php   
                    }else if($estado_solicitud == 1 && $id_solicitado == $id_usuario){
                        ?>
                        <div class="resultado">
                            <a class="perfil-resultado" id="persona<?php echo $id_solicitud?>" 
                                href="ver_cuenta_usuario.php?id=<?php echo $id_usuario_encontrado?>">
                                <img src="<?php echo $foto_perfil?>">
                            <p><?php echo $nombre_usuario?></p>    
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
                   <?php  
                    }else{
                        ?>
                        <div class="resultado">
                            <a class="perfil-resultado" id="persona<?php echo $id_solicitud?>"
                            href="ver_cuenta_usuario.php?id=<?php echo $id_usuario_encontrado?>">
                            <img src="<?php echo $foto_perfil?>">
                            <p><?php echo $nombre_usuario?></p>    
                            </a>
                            <form >
                                <input type="hidden" value="<?php echo $id_usuario?>" name="id_solicitante">
                                <input type="hidden" value="<?php echo $id_usuario_encontrado?>" name="id_solicitado">
                                <input type="button" class="procesar-solicitud-input" value="Eliminar" onclick="eliminar_amigo(<?php echo $id_solicitud?>)">
                            </form>  
                        </div>
                        <hr>
                 <?php 
                    }

                }
            // fin while  
            }
        // fin if($resultados_busqueda > 0)
        } 
     //fin (!empty($_GET['usuario_buscado']))       
    }else{
        header("location:bienvenida.php");
    }
//fin if(isset($_GET['buscar'])) 
}else{
    header("location:bienvenida.php");
}
?>
    <script src="scripts/eliminar_amigo.js"></script>
