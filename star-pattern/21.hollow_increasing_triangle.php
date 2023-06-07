<?php

$n = 7;

for($i=1; $i<= $n; $i++)
{
    for($j=1; $j<=$i; $j++)
    {
        if($i == $n || $j== 1 || $j == $i){
            echo '* ';
        }else{
            echo '  ';
        }
    }
    echo PHP_EOL;
}

?>