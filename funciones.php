<?php 

function getDataFileArray($file){
    $archivo = fopen($file,'r');
    $contenido = fread($archivo,filesize($file));
    fclose($archivo);
    return json_decode($contenido,true);
    
}

?>