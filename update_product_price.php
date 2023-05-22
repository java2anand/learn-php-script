<?php
$servername = "localhost:3306";
$username = "abhi";
$password = "pass1234";
$dbname = "prod_tjweb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 

$offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : 0;
$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : 1000;
$con_prod_id = isset($argv[1]) ? $argv[1] : 1;


$query1 = "SELECT tp.product_name, tp.product_id, tp.slug, tp.price, tp.price_on_request FROM tbl_product tp 
WHERE tp.is_deleted=0 AND tp.status=1 AND tp.show_status=1 AND tp.product_id > $con_prod_id LIMIT $limit OFFSET $offset";
$result1 = mysqli_query($conn, $query1);


while($parent_data = mysqli_fetch_assoc($result1)) 
{
    $product_id =  $parent_data['product_id'];

    /* fetch data for update */
    $query2 = "SELECT tpsc.value, 
                          tps.plan_id, 
                          tps.discount_factor, 
                          tps.discount_value, 
                          tps.offer_start_date, 
                          tps.offer_end_date, 
                          tps.discount_percent 
                    FROM tbl_plan_spec AS tps
                    LEFT JOIN tbl_plan_spec_cost AS tpsc ON (tpsc.spec_id = tps.id AND tpsc.value != 0 AND tpsc.currency_id = 1)
                    WHERE tps.status = 1 AND 
                    tps.plan_id IN (SELECT tp.id as plan_id FROM tbl_plan AS tp
                                          WHERE tp.product_id = $product_id 
                                          AND tp.status = 1
                                          AND tp.plan_nature = 1
                                          AND tp.price_on_request = 0) 
                    ORDER BY tpsc.value ASC";
    $result2 = mysqli_query($conn, $query2);
    $spec_data = mysqli_fetch_assoc($result2);
    
    
    if(!empty($spec_data)){
      $special_price = 0; 
      if($spec_data['discount_factor'] != 0){
          if($spec_data['discount_factor'] == 1){
              $special_price = ($spec_data['value'] - ($spec_data['value'] * $spec_data['discount_value'])/100);
          }else if($spec_data['discount_factor'] == 2){
              $special_price = $spec_data['value'] - $spec_data['discount_value'];
          }else if($spec_data['discount_factor'] == 3){
              $special_price = $spec_data['discount_value'];
          }
      }

      
      $price = (isset($spec_data['value']) && !empty($spec_data['value'])) ? $spec_data['value'] : 0;
      $discount_factor = (isset($spec_data['discount_factor']) && !empty($spec_data['discount_factor'])) ? $spec_data['discount_factor'] : 0;
      $discount_value = (isset($spec_data['discount_value']) && !empty($spec_data['discount_value'])) ? $spec_data['discount_value'] : 0;
      $discount = (isset($spec_data['discount_percent']) && !empty($spec_data['discount_percent'])) ? $spec_data['discount_percent'] : 0;
      $offer_start_date = (isset($spec_data['offer_start_date']) && !empty($spec_data['offer_start_date'])) ? $spec_data['offer_start_date'] : '0000-00-00';
      $offer_end_date = (isset($spec_data['offer_end_date']) && !empty($spec_data['offer_end_date'])) ? $spec_data['offer_end_date'] : '0000-00-00';
      $price_on_request = '0';

      $count_update_query = "UPDATE tbl_product SET 
          price=$price, 
          special_price = $special_price, 
          discount_factor = $discount_value, 
          discount_value = $discount_value,
          discount = $discount,
          offer_start_date = '$offer_start_date',
          offer_end_date = '$offer_end_date',
          price_on_request = $price_on_request
        WHERE product_id = $product_id";
      echo $count_update_query.'---------------------------------------';
      mysqli_query($conn, $count_update_query);
    }else{
      /** If no active plans with active specs */
      $count_update_query = "UPDATE tbl_product SET price_on_request = 1, price = 0.00,special_price=0.00 WHERE product_id = $product_id";
      echo $count_update_query.'---------------------------------------';
      mysqli_query($conn, $count_update_query);
    }  
    echo '</br>';
}


mysqli_close($conn);
?>