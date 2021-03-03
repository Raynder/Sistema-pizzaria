<?php
 $pos = 'coca';
 $pos2 = 'coca,cola';
 $res = strpos($pos2, $pos);

 if($res === false){
     echo('não encontrada');
 }
 else{
     echo("encontrada");
 }