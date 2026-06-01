<?php
$mail = "matias@gmail.com.ar";

$mailvalido = "/^[^@-_ -:;|?¡¿]+@[^@]+\.[a-zA-Z]{2,}$/";

$emailvalido = "#^[a-zA-Z]#";


$usuario_valido = "/\w/g";
$usuario = "matias";



if(preg_match($mailvalido, $mail)){

 echo "Es un email valido";
} else {
    echo "No es un email valido";
}

if(preg_match($usuario_valido, $usuario)){
 echo "Es un usuario valido";
} else {
    echo "No es un usuario valido";
}
?>