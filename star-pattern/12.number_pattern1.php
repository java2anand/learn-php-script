<?php
$n = 5;
$p = 1;
for($i=1; $i<=$n; $i++)
{

    for($j=1; $j<=$i; $j++)
    {
        echo $p;
    }
    $p++;
    echo PHP_EOL;
}

?>