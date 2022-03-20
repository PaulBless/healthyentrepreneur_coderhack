<?php

header('Content-type: application/json; charset=UTF-8');

require_once '../../db/db.php';

	$response = array();
	
	if ($_POST['productId']) {
		
		$pid = intval($_POST['productId']);
        $getUserInfo = mysqli_query($connectionString,"SELECT * FROM pharmacists_table join status_table on pharmacists_table.pharmacists_status = status_table.status_id join role_table on pharmacists_table.pharmacists_role = role_table.role_id WHERE `pharmacists_id`='$pid' LIMIT 1")or die(mysqli_error($connectionString));
        $userInfo = mysqli_fetch_array($getUserInfo);  

        $response['users_id']  = $userInfo['pharmacists_id'];
        $response['first_name']  = $userInfo['pharmacists_firstname'];
        $response['last_name']  = $userInfo['pharmacists_lastname'];
        $response['contact']  = $userInfo['pharmacists_contact'];
        $response['priority']  = $userInfo['pharmacists_role'];
        $response['status']  = $userInfo['pharmacists_status'];
        $response['username']  = $userInfo['pharmacists_username'];
        $response['password']  = $userInfo['pharmacists_password'];
     

		echo json_encode($response);
	}