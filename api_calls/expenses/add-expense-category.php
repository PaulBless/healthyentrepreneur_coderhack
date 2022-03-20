<?php

require_once '../../db/db.php';

$cat_name =rtrim(htmlspecialchars($_POST['setCategoryName'])) ;
$get_category_name = ucwords($cat_name);     

$addCategory = mysqli_query($connectionString, "INSERT INTO `expense_category` (`expense_category_id`, `expense_category_timestamp`, `expense_name`) VALUES (NULL, CURRENT_TIMESTAMP, '$get_category_name')") or die(mysqli_error($connectionString));
if($addCategory){
     echo "success";
 }

 ?>