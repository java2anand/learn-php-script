<?php

$n = 5;

for($i=1; $i<= $n; $i++)
{
    for($j=1; $j<=$i; $j++)
    {
        if($i % 2 == 0){
            echo '2 ';
        }else{
            echo '1 ';
        }
        
    }
    echo PHP_EOL;
}

?>