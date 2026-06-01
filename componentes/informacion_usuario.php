
<h1>Información de <?php echo $nombre_otro_usuario?></h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/informacion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="informacion">
        <div class="informacion-opciones">
            <h1 id="h1-informacion-personal" onclick="verInformacion()">Información personal</h1>
            <h1 id="h1-informacion-contacto" onclick="verInformacion()">Información de contacto</h1>
        </div>
        <div class="contenedor-datos">
        <?php
            //ver informacion del usuario
                $buscar_informacion="SELECT * FROM informacion_usuarios
                                    WHERE id_usuario='$id_otro';";
                $informacion_usuario=$conexion->query($buscar_informacion);
                if($informacion_usuario){
                    while($row=$informacion_usuario->fetch_assoc()){
                        $fecha_nacimiento=$row['fecha_nacimiento'];
                        $lugar_nacimiento=$row['lugar_nacimiento'];
                        $genero=$row['genero'];
                        $estado_civil=$row['estado_civil'];
                        $ciudad=$row['ciudad'];
                        $direccion=$row['direccion'];
                        $telefono=$row['telefono'];
                        $email = $row['email'];
                    }
                }
                ?>
            <div class="contenedor-informacion-contacto" id="contenedor-informacion-contacto">
                <div class="datos-usuario">
                    <i class="fas fa-house-user"></i> 
                    <p class="info-descripcion">Vive en 
                        <?php
                            $ciudad= $ciudad ? $ciudad : "No se indicó ciudad";
                            echo $ciudad;
                        ?>
                    </p> 
                </div>
                <div class="datos-usuario">
                    <i class="fas fa-map-marker-alt"></i> 
                    <p class="info-descripcion">Dirección 
                    <?php
                            $direccion = $direccion ? $direccion : "No se indicó dirección";
                            echo $direccion;
                        ?>    
                    </p> 
                </div>
                <div class="datos-usuario">
                    <i class="fas fa-phone-square-alt"></i> 
                    <p class="info-descripcion">Teléfono 
                        <?php
                            $telefono = $telefono ? $telefono : "No se indicó teléfono";
                            echo $telefono;
                        ?>
                    </p> 
                </div>
                <div class="datos-usuario">
                    <i class="fas fa-envelope-square"></i>
                    <p class="info-descripcion">Email 
                        <?php echo $email?>
                    </p>
                </div>
            </div>
            <div class="contenedor-informacion-personal" id="contenedor-informacion-personal">
                <div class="datos-usuario">
                    <i class="fas fa-birthday-cake"></i>
                    <p class="info-descripcion">Fecha de nacimiento 
                    <?php
                           $fecha_nacimiento = $fecha_nacimiento ?$fecha_nacimiento : "No hay fecha que mostrar";
                            echo $fecha_nacimiento;
                        ?>
                    </p> 
                </div>
                <div class="datos-usuario">
                    <i class="fas fa-flag"></i>
                    <p class="info-descripcion">Lugar de nacimiento 
                    <?php
                        $lugar_nacimiento = $lugar_nacimiento ? $lugar_nacimiento : "No se indicó lugar de nacimiento";
                        echo $lugar_nacimiento;
                    ?>
                    </p> 
                </div>
                <div class="datos-usuario">
                    <?php
                        if($genero=='hombre'){
                            ?>
                            <i class="fas fa-mars"></i>
                            <p class="info-descripcion">Hombre</p> 
                    <?php
                        }else if($genero=='mujer'){
                            ?>
                            <i class="fas fa-venus"></i>
                            <p class="info-descripcion">Mujer</p>
                    <?php
                        }
                    ?>
                </div>
                <div class="datos-usuario">
                    <i class="fas fa-heart"></i>
                    <p class="info-descripcion">
                    <?php
                        $estado_civil= $estado_civil ? $estado_civil : "No se indicó estado civil";
                        echo $estado_civil;
                        ?>
                    </p> 
                </div>
            </div>
        </div>
    </div>
</body>
<script src="scripts/informacion_personal.js"></script>
</html>