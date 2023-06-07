<?php

$n = 7;

for($i=1; $i<= $n; $i++)
{
    for($j=1; $j<=$n; $j++)
    {
        if($i == (int)($n/2+1) || $j == (int)($n/2+1)){
            echo '* ';
        }else{
            echo '  ';
        }
    }
    echo PHP_EOL;
}

?>