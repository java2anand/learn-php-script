<?php

$n = 5;

for($i=1; $i<= $n; $i++)
{
    for($j=1; $j<=$n; $j++)
    {
        if($j == 1 || $j==$n){
            echo '* ';
        }else{
            echo '  ';
        }
    }
    echo PHP_EOL;
}

?>