<?php
$servername = 'localhost:3306';
$username = 'root';
$password = 'mayank';
$dbname = "c0_techjockey2";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 

$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 5000;
$condition_id = isset($argv[1]) ? $argv[1] : 0;

$getAllQuery = "SELECT order_product_id, brand_id FROM `tbl_order_product` WHERE order_product_id > $condition_id AND vendor_id IS NULL 
    LIMIT $limit";
$allResult = mysqli_query($conn, $getAllQuery);

while($order = mysqli_fetch_assoc($allResult)){
    $brand_id = $order['brand_id'];
    $order_product_id = $order['order_product_id'];

    /* get vendor id */
    $vendorBrandQuery = "SELECT vbr.vendor_id
            FROM vendor_brand_relation as vbr
            INNER JOIN vendors as v ON v.id = vbr.vendor_id
            LEFT JOIN vendor_details as vd ON vd.vendor_id = v.id
                WHERE vbr.tbl_brand_id != 0
                    AND vbr.tbl_brand_id = $brand_id
                    AND vbr.status = 1
                    AND v.status = 1";
    $vendorResult = mysqli_query($conn, $vendorBrandQuery);
    $vendorData = mysqli_fetch_assoc($vendorResult);
    if(!empty($vendorData)){

        $vendorId   = $vendorData['vendor_id'];
        echo $brand_id. "=======>". $vendorId.PHP_EOL;

        echo "<=============UPDATING QUERY ==============================>".PHP_EOL;
        $update_query = "UPDATE tbl_order_product SET vendor_id = $vendorId WHERE order_product_id = $order_product_id AND brand_id=$brand_id";
        echo $update_query.PHP_EOL;
        mysqli_query($conn, $update_query);
        echo "<=============UPDATING COMPLETE ==============================>".PHP_EOL;
    }
}
mysqli_close($conn);