<?php

header('Content-type: application/json; charset=UTF-8');

require_once '../../db/db.php';

	$response = array();
	
	if ($_POST['categoryId']) {
		
		$pid = intval($_POST['categoryId']);
        $getCategoryInfo = mysqli_query($connectionString,"SELECT * FROM expense_category WHERE `expense_category_id`='$pid' LIMIT 1")or die(mysqli_error($connectionString));
        $eachCategory = mysqli_fetch_array($getCategoryInfo);  

        $response['category_name']  = $eachCategory['expense_name'];
        
		echo json_encode($response);
	}