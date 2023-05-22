<?php
$servername = "localhost:3306";
$username = "abhi";
$password = "pass1234";
$dbname = "prod_tjweb";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 

//$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : 0;
$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 1000;
$con_lead_id = isset($argv[1]) ? $argv[1] : 1;

$getAllLeadsQuery = "SELECT tl.id, tl.vendor_id, tl.created_at 
    FROM tbl_leads AS tl
    WHERE tl.lead_model_type !=4  
        AND tl.id > $con_lead_id 
        AND tl.vendor_id != '' 
        AND tl.created_at > '2022-03-31' 
    LIMIT $limit";
$allLeadsResult = mysqli_query($conn, $getAllLeadsQuery);

while($leads = mysqli_fetch_assoc($allLeadsResult)){
    $current_lead_id    = $leads['id'];
    $vendor_id          = $leads['vendor_id'];
    $lead_create_date   = $leads['created_at'];

    /* check if lead already exists */
    $alreadyCheckQuery = "SELECT count(id) as total FROM tbl_leads_call_attempt WHERE lead_id = $current_lead_id";
    $alreadyCheckResult = mysqli_query($conn, $alreadyCheckQuery);
    $alreadyCheck = mysqli_fetch_assoc($alreadyCheckResult);
    
    if($alreadyCheck['total'] == 0){
        $leadHistoryDataQuery = "SELECT * FROM `tbl_leads_history` WHERE lead_id = $current_lead_id AND remark IN ('Connected/Interested','Missed By Customer','Contact viewed by OEM') ORDER BY id ASC LIMIT 1";
        $leadHistoryDataResult = mysqli_query($conn, $leadHistoryDataQuery);
        $leadHistory = mysqli_fetch_assoc($leadHistoryDataResult);

        if(!empty($leadHistory) ){
            echo 'LEAD ID ========>'.$current_lead_id.PHP_EOL;
            echo 'START DATE======>'.$lead_create_date.PHP_EOL;
            echo "END DATE========>".$leadHistory['created_at'].PHP_EOL;
            
            $calculate_time = getAvgTimeMinute($lead_create_date, $leadHistory['created_at']);
            $total_time = $calculate_time < 0 ? 0 : round($calculate_time);

            echo 'AVG TIME========>'.$total_time.PHP_EOL;

            /* insert data in tbl_leads_call_attempt */
            $historyDate = date('Y-m-d H:i:s',strtotime($leadHistory['created_at']));
            $attempt_date = date('Y-m-d H:i:s');
            $insert_query = "INSERT 
                INTO tbl_leads_call_attempt (`id`,`vendor_id`,`lead_id`,`attempt_time`,`lead_date`,`lead_attempt_date`) 
                VALUES( NULL, $vendor_id, $current_lead_id, $total_time, '".$lead_create_date."', '".$historyDate."');";
            echo $insert_query.PHP_EOL;
            mysqli_query($conn, $insert_query);
        }
    }
}


function getAvgTimeMinute($begin_date, $end_date)
{
    $sTART = date("H:i", strtotime("10:00 AM"));
    $eND = date("H:i", strtotime("07:00 PM"));

    $begin = new DateTime($begin_date);
    $begin_loop = clone $begin;
    $end = new DateTime($end_date);

    $hour = 0;
    while ($begin_loop->format('Y-m-d') <= $end->format('Y-m-d')) {
        if ($begin_loop->format('Y-m-d') == $begin->format('Y-m-d')) {
            if ($begin_loop->format('N') != 6 && $begin_loop->format('N') != 7) {
                if ($begin->format('Y-m-d') == $end->format('Y-m-d')) {
                    if($end->format('H:i') > $eND){
                        $acd_end_time = strtotime($end->format('Y-m-d ' . $eND));
                    }else{
                        $acd_end_time = strtotime($end->format('Y-m-d H:i:s'));
                    }
                } else {
                    $acd_end_time = strtotime($begin->format('Y-m-d ' . $eND));
                }

                if($begin->format('H:i') >= $sTART && $begin->format('H:i') <= $eND) {
                    $acd_start_time = strtotime($begin->format('Y-m-d H:i:s'));
                    $calculate_hour = ($acd_end_time - $acd_start_time) / (60);
                } else if($begin->format('H:i') > $eND) {
                    //do nothing 
                    $calculate_hour = 0;
                }else{
                    $acd_start_time = strtotime($begin->format('Y-m-d ' . $sTART));
                    $calculate_hour = ($acd_end_time - $acd_start_time) / (60);
                }
                $hour = $hour + $calculate_hour;
            }
        } elseif ($begin_loop->format('Y-m-d') == $end->format('Y-m-d')) {
            if ($begin_loop->format('N') != 6 && $begin_loop->format('N') != 7) {
                $acd_start_time = strtotime($end->format('Y-m-d ' . $sTART));

                if($end->format('H:i') > $eND){
                    $acd_end_time = strtotime($end->format('Y-m-d '. $eND));
                    $calculate_hour = ($acd_end_time - $acd_start_time) / (60);
                }else if($end->format('H:i') < $sTART){
                    $calculate_hour = 0;
                }else{
                    $acd_end_time = strtotime($end->format('Y-m-d H:i:s'));
                    $calculate_hour = ($acd_end_time - $acd_start_time) / (60);
                }
                
                $hour = $hour + $calculate_hour;
            }
        } else {
            if ($begin_loop->format('N') != 6 && $begin_loop->format('N') != 7) {
                $acd_end_time = strtotime($eND);
                $acd_start_time = strtotime($sTART);
                $calculate_hour = ($acd_end_time - $acd_start_time) / (60);
                $hour = $hour + $calculate_hour;
            }
        }
        
        $begin_loop->modify('+1 day');
    }
    
    return $hour;
}

mysqli_close($conn);
?>