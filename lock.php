<?php

require_once 'db/db.php';

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






<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Pharmasyst | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A powerful pharmacy management system for all drug stores" name="description" />
        <meta content="Pharmacy Management System" name="Step Network" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/bubbles_logo.jpg">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/ladda.css" rel="stylesheet" type="text/css" />

         <!-- Jquery Toast css -->
         <link href="assets/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
         
           <script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
         
         <script>
              var path = "index.php";
        history.pushState(null, null, path + window.location.search), window.addEventListener("popstate",
            function(t) {
                history.pushState(null, null, path + window.location.search)
            });
         </script>
         
         <script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script> 

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center mb-4">
                                    <a href="index.php">
                                        <span><img src="assets/images/bubbles_logo.jpg" alt="" height="100"></span>
                                    </a>
                                </div>

                                <div class="text-center w-75 m-auto">
                                    <img src="assets/images/<?php echo $picture; ?>" width="88" alt="user-image" class="rounded-circle img-thumbnail">
                                    <h4 class="text-dark-50 text-center mt-3">Hi ! <?php echo $_COOKIE['u_n']; ?> </h4>
                                    <p class="text-muted mb-4">Enter your password to access the admin.</p>
                                </div>

                                <h5 class="auth-title">Lock Screen</h5>

                                <form id="lock_form" method="post">

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-info btn-block ladda-button" style="background-color: #218231;border-color: #218231" type="submit" data-style="slide-up" id="submit_button"> Log In </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Not you? return <a href="index.php"  class="text-muted ml-1"><b class="font-weight-semibold">Sign In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2019 &copy; Developed by <a href="" class="text-muted">STEP NETWORK</a> 
        </footer>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- ladda -->
        <script src="assets/js/ladda.js"></script>

         <!-- Tost-->
         <script src="assets/libs/jquery-toast/jquery.toast.min.js"></script>

        <script>

$(document).ready(function(e){
    
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};


$("#lock_form").submit(function(e){
e.preventDefault();
var formdata = $(this).serialize();

var l = Ladda.create( document.querySelector( '#submit_button' ) );
 l.start();
$.ajax({
url:'api_calls/lock_api/lock.php',
type: 'POST',
data: formdata,
success:function(res){
if(res==="success"){
    l.stop();
    $.toast({
    heading: "Success",
    text: "Login Successfully",
    position: "top-right",
    loaderBg: "#5ba035",
    icon: "success",
    stack: "1"
});
 window.location.href="main.php";
}else if(res==='error'){
    l.stop();
    $('#username').val('');
    $('#password').val('');
    $.toast({
    heading: "Error",
    text: "Username or Password Incorrect",
    position: "top-right",
    loaderBg: "#bf441d",
    icon: "error",
    stack: "1"
    });
}

},
error:function(res){

}

}); 

});

});

</script>
        
    </body>
</html>