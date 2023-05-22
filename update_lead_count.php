<?php
$servername = "localhost:3306";
$username = "abhi";
$password = "pass1234";
$dbname = "prod_tjweb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 

$query1 = "SELECT id as order_id,product_id, start_date, end_date FROM `oms_pi_details`";
$result1 = mysqli_query($conn, $query1);

while($parent_data = mysqli_fetch_assoc($result1)) 
{
    $order_id =  $parent_data['order_id'];
    $product_id =  $parent_data['product_id'];
    $start_date =  $parent_data['start_date'];
    $end_date =  $parent_data['end_date'];

    /* select all leads between date */
    echo '*******************total lead count query###############</br>';
    echo $query2 = "SELECT SUM(CASE WHEN original_parent_id IS NULL THEN 1 ELSE 0.75 END) as total, COUNT(id) as total_lead  FROM `tbl_leads` WHERE `product_id` = $product_id AND lead_visibility = 1 AND DATE(created_at) >= '".$start_date."' AND DATE(created_at) <= '".$end_date."'";
    echo '</br></br>';

    $result2 = mysqli_query($conn, $query2);
    $c_data = mysqli_fetch_assoc($result2);

    if($c_data['total'] != NULL){
        /* update used lead in tbl_leads_counter and oms_pi_details */
        $total_used_lead = $c_data['total'];
        echo '**************update total lead count query############</br>';
        echo $count_update_query = "UPDATE oms_pi_details, tbl_leads_counter SET oms_pi_details.used_lead = $total_used_lead,tbl_leads_counter.count_total = $total_used_lead WHERE oms_pi_details.id = tbl_leads_counter.order_id AND oms_pi_details.product_id = $product_id";
        echo '</br></br>';
        //mysqli_query($conn, $count_update_query);

        /* update lead_model_type, is_acd, is_show_contact, is_lead_cta, is_communication */
        echo '********************update lead model type query##################</br>';
        echo $update_lead_data_query = "UPDATE tbl_leads SET lead_model_type = 3, is_acd = 1, is_show_contact = 1, is_lead_cta = 1, is_communication = 1 WHERE product_id = $product_id AND lead_visibility = 1 AND DATE(created_at) >= '".$start_date."' AND DATE(created_at) <= '".$end_date."'";

        echo '</br></br></br></br>';
        //mysqli_query($conn, $update_lead_data_query);
    }
}

mysqli_close($conn);
?>