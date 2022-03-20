<?php

require_once '../../db/db.php';


        $get_name = rtrim(htmlspecialchars($_POST['setCategoryName'])) ;
        $get_category_name = ucwords($get_name) ;
       

        $addCategory = mysqli_query($connectionString,"INSERT INTO `categories_tbl` (`category_id`, `category_name`, `category_timestamp`) VALUES (NULL, '$get_category_name', CURRENT_TIMESTAMP)") or die(mysqli_error($connectionString));
        if($addCategory){
            echo "success";
        }
        
?>
