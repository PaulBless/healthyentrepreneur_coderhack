<?php
require_once '../../db/db.php';

$get_users_username = mysqli_real_escape_string($connectionString,$_POST['username']);
$get_users_password = mysqli_real_escape_string($connectionString,$_POST['password']);

setcookie("u_n",$get_users_username, time() + (86400 * 30), '/');

$validate_user = mysqli_query($connectionString,"SELECT * FROM `users_table` WHERE `users_username` = '$get_users_username' LIMIT 1") or die(mysqli_error($connectionString));
if(mysqli_num_rows($validate_user) > 0){
    $get_details = mysqli_fetch_array($validate_user);
    $users_id = $get_details['users_table_id'];
    $db_harshed_password = $get_details['users_password'];

    if(($get_users_password == $db_harshed_password)){
    // if(password_verify($get_users_password,$db_harshed_password)){
    setcookie("u_r", 'a', time() + (86400 * 30), '/');
    setcookie("u_i",$users_id, time() + (86400 * 30), '/');
    $harsed_users_id = mt_rand(100000000,900000000);
    $new_user_id = '$.a'.$harsed_users_id.''.$users_id;
    setcookie("h_i",$new_user_id, time() + (86400 * 30), '/');

    echo "success";
    }else{
        echo 'error';
        return;
    }
    
    }else{
   $check_pharmacist = mysqli_query($connectionString,"SELECT * FROM `pharmacists_table` WHERE `pharmacists_username`='$get_users_username' LIMIT 1") or die(mysqli_error($connectionString));
    if(mysqli_num_rows($check_pharmacist) > 0){
        $get_details = mysqli_fetch_array($check_pharmacist);
        if($get_details['pharmacists_status'] === '1'){
            echo 'locked';
        }else{
            $users_id = $get_details['pharmacists_id'];
            $users_fname = $get_details['pharmacists_firstname'];
            $users_lname = $get_details['pharmacists_lastname'];
            $users_full_name = $users_fname.' '.$users_lname;

            $db_harshed_password = $get_details['pharmacists_password'];

                if(($get_users_password == $db_harshed_password)){
                // if(password_verify($get_users_password,$db_harshed_password)){
                     setcookie("u_r", 'p', time() + (86400 * 30), '/');
            setcookie("f_name", $users_full_name, time() + (86400 * 30), '/');
            setcookie("u_i",$users_id, time() + (86400 * 30), '/');
            $harsed_users_id = mt_rand(100000000,900000000);
            $new_user_id = '$.o'.$harsed_users_id.''.$users_id;
            setcookie("h_i",$new_user_id, time() + (86400 * 30), '/');
                echo "success";
                }else{
                    echo 'error';
                    return;
                }
           
        }
    }else{
        echo "error";
    }

}

?>