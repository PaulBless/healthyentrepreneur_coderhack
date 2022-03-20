<?php

require_once '../../db/db.php';

        $get_category_id = $_POST['category_id'];
        $clean_input_data = rtrim(htmlspecialchars($_POST['category_name']));
        $get_category_name = $clean_input_data;
        
        $updateCategory = mysqli_query($connectionString,"UPDATE `expense_category` SET `expense_name` = '$get_category_name' WHERE `expense_category`.`expense_category_id` = '$get_category_id'") or die(mysqli_error($connectionString));
        if($updateCategory){
            echo "success";
        }
