<?php 
$n = 10;
for($i=1; $i<=$n;$i++)
{
    for($j=1;$j<=$i;$j++){
        echo "  ";
    }
    for($k=$i;$k<=$n;$k++){
        echo "* ";
    }
    for($m=$i;$m<$n;$m++){
        echo "* ";
    }
    echo PHP_EOL;
}