<?php

$csvFile = file('vendor_auth.csv');
$data = [];
foreach ($csvFile as $line) {
	$data[] = str_getcsv($line);
}

$value = '';
$count = count($data);

for ($i = 1; $i < $count; $i++) {

	$first_name = $data[$i][1];
	$last_name = $data[$i][2];
	$id = $data[$i][0];

	$sql = "UPDATE vendor_auth SET first_name = '$first_name', last_name = '$last_name' WHERE id = $id;".PHP_EOL;
	echo $sql;
}

