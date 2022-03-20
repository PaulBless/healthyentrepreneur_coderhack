<?php  require_once 'db/db.php'; ?>

<?php

$get_currency = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 7") or die(mysqli_error($connectionString));
$get_currency_item = mysqli_fetch_array($get_currency);
$currency = $get_currency_item['settings_ans'];


if($_COOKIE['c_r']==='a' && $_COOKIE['u_r']==='a'){
    $selected_a_id = $_COOKIE['u_i'];
    $get_image = mysqli_query($connectionString,"SELECT * FROM `users_table` WHERE `users_table_id` = '$selected_a_id'")or die(mysqli_error($connectionString));   
    if(mysqli_num_rows($get_image) > 0){
        $get_details = mysqli_fetch_array($get_image);
        $picture = $get_details['users_profile'];
    }
}elseif($_COOKIE['c_r']==='p' && $_COOKIE['u_r']==='p'){
    $selected_p_id = $_COOKIE['u_i'];
    $get_image = mysqli_query($connectionString,"SELECT * FROM `pharmacists_table` WHERE `pharmacists_id` = '$selected_p_id'")or die(mysqli_error($connectionString));   
    if(mysqli_num_rows($get_image) > 0){
        $get_details = mysqli_fetch_array($get_image);
        $picture = $get_details['profile'];
    }
}
?>

<?php 

if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
    require_once 'header/client-header.php'; 
    require_once 'sidebar/client-sidebar.php';   
}else{
    require_once 'header/admin-header.php'; 
    require_once 'sidebar/admin-sidebar.php';   
}

?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">

                        </div>
                              <h4 class="page-title" style="letter-spacing: 2px;">My Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8 col-sm-12">

                     <div class="card-box" style="border-top: 3px solid #14324d;">
                        <h4 class="text-secondary text-center font-weight-bold" style="letter-spacing: 0.5px;"> Change Profile Picture </h4>
                        <div class="card-body">
                            <form id="profile-form">
                                <div class="row col-12">
                                    <div class="form-group mb-12 col-md-12 text-left d-flex align-items-center justify-content-center">
                                        <label class="newbtn" style="cursor:pointer;">
                                            <img id="setUrl" src="assets/images/<?php echo $picture; ?>" alt=""
                                                class="img-circle" style="width:120px; height:100px; border: 2px solid #1c8238; border-radius: 50%;" id="user-img" title="Click To Upload Picture">
                                            <input id="pic" type="file" style="display: none" name="profileImage">
                                        </label>
                                    </div>

                                    <div class="form-group mb-12 col-md-12">
                                        <label for="txt_from">Current Password:</label>
                                        <input type="password" id="txt_current_password" name="txt_current_password"
                                            class="form-control" placeholder="Enter Current Password">
                                    </div>


                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-md btn-info" name="btn-update-profile">Update Profile Picture</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>




            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8 col-sm-12">
                     <div class="card-box" style="border-top: 3px solid #14324d;">
                        <h4 class="text-secondary text-center font-weight-bold" style="letter-spacing: 0.5px;"> Reset Your Password</h4>

                        <div class="card-body">
                            <form id="password-form">
                                <div class="row col-12">


                                    <div class="form-group mb-12 col-md-12">
                                        <label for="txt_from">Current Password:</label>
                                        <input type="password" id="txt_current_password" name="txt_current_password"
                                            class="form-control" placeholder="enter current password">
                                    </div>

                                    <div class="form-group mb-12 col-md-12">
                                        <label for="txt_to">New Password:</label>
                                        <input type="password" id="new_password" name="new_password"
                                            class="form-control" placeholder="enter new password">
                                    </div>
                                    <div class="form-group mb-12 col-md-12">
                                        <label for="txt_to">Confirm New Password:</label>
                                        <input type="password" id="confirm_password" name="confirm_password"
                                            class="form-control" placeholder="confirm new password">
                                    </div>


                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-info" name="btn-reset-password">Reset
                                        Password</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>

        </div> <!-- container -->
    </div> <!-- content -->




    <?php require_once 'modals/user_record_modal.php';   ?>
    <?php require_once 'footer/admin-footer.php';   ?>


    <script src="assets/js/jquery-upload.js"></script>
    <script type='text/javascript'>
    $(document).ready(function() {
        var profileOptions = {
            url: 'api_calls/profile_api/update_profile.php', // target element(s) to be updated with server response 
            success: showResponse, // post-submit callback 
            type: 'POST',
        };

        var passwordOptions = {
            url: 'api_calls/profile_api/update_password.php', // target element(s) to be updated with server response 
            success: showResponse, // post-submit callback 
            type: 'POST',
        };

        $('#profile-form').submit(function(e) {
            e.preventDefault();
            $(this).ajaxSubmit(profileOptions);
        });

        $('#password-form').submit(function(e) {
            e.preventDefault();
            $(this).ajaxSubmit(passwordOptions);
        });






        $('.newbtn').bind("click", function() {
            $('#pic').click();
        });

        $("#pic").on('change', function() {
            readURL(this);
        })
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#setUrl").attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }



    function showResponse(res, statusText, xhr, $form) {

        if (res === 'error') {
            Swal.fire(
                'Error!',
                'Passwords Do Not Match',
                'error'
            )
        } else if (res === 'unauthorized') {
            Swal.fire(
                'Error!',
                'You are unauthorized to make this change',
                'error'
            )
        } else if (res === 'pass_incorrect') {
            Swal.fire(
                'Error!',
                'Current Password Incorrect',
                'error'
            )
        } else if (res === 'success') {
            Swal.fire(
                'Success!',
                'Profile Updated Successfully',
                'success'
            ).then(function() {
                window.location.href = 'profile.php'
            });
        }
    }
    </script>