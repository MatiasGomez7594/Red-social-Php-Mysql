
<?php
/*
include("con_db.php");
//$fecha_actual=date("Y-m-d-h-i-s");
//echo $fecha_actual."<br>";
$fecha = strtotime($fecha);

echo $fecha."<br>";
$diff=time()-(int)$fecha;
//echo $diff;
if($diff==0){
    $diff= 'justo ahora';
}
if($diff>604800){
    $diff=date("d M Y",$fecha);
}

//"SELECT *, TIMESTAMPDIFF(DAY,fecha,NOW()) AS diferencia FROM tabla WHERE campo = condicion";



?>
*/
        date_default_timezone_set("America/Argentina/Jujuy");
           $timestamp = strtotime($fecha_pub);       
           
           $strTime = array("segundo", "minuto", "hora", "dia", "mes", "año");
           $strTime2 = array("segundos", "minutos", "horas", "dias", "meses", "años");
           $length = array("60","60","24","30","12","10");

           $currentTime = time();
           
           
           if($currentTime > $timestamp) {
                        $diff = time()-$timestamp;
                        for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                        $diff = $diff / $length[$i];
                        }

                        $diff = round($diff);
                        if($diff>1){
                            echo "Hace " . $diff . " " . $strTime2[$i];
                        }else{
                            echo "Hace " . $diff . " " . $strTime[$i];
                        }
                        
           }else{
               echo 'Hace un instante';
           }
        
        
?>