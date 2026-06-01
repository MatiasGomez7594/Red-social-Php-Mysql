<?php

include('con_db.php');
//print_r($_POST);

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];



    //para verificar que el email no se encuentre registrado
    include("buscar_registro.php");
    if($registro_encontrado !== true){
        $usuario = trim($usuario);
        $email = trim($email);
        $password = trim($password);
        $registrar_usuario = "INSERT INTO
        usuarios (usuario, email, contrasena) 
        VALUES ('$usuario','$email','$password')";
        $resultado = mysqli_query($conexion,$registrar_usuario);
        if($resultado){
            echo "Registro exitoso!";
        }else{
            echo "Hubo un error intente mas tarde!";
        }
    }else{
       echo "Error! el email ingresado ya se encuentra registrado";
    }
    
    mysqli_close($conexion);


