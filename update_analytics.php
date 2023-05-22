<?php
$servername = "localhost:3306";
$username = "abhi";
$password = "pass1234";
$dbname = "prod_tjweb";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 

$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 5000;
$condition_id = isset($argv[1]) ? $argv[1] : 0;

$getAllQuery = "SELECT id, logic_date, vendor_id
FROM vendor_analytics 
WHERE id > $condition_id AND total_leads>0 AND DATE('logic_date') < '2022-11-14'
LIMIT $limit";
$allResult = mysqli_query($conn, $getAllQuery);

while($analytics = mysqli_fetch_assoc($allResult)){
    $logic_date    = $analytics['logic_date'];
    $vendor_id     = $analytics['vendor_id'];
    $analytic_id   = $analytics['id'];

    /* check if lead already exists */
    $averageQuery = "SELECT SUM(attempt_time) as average_time, COUNT(id) as total_attempt FROM `tbl_leads_call_attempt` WHERE vendor_id = $vendor_id AND DATE(lead_date) = '$logic_date';";
    $averageResult = mysqli_query($conn, $averageQuery);
    $averageData = mysqli_fetch_assoc($averageResult);
    
    $average_time   = $averageData['average_time'];
    $total_attempt_lead     = $averageData['total_attempt'];

    echo "Logic Date =======>".$logic_date.PHP_EOL;
    echo "Analytic ID ======>".$analytic_id.PHP_EOL;
    echo "Vendor ID ========>".$vendor_id.PHP_EOL;
    echo "Total Lead =======>".$total_attempt_lead.PHP_EOL;
    echo "Average Time =====>".$average_time.PHP_EOL;

    if($total_attempt_lead > 0){
        echo "<=============UPDATING QUERY ==============================>".PHP_EOL;

        $update_query = "UPDATE vendor_analytics SET total_attempt_lead = $total_attempt_lead, total_attempt_time = $average_time WHERE vendor_id = $vendor_id AND logic_date='$logic_date';";
        echo $update_query.PHP_EOL;
        mysqli_query($conn, $update_query);

        echo "<=============UPDATING COMPLETE ==============================>".PHP_EOL;
    }
}
mysqli_close($conn);
?>