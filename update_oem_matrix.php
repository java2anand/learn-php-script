<?php
$servername = "mysql.tj.web";
$username = "admin";
$password = "JOVSxy0HmSrwrtrbhOBp";
$dbname = "prod_tjweb";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 5000;
$start_lead_id = isset($argv[1]) ? $argv[1] : 0;

$getAllQuery = "SELECT v.id FROM vendors AS v
                WHERE v.id > $start_lead_id
                ORDER BY v.id ASC
                LIMIT $limit";
$allResult = mysqli_query($conn, $getAllQuery);

while ($result = mysqli_fetch_assoc($allResult)) {
    $vendor_id = $result['id'];

    /* get root cat */
    $cookiesQuery = "SELECT * FROM tbl_leads_cookies tlc
    WHERE tlc.lead_id = $lead_id";
    $cookieResult = mysqli_query($conn, $cookiesQuery);
    $jsonCookieData = mysqli_fetch_assoc($cookieResult);
    
    if (!empty($jsonCookieData)) {
        $cookieData = json_decode($jsonCookieData['cookie'],TRUE);

        if(!empty($cookieData['tj_crm_utm_source'])){
            $utm_source = $cookieData['tj_crm_utm_source'];
            $utm_campaign = $cookieData['tj_crm_utm_campaign'] ?? '';
            $utm_medium = $cookieData['tj_crm_utm_medium'] ?? '';
            $utm_content = $cookieData['tj_crm_utm_content'] ?? '';
            $utm_term = $cookieData['tj_crm_utm_term'] ?? '';
            $gclid = $cookieData['tj_crm_gclid'] ?? '';
            
            echo "<=============UPDATING QUERY ==============================>" . PHP_EOL;
            $update_query = "UPDATE tbl_leads_tracker 
            SET utm_source = '{$utm_source}', 
                utm_campaign = '{$utm_campaign}',
                utm_medium = '{$utm_medium}',
                utm_content = '{$utm_content}',
                utm_term = '{$utm_term}',
                gclid = '{$gclid}'
            WHERE lead_id = $lead_id";
            mysqli_query($conn, $update_query);
            echo $update_query . PHP_EOL;
            echo "<=============UPDATING COMPLETE ==============================>\n" . PHP_EOL;
        }
    }

    echo "looop-leadid-------- ".$lead_id.PHP_EOL;
}
mysqli_close($conn);