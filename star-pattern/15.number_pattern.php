<?php

$n = 5;

for($i=1; $i<= $n; $i++)
{
    $p=1;
    for($j=1; $j<=$i; $j++)
    {
        echo $p.' ';
        $p++;
    }
    echo PHP_EOL;
}

?>