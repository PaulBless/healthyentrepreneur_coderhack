<?php

require_once '../../db/db.php';

        $get_product_id = rtrim(htmlspecialchars($_POST['product_id'])) ;
        $new_quantity = rtrim(htmlspecialchars($_POST['new_quantity']));
        $new_expiry = rtrim(htmlspecialchars($_POST['new_expiry']));
        $old_quantity =rtrim(htmlspecialchars($_POST['old_quantity'])) ;

        $new_quantity_available = intval($new_quantity + $old_quantity);
       

        $updateProduct = mysqli_query($connectionString,"UPDATE `tbl_products` SET `quantity_available` = '$new_quantity_available', 
        `expiry_date` = '$new_expiry' WHERE `tbl_products`.`tbl_products_id` = '$get_product_id'") or die(mysqli_error($connectionString));
        if($updateProduct){
            echo "success";
        }

		
	