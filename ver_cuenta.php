<?php
include("componentes/sesion.php");
include("componentes/header.php");
include("componentes/header_cuenta.php");

$vista = isset($_GET['p']) ? strtolower($_GET['p']) : 'mis_publicaciones';


require_once 'componentes/'.$vista.'.php';
    
include("componentes/footer.php");
?>
