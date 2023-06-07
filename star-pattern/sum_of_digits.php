<?php
$num = 5678460;
$sum = 0; $rem = 0;
echo strlen($num);
for($i=0; $i<= strlen($num); $i++)
{
    echo $rem = ($num % 10).PHP_EOL;
    echo $sum = ($sum + $rem).PHP_EOL;
    echo $num = ($num / 10).PHP_EOL;
}

echo 'total =>'.$sum;

?>