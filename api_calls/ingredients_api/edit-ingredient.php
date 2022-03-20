<?php

        require_once '../../db/db.php';

        $get_ingredient_id = rtrim(htmlspecialchars($_POST['ingredient_id'])) ;
        $ingredient_name =rtrim(htmlspecialchars($_POST['ingredient_name']));
        $quantity_available_box =rtrim(htmlspecialchars($_POST['quantity_available_box'])) ;
        $quantity_available_pcs =rtrim(htmlspecialchars($_POST['quantity_available_pcs'])) ;
        $cost_price_box = rtrim(htmlspecialchars($_POST['cost_price_box']));
        $cost_price_pcs = rtrim(htmlspecialchars($_POST['cost_price_pcs']));
        $expiry = rtrim(htmlspecialchars($_POST['expiry'])) ;

        $last_update = date('d-M-Y H:i');

        $updateIngredient = mysqli_query($connectionString,"UPDATE `tbl_ingredients` SET 
        `ingredient_name` = '$ingredient_name', 
        `last_updated` = '$last_update', 
        `cost_price_box` = '$cost_price_box', 
        `cost_price_pcs` = '$cost_price_pcs', 
        `expiry_date` = '$expiry', 
        `quantity_available_box` = '$quantity_available_box', 
        `quantity_available_pcs` = '$quantity_available_pcs' WHERE `tbl_ingredients`.`tbl_ingredient_id` = $get_ingredient_id") or die(mysqli_error($connectionString));
       
       if($updateIngredient){
            echo "success";
        }
?>
		
	