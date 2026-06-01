<?php
        $ver_me_gustas="SELECT id_me_gusta FROM me_gustas
        WHERE id_elemento ='$id_elemento' 
        AND tipo_elemento = '$tipo_elemento'";
        $total_me_gustas= mysqli_query($conexion,$ver_me_gustas);
        if(mysqli_num_rows($total_me_gustas)>0){
            echo mysqli_num_rows($total_me_gustas).' me gusta';

        }
        
?>
