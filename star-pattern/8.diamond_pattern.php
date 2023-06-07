<?php 
$n = 4;
for($i=1; $i<$n;$i++)
{
    for($j=$i;$j<$n;$j++){
        echo "  ";
    }
    for($k=1;$k<=$i;$k++)
    {
        echo "* ";
    }
    for($m=1;$m<$i;$m++){
        echo "* ";
    }
    echo PHP_EOL;
}

for($i=1; $i<=$n;$i++)
{
    for($j=1;$j<$i;$j++){
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