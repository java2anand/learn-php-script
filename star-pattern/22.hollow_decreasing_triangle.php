<?php

$n = 5;

for($i=1; $i<= $n; $i++)
{
    for($j=$i; $j<=$n; $j++)
    {
        if($j == $i || $i == 1 || $j == $n){
            echo '* ';
        }else{
            echo '  ';
        }
    }
    echo PHP_EOL;
}

?>