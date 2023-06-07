<?php 
$n = 5;
for($i=1; $i<=$n;$i++)
{
    for($j=$i;$j<$n;$j++){
        echo "  ";
    }
    for($k=1;$k<$i;$k++)
    {
        if($i==$n || $k == 1 ){
            echo "* ";
        }else{
            echo "  ";
        }
    }
    for($m=1;$m<=$i;$m++){
        if($i==$n || $m == $i ){
            echo "* ";
        }else{
            echo "  ";
        }
    }
    echo PHP_EOL;
}