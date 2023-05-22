<?php
$servername = "mysql";
$username = "abhi";
$password = "pass1234";
$dbname = "prod_tjweb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 5000;
$start_lead_id = isset($argv[1]) ? $argv[1] : 0;

$getAllQuery = "SELECT vbr.id, vbr.vendor_id, vbr.tbl_brand_id FROM vendor_brand_relation AS vbr WHERE 
vbr.status = 1 AND
vbr.id > $start_lead_id
ORDER BY vbr.id ASC
LIMIT $limit";
$allResult = mysqli_query($conn, $getAllQuery);

while ($result = mysqli_fetch_assoc($allResult)) {
    $vendor_id = $result['vendor_id'];
    $brand_id = $result['tbl_brand_id'];
    $vbr_id = $result['id'];

    echo 'vbr_id ======================>'.$vbr_id;


    /* get all brand by vendors */
    $vendorQuery = "SELECT v.* FROM vendors AS v
                    WHERE v.id = $vendor_id AND v.status = 1 AND v.is_deleted = 0";
    $vendorResult = mysqli_query($conn, $vendorQuery);
    $vendorData = mysqli_fetch_assoc($vendorResult);
    
    if (!empty($vendorData)) {
        print_r($vendorData);

        $ratingQuery = "SELECT COUNT(review_id) as total_review FROM tbl_product AS tp
        LEFT JOIN tbl_review as tr ON tr.product_id = tp.product_id AND tr.status = 1 AND tr.is_deleted = 0
        WHERE tp.brand_id = $brand_id";
        $ratingResult = mysqli_query($conn, $ratingQuery);
        $ratingData = mysqli_fetch_assoc($ratingResult);

        if(!empty($ratingData)){
            $total_review = $ratingData['total_review'];
            
            echo "<=============UPDATING QUERY ==============================>" . PHP_EOL;
            $update_query = "UPDATE vendors
            SET total_reviews = `total_reviews` + '{$total_review}'
            WHERE id = $vendor_id";
            //mysqli_query($conn, $update_query);
            echo $update_query . PHP_EOL;
            echo "<=============UPDATING COMPLETE ==============================>\n" . PHP_EOL;
        }
    }
}
mysqli_close($conn);