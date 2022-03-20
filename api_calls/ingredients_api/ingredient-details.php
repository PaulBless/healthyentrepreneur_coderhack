<?php

header('Content-type: application/json; charset=UTF-8');

require_once '../../db/db.php';

	$response = array();
	
	if ($_POST['ingredientId']) {
		
		$pid = intval($_POST['ingredientId']);
        $getIngredientInfo = mysqli_query($connectionString,"SELECT * FROM tbl_ingredients where tbl_ingredients.tbl_ingredient_id ='$pid' LIMIT 1")or die(mysqli_error($connectionString));
        $ingredientInfo = mysqli_fetch_array($getIngredientInfo);  

        $response['ingredient_id']  = $ingredientInfo['tbl_ingredient_id'];
        $response['name']  = $ingredientInfo['ingredient_name'];
        $response['product_quantity_box']  = $ingredientInfo['quantity_available_box'];
        $response['product_quantity_pcs']  = $ingredientInfo['quantity_available_pcs'];
        $response['cost_price_box']  = $ingredientInfo['cost_price_box'];
        $response['cost_price_pcs']  = $ingredientInfo['cost_price_pcs'];
        $response['expiry_date']  = $ingredientInfo['expiry_date'];
     

		echo json_encode($response);
	}