<?php

// require_once 'db/db.php';


//Check if user is authenticated
// if(isset($_COOKIE['h_i'])){
// $harsed_id = $_COOKIE['h_i'];

// ! Strip first 4 characters
// $stripped = substr($harsed_id,2);
// $get_selected_role = $stripped[0];

// if($get_selected_role === 'a'){
    // role is admin

    // //! get user id
    // $get_id = substr($stripped,10);

    // $check_admin_database = mysqli_query($connectionString,"SELECT * FROM `users_table` WHERE `users_table_id` = '$get_id' LIMIT 1") or die(mysqli_error($connectionString));

    // if(mysqli_num_rows($check_admin_database) <= 0){
    //     echo "<script>window.location.href='index.php'</script>";
    // }

    // }else if($get_selected_role === 'o'){
    //     // role is pharmacist
    //     echo "<script>window.location.href='index.php'</script>";
    // }else{
    //     echo "<script>window.location.href='index.php'</script>";
    // }

    // }else{
    //     echo "<script>window.location.href='index.php'</script>";
    // }



    // $expire_alert_medicine_name = [];
    // $expire_alert_remaining = [];

    // $expired_medicine_name = [];
    // $expired_medicine_expiry = [];

    // $stock_alert_remain = [];
    // $stock_alert_name = [];

    // $expired_counter = 0;
    // $expire_alert_counter = 0;
    // $stock_alert_counter = 0;


    // $get_minimum_expire_alert = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 8") or die(mysqli_error($connectionString));
    // $get_minimum_item = mysqli_fetch_array($get_minimum_expire_alert);
    // $minimum = $get_minimum_item['settings_ans'];                                     
    // $getProductInfo = mysqli_query($connectionString,"SELECT * FROM tbl_products JOIN categories_tbl on tbl_products.product_category = categories_tbl.category_id ORDER BY tbl_products.tbl_products_id ASC")or die(mysqli_error($connectionString));
    // while($product_info = mysqli_fetch_array($getProductInfo)){  

    // $get_expiry= $product_info['expiry_date'];
    // $get_product_name = $product_info['product_name'];
                                                
    // $get_current_date = date_create(date("d-M-Y"));
    // $check_expire = date_create(date('d-M-Y', strtotime($get_expiry))); 
    // $interval = date_diff( $get_current_date, $check_expire);

    // $remaining_days = intval($interval->format('%R%a'));
    // $months_remaining = $interval->format('%m months remaining');
                                            
?>
<?php
    // if ($months_remaining <= $minimum && $remaining_days < 0) {
    // $expired_counter++;
    // array_push($expired_medicine_expiry,$get_expiry);
    // array_push($expired_medicine_name,$get_product_name);
    // }else if($months_remaining <= $minimum && $remaining_days > 0){
    // $expire_alert_counter++;
    // array_push($expire_alert_remaining,$remaining_days);
    // array_push($expire_alert_medicine_name,$get_product_name);
    // }else{}};


    // $get_minimum_stock_alert = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 6") or die(mysqli_error($connectionString));
    // $get_minimum_item = mysqli_fetch_array($get_minimum_stock_alert);
    // $minimum = $get_minimum_item['settings_ans'];

    // $getProductInfo = mysqli_query($connectionString,"SELECT * FROM tbl_products JOIN categories_tbl on tbl_products.product_category = categories_tbl.category_id WHERE tbl_products.tbl_products_id <= '$minimum' ORDER BY tbl_products.tbl_products_id ASC")or die(mysqli_error($connectionString));
    // while($product_info = mysqli_fetch_array($getProductInfo)){  
    //     $get_product_name = $product_info['product_name'];
    //     $get_product_quantity = $product_info['quantity_available_box'];

    // $stock_alert_counter++;
    // array_push($stock_alert_name,$get_product_name);
    // array_push($stock_alert_remain,$get_product_quantity);
        
    // }


    // if($_COOKIE['c_r']==='a' && $_COOKIE['u_r']==='a'){
    //     $selected_a_id = $_COOKIE['u_i'];
    //     $get_image = mysqli_query($connectionString,"SELECT * FROM `users_table` WHERE `users_table_id` = '$selected_a_id'")or die(mysqli_error($connectionString));   
    //     if(mysqli_num_rows($get_image) > 0){
    //         $get_details = mysqli_fetch_array($get_image);
    //         $picture = $get_details['users_profile'];
    //     }
    // }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Healthy Entrepreneurs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A powerful customer loyalty program and data " name="description" />
    <meta content="Healthy_Entrepreneurs" name="Jecmas" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/Healthy_Entrepreneurs.png">

    <!-- third party css -->
    <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/jquery-nice-select/nice-select.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Jquery Toast css -->
    <link href="assets/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Select -->
    <link href="assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Datepicker -->
    <link href="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/typeahead.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="assets/css/pace.min.css">
     <script src="assets/js/pace.min.js"></script>


     <script>
        paceOptions = {
        // Configuration goes here. Example:
        elements: false,
        restartOnPushState: false,
        restartOnRequestAfter: false
        }
     </script>

    <style>
        /* ajax loading preloader */
        .preloader{
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 99999;
        overflow: hidden;
        background: #ffffff;
        }

        .preloader:before {
        content: "";
        position: fixed;
        top: calc(50% - 30px);
        left: calc(50% - 30px);
        border: 6px solid #a41616;
        border-top-color: #464dee;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        -webkit-animation: animate-preloader 1s linear infinite;
        animation: animate-preloader 1s linear infinite;
        } 

        @-webkit-keyframes animate-preloader {
            0% {
            transform: rotate(0deg);
            }
            100% {
            transform: rotate(360deg);
            }
        }

        @keyframes animate-preloader {
            0% {
            transform: rotate(0deg);
            }
            100% {
            transform: rotate(360deg);
            }
        }
    </style>
</head>

<body onload="ajaxloader()">

    <!-- Begin page -->
    <div id="wrapper">
        <div class="preloader"></div> <!-- preloader element -->

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
               

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/default.png ?>" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            <?php  //echo $_COOKIE['u_n']; ?> <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0 text-white">
                                Welcome !
                            </h5>
                        </div>

                        <!-- item-->
                        <a href="profile.php" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="settings.php" class="dropdown-item notify-item">
                            <i class="fe-settings"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="lock.php" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="logout.php" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="dashboard.php" class="logo text-center">
                    <span class="logo-lg">
                        <img src="assets/images/Healthy_Entrepreneurs.png" alt="" height="60">
                        <!-- <span class="logo-lg-text-light">Upvex</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">X</span> -->
                        <img src="assets/images/logo-sm.png" alt="" height="28">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </li>

            </ul>
        </div>
        <!-- end Topbar -->