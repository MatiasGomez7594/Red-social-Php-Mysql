<?php
include('con_db.php');
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

        //verifico que el que usuario y password esten en la BBDD
        $iniciar_sesion =  "SELECT id FROM users
        WHERE password = '$password' AND email = '$email'";
        $resultado = mysqli_query($conexion,$iniciar_sesion);
        //verifico que se haya encontrado una fila que coincida con la busqueda
        if((mysqli_num_rows($resultado))>0){
            //para que solo usuarios registrados inicien sesion
            $id_usuario = $resultado->fetch_assoc();
            $_SESSION['usuario'] = $id_usuario['id'];
            return true;
        }else{
            return false;
        }


mysqli_close($conexion);
?>
