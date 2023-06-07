<?php 
$n = 5;
for($i=1; $i<$n;$i++)
{
    for($j=$i;$j<$n;$j++){
        echo "  ";
    }
    for($k=1;$k<$i;$k++)
    {
        if($k==1){
            echo "* ";
        }else{
            echo "  ";
        }
        
    }
    for($m=1;$m<=$i;$m++){
        if($m==$i){
            echo "* ";
        }else{
            echo "  ";
        }
    }
    echo PHP_EOL;
}

for($i=1; $i<=$n;$i++)
{
    for($j=1;$j<$i;$j++){
        echo "  ";
    }
    for($k=$i;$k<$n;$k++){
        if($k==$i){
            echo "* ";
        }else{
            echo "  ";
        }
    }
    for($m=$i;$m<=$n;$m++){
        if($m==$n){
            echo "* ";
        }else{
            echo "  ";
        }
    }
    echo PHP_EOL;
}