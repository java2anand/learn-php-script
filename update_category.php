<?php
$servername = "localhost:3306";
$username = "abhi";
$password = "pass1234";
$dbname = "prod_tjweb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 

$query1 = "SELECT DISTINCT(product_id) FROM tbl_leads";
$result1 = mysqli_query($conn, $query1);

while($product_id = mysqli_fetch_assoc($result1)) 
{
    $pid =  $product_id['product_id'];

    $query2 = "SELECT category_id, category_name, slug FROM tbl_category WHERE category_id IN (SELECT category_id 
        FROM `tbl_product_category` WHERE product_id = $pid AND category_id NOT IN (SELECT parent_id FROM tbl_product_category where product_id = $pid) AND status = 1 AND is_deleted = 0)";
    $result2 = mysqli_query($conn, $query2);
    $c_data = mysqli_fetch_assoc($result2);

    $category_id = $c_data['category_id'];
    $category_name = $c_data['category_name'];
    $update_query = "UPDATE tbl_leads SET category_id = $category_id,software_category = '$category_name' WHERE product_id = $pid";
    mysqli_query($conn, $update_query);
}

mysqli_close($conn);
?>