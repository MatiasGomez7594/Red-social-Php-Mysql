<?php
    include("componentes/sesion.php");
    include('componentes/header.php');
    include("solo_publicacion.php");?>
    <div class="main">
    <?php 
        include("componentes/nueva_publicacion.php");
        include("todas_las_publicaciones_bbdd.php");
        ?>
    </div>

    <?php include("componentes/footer.php");?>





