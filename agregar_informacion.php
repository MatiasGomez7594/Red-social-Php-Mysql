<?php
include("con_db.php");
if(isset($_POST['informacion_personal'])){
    $id_usuario=$_POST['id_usuario'];
    $fecha_nacimiento='';
    $ciudad_origen='';
    $sexo='';
    $estado_civil='';
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $ciudad_origen=$_POST['ciudad_origen'];
    $sexo=$_POST['sexo'];
    $estado_civil=$_POST['estado_civil'];
    $guardar_informacion="UPDATE informacion_usuarios SET 
                            fecha_nacimiento='$fecha_nacimiento',
                            lugar_nacimiento='$ciudad_origen',
                            genero='$sexo',
                            estado_civil='$estado_civil'
                            WHERE id_usuario='$id_usuario';";
    $se_guardo=$conexion->query($guardar_informacion);
    if($se_guardo){
        ?>
        <script>
            window.history.back(-1);
        </script>
<?php
    }else{
        ?>
        <script>
            alert("Se produjo un error intente mas tarde");
            window.history.back(-1)
        </script>
<?php
    }
}

else if(isset($_POST['informacion_contacto'])){
    $id_usuario=$_POST['id_usuario'];
    $ciudad='';
    $direccion='';
    $telefono='';
    $ciudad=$_POST['ciudad'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $guardar_informacion="UPDATE informacion_usuarios SET 
                            ciudad='$ciudad',
                            direccion='$direccion',
                            telefono='$telefono'
                                where id_usuario='$id_usuario';";
    $se_guardo=$conexion->query($guardar_informacion);
    if($se_guardo){
        ?>
        <script>
            window.history.back(-1);
        </script>
    
<?php
    }else{
       ?>
       <script>
        alert('Se produjo un error intente mas tarde');
        window.history.back(-1);
       </script>
 <?php
    }

}else{
    ?>
    <script>
        window.history.back(-1)
    </script>
<?php
}

?>