<?php

header('Content-type: application/json; charset=UTF-8');

require_once '../../db/db.php';

	$response = array();
	
	if ($_POST['delete']) {
		
		$pid = intval($_POST['delete']);
		$query = mysqli_query($connectionString,"DELETE FROM `pharmacists_table` WHERE `pharmacists_table`.`pharmacists_id` = '$pid'") or die(mysqli_error($connectionString));

		if ($query) {
			$response['status']  = 'success';
			$response['message'] = 'User Deleted Successfully ...';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'Unable to delete User ...';
		}
		echo json_encode($response);
	}