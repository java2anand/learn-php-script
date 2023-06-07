<?php 
$n = 5;
for($i=1; $i<=$n;$i++)
{
    for($j=$i;$j<$n;$j++){
        echo "  ";
    }
    for($k=1;$k<=$i;$k++){
        echo "* ";
    }
    for($m=1;$m<=$i;$m++){
        echo "* ";
    }
    for($u=$i;$u<=$n;$u++){
        echo "  ";
    }

    for($j=$i;$j<$n;$j++){
        echo "  ";
    }
    for($k=1;$k<=$i;$k++){
        echo "* ";
    }
    for($m=1;$m<=$i;$m++){
        echo "* ";
    }
    for($u=$i;$u<=$n;$u++){
        echo "  ";
    }
    
    
    echo PHP_EOL;
}