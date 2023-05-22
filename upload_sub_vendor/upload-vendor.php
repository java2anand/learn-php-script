<?php

$csvFile = file('sub_vendors.csv');
$data = [];
foreach ($csvFile as $line) {
	$data[] = str_getcsv($line);
}

$value = '';
$count = count($data);

for ($i = 1; $i < $count; $i++) {
	$value .= '(NULL, ' . $data[$i][0] . ', 0, "", "", "' . $data[$i][1] . '", 91, ' . $data[$i][2] . ', "", "2022-11-17", "2022-11-17", "", 0, 1, 0, NULL, 1, 1 )';	

	if($i<$count-1){
		$value .= ",";
	}
}

$sql = "INSERT INTO vendor_auth (`id`, `vendor_id`, `is_admin`, `first_name`, `last_name`, `email`, `dial_code`, `phone`, `password`, `created_at`, `last_updated`, `hash_string`, `email_verified`, `status`, `is_deleted`, `last_login_date`, `is_acd`, `admin_verified` ) VALUES " . $value.';';

echo $sql;