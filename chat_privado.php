<link rel="stylesheet" href="css/chat_privado.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
<div class="chat-container ">
    <div class="mensajes-privados">
<?php 
if(isset($_GET['id']) ){
    $id_otro_usuario = $_GET['id'];
    if(is_numeric($id_otro_usuario) ){
        include("componentes/sesion.php");
        include("con_db.php");
        $consulta = "SELECT  mensaje,id_usuario,id_remitente 
        FROM mensajes WHERE (id_usuario='$id_usuario' 
        AND id_remitente = ' $id_otro_usuario' 
        OR id_remitente ='$id_usuario' AND id_usuario='$id_otro_usuario') 
        AND tipo_mensaje = 'mensaje'";
        $mensajes = $conexion->query($consulta);
        if($mensajes){
            while($row=$mensajes->fetch_array()){
                $mensaje = $row['mensaje'];
                $id_receptor = $row['id_usuario'];
                $id_remitente = $row['id_remitente'];
                if($id_remitente==$id_usuario && $id_receptor ==$id_otro_usuario){
                    ?>
                    <p class="mensaje mensaje-usuario"><?php echo $mensaje?></p>
                <?php 
                }else if($id_remitente == $id_otro_usuario && $id_receptor == $id_usuario){
                    ?>
                    <p class="mensaje mensaje-otro-usuario"><?php echo $mensaje?></p>
            <?php    
                }

            }
        }
    }else{
        header("location: bienvenida.php");
    }

}else{
    header("location: bienvenida.php");
}
?>
    </div>
    <input type="hidden" id="id_remitente" name="id_usuario" value="<?php echo $id_usuario;?>">
    <input type="hidden" id="id_receptor" name="id_otro_usuario" value="<?php echo $id_otro_usuario;?>">
    <input autocomplete = "off" id="mensaje-privado"  
    class="nuevo-mensaje" type="text" placeholder="Escribe tu mensaje...">
</div>
<script src="scripts/guardar_mensajes.js">
</script>