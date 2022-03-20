<?php
require_once '../../db/db.php';

$get_users_password = $_POST['password'];

if($_COOKIE['c_r']==='a' && $_COOKIE['u_r']==='a'){
    $selected_a_id = $_COOKIE['u_i'];
    $validate_user = mysqli_query($connectionString,"SELECT * FROM `users_table` WHERE `users_table_id` = '$selected_a_id' ")or die(mysqli_error($connectionString));   
   if(mysqli_num_rows($validate_user) > 0){
    $get_details = mysqli_fetch_array($validate_user);
    $users_id = $get_details['users_table_id'];
    $db_harshed_password = $get_details['users_password'];

    if(password_verify($get_users_password,$db_harshed_password)){
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
}
}
// }elseif($_COOKIE['c_r']==='p' && $_COOKIE['u_r']==='p'){
//     $selected_p_id = $_COOKIE['u_i'];
//     $get_image = mysqli_query($connectionString,"SELECT * FROM `pharmacists_table` WHERE `pharmacists_id` = '$selected_p_id' AND `pharmacists_password` = '$get_users_password'")or die(mysqli_error($connectionString));   
//     if(mysqli_num_rows($get_image) > 0){
//         echo "success";
//     }else{
//         echo "error";
//     }
// }
?>