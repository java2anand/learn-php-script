<?php 
$n = 5;
for($i=1; $i<=$n;$i++)
{
    for($k=1;$k<=$i;$k++){
        echo "  ";
    }
    for($j=$i;$j<=$n;$j++){
        echo "# ";
    }
    for($u=$i;$u<$n;$u++){
        echo "# ";
    }
    
    for($m=1;$m<$i;$m++){
        echo "  ";
    }
    

    for($k=1;$k<$i;$k++){
        echo "  ";
    }
    for($j=$i;$j<=$n;$j++){
        echo "# ";
    }
    for($u=$i;$u<$n;$u++){
        echo "# ";
    }
    for($m=1;$m<=$i;$m++){
        echo "  ";
    }
    echo PHP_EOL;
}