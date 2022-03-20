<?php

require_once '../../db/db.php';

$get_current_password = $_POST['txt_current_password']; 
$get_new_password = $_POST['new_password']; 
$get_confirm_password = $_POST['confirm_password'];  
$hashedPassword = password_hash($get_new_password,PASSWORD_DEFAULT);


if(isset($get_new_password) && isset($get_current_password) && isset($get_confirm_password)){
    if($get_new_password !== $get_confirm_password){
        echo "error";
    }else{
        if($_COOKIE['c_r'] === 'a' && $_COOKIE['u_r']==='a'){
            $selected_a_id = $_COOKIE['u_i'];
            $running_check = mysqli_query($connectionString,"SELECT * FROM `users_table` WHERE `users_table_id`= '$selected_a_id' LIMIT 1")or die(mysqli_error($connectionString));
            if(mysqli_num_rows($running_check) > 0){
                $get_users_id = mysqli_fetch_array($running_check);
                $get_role = $get_users_id['users_table_role'];
                $get_pass = $get_users_id['users_password'];

                if($get_role !== "1"){
                    echo "unauthorized";
                }else{
                    if(password_verify($get_current_password,$get_users_id['users_password']) ){
                        $run_update_query = mysqli_query($connectionString,"UPDATE `users_table` SET 
                        `users_password` = '$hashedPassword' WHERE 
                        `users_table`.`users_table_id` = '$selected_a_id'")or die(mysqli_error($connectionString));
                        if($run_update_query){
                            echo "success";
                        }
                    }else{
                        echo "pass_incorrect";
                    }
                }
            }else{
                echo "unauthorized";
            }
            }elseif($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
                $selected_p_id = $_COOKIE['u_i'];
                $running_check = mysqli_query($connectionString,"SELECT * FROM `pharmacists_table` WHERE `pharmacists_id`= '$selected_p_id' LIMIT 1")or die(mysqli_error($connectionString));
                if(mysqli_num_rows($running_check) > 0){
                    $get_users_id = mysqli_fetch_array($running_check);
                    $get_role = $get_users_id['pharmacists_role'];
                    $get_pass = $get_users_id['pharmacists_password'];
    
                    if($get_role !== "2"){
                        echo "unauthorized";
                    }else{
                        if(password_verify($get_current_password,$get_users_id['pharmacists_password']) ){
                            $run_update_query = mysqli_query($connectionString,"UPDATE `pharmacists_table` 
                            SET 
                            `pharmacists_password` = '$hashedPassword' WHERE 
                            `pharmacists_table`.`pharmacists_id` = '$selected_p_id'")or die(mysqli_error($connectionString));
                            if($run_update_query){                   
                                echo "success";
                            }
                        }else{
                            echo "pass_incorrect";
                        }
                    }
                }else{
                    echo "unauthorized";
                }
            }

    }
}

?>