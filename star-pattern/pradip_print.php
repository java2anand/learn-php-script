<?php

$arr = [4,8,3,0,10];
$max = max($arr);

for($i = 0; $i < max($arr) ; $i++)
{
    for($j= 0; $j < count($arr); $j++)
    {
        if($arr[$j] < $max){
            echo " ";
        }else{
            echo "*";
        }
    }
    $max--;
    echo PHP_EOL;
}


