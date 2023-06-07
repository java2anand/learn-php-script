<?php

$csvFile = file('tbl_city_master.csv');
$data = [];
foreach ($csvFile as $line) {
	$data[] = str_getcsv($line);
}

$value = '';
$count = count($data);
for ($i = 1; $i < $count; $i++) {
	$value .= '(' . $data[$i][0] . ', ' . $data[$i][1] . ', ' . $data[$i][2] . ', "' . $data[$i][3] . '", "' . $data[$i][4] . '", "' . $data[$i][5] . '", "' . $data[$i][6] . '", ' . $data[$i][7] . ', ' . $data[$i][8] . ', ' . $data[$i][9] . ', ' . $data[$i][10] . ', "' . $data[$i][11] . '", "' . $data[$i][12] . '")';	

	if($i<$count-1){
		$value .= ",";
	}
}

$sql = "INSERT INTO tbl_city_master (city_id, state_id, countries_id, city_name, slug,image,description,sort_order,featured,status,is_deleted,date_added,date_modified ) VALUES " . $value;



$servername = "localhost:3306";
$username = "abhi";
$password = "pass1234";
$dbname = "prod_tjweb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


`customer_id` = 3387,`first_name` = 'Sunil',`last_name` = 'Mohapatra',`email` = 'sunil@delhihunt.in',`address1`='VerSe Innovation,IndiQube Delta,#6, 14th Main Road,HSR Layout, 5th Sector,Bangalore–560102, Karnataka, India',`address2`='',`landmark`='',`city`=269,`state`=12,`post_code`=560102,`countries_id`=99,`phone`=9873699153,`shipping_first_name`='Sunil',`shipping_last_name`='Mohapatra',`shipping_email`='sunil@delhihunt.in',`shipping_address1`='VerSe Innovation,IndiQube Delta,#6, 14th Main Road,HSR Layout, 5th Sector,Bangalore – 560102, Karnataka, India',`shipping_address2`='',`shipping_landmark`='',`shipping_city`=269,`shipping_state`=12,`shipping_post_code`=560102,`shipping_countries_id`=99,`shipping_phone`=9873699153,`billing_first_name`='Sunil',`billing_last_name`='Mohapatra',`billing_email`='sunil@delhihunt.in',`billing_address1`='VerSe Innovation,IndiQube Delta,#6, 14th Main Road,HSR Layout, 5th Sector,Bangalore – 560102, Karnataka, India',`billing_city`=269,`billing_state`=12,`billing_post_code`=560102,`billing_countries_id`=99,`billing_phone`=9873699153,`billing_company`='VerSe Innovation',`order_status`=5,`payment_status`=2,`payment_method`='OFFLINE',`order_total`=18585000,`order_date`='2021-03-05 15:45:09',`currency_id`=0,`date_added`='2021-03-05 15:45:09',`date_modified`='2021-03-05 15:45:09'


`product_id`=16363,`product_name`='Managed Services',`brand_id`=5693,`brand_name`='Techjockey',`gst_type`=13,`unit_price`=15750000,`price`=15750000,`qty`=1,`sub_total`=15750000,`plan_details` = '',`plan_variables`='',`plan_other_variables`='',`plan_id`=11051,`spec_id`=9902,`price_type`,`duration`,`duration_mode`,`csp_type`,`msSubscriptionId`,`subscriptionStartDate`,`subscriptionEndDate`,`deployment_status`,`rel_order_product_id`,`renewal_status`,`is_autodebit`,`autodebit_state`,`remaining_autodebit`,`autodebit_approval_date`,`next_autodebit_date`,`autodebit_period`,`autodebit_frequency`,`autodebit_order_product_id`



