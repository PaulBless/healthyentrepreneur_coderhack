<?php

	header('Content-type: application/json; charset=UTF-8');

	require_once '../../db/db.php';

	$response = array();
	
	if ($_POST['product_id']){
		
		$pid = intval($_POST['product_id']);
        $getProductInfo = mysqli_query($connectionString,"SELECT * FROM `tbl_products` where tbl_products.tbl_products_id ='$pid' LIMIT 1")or die(mysqli_error($connectionString));
        $productInfo = mysqli_fetch_array($getProductInfo);  

        $response['product_id']  = $productInfo['tbl_products_id'];
        $response['product_name']  = $productInfo['product_name'];
        $response['product_quantity_pcs']  = $productInfo['quantity_available_pcs'];
        $response['product_selling_pcs']  = $productInfo['selling_price_pcs'];

		echo json_encode($response);
	}

?>