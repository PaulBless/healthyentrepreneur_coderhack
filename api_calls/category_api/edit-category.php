<?php

require_once '../../db/db.php';

        $get_category_id = $_POST['category_id'];
        $cat_name = rtrim(htmlspecialchars($_POST['category_name']));
        $get_category_name = ucwords($cat_name);
        
        $updateCategory = mysqli_query($connectionString,"UPDATE `categories_tbl` SET `category_name` = '$get_category_name' WHERE `categories_tbl`.`category_id` = '$get_category_id'") or die(mysqli_error($connectionString));
        if($updateCategory){
            echo "success";
        }

?>	
	