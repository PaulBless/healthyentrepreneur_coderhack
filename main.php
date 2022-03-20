<?php

require_once 'db/db.php';

if(isset($_COOKIE['u_r']) && isset($_COOKIE['u_i'])){
    if($_COOKIE['u_r'] === 'p'){
        $selected_p_id = $_COOKIE['u_i'];
        $running_check = mysqli_query($connectionString,"SELECT * FROM `pharmacists_table` WHERE `pharmacists_id` = '$selected_p_id' LIMIT 1")or die(mysqli_error($connectionString));
        $get_details = mysqli_fetch_array($running_check);

        if($get_details['pharmacists_role'] === '2'){
            setcookie("c_r", 'p', time() + (86400 * 30), '/');
            echo "<script>window.location.href='sales-point-original.php'</script>"; // old
            // echo "<script>window.location.href='sales-order.php'</script>"; // new file < updated >
          
        }else{
            echo "<script>window.location.href='index.php'</script>";
        
        }
    
    }else{
        $selected_a_id = $_COOKIE['u_i'];
        $running_check = mysqli_query($connectionString,"SELECT * FROM `users_table` WHERE `users_table_id`= '$selected_a_id' LIMIT 1")or die(mysqli_error($connectionString));
        $get_details = mysqli_fetch_array($running_check);

        if($get_details['users_table_role'] === '1'){
            setcookie("c_r", 'a', time() + (86400 * 30), '/');
            echo "<script>window.location.href='dashboard.php'</script>";
        
        }else{
            echo "<script>window.location.href='index.php'</script>";
          
        }
    }
    
}else{
    echo "<script>window.location.href='index.php'</script>";
}

?>