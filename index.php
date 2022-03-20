 
<?php

 

?>


<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>Healthy Entrepreneur | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="a powerful customer loyalty program for healthy entrepreneurs " name="description" />
        <meta content="customer loyalty program" name="Coderhack" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/Healthy_Entrepreneurs.png">

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

    <!-- <body class="authentication-bg authentication-bg-pattern"> -->
    <body class="authentication-bg">

        <div class="account-pages mt-4 mb-4" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card" style="border-radius:50px;">

                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto ">
                                    <!-- <a href="index.php"> -->
                                        <span><img src="assets/images/Healthy_Entrepreneurs.png" alt="HealthyEntrepreneurs" height="100" style="margin-bottom:15px;"></span>
                                    <!-- </a> -->
                                    <!-- <p class="text-dark text-uppercase font-weight-bold mb-2 mt-1">Healthy Entrepreneurs <br> Customer Loyalty App</p> -->
                                </div>

                                <h5 class="auth-title text-danger">Customer Loyalty App | Please Sign In</h5>

                                <form id="login_form" method="POST">
                                    <div class="col mb-2 text-center d-none">                                 
                                        <span class="text-secondary font-weight-lighter">Login with your username and password to continue!</span>
                                    </div>

                                    <div class="form-group mb-0">
                                        <!-- <label for="username">Username</label> -->
                                        <input class="form-control rounded-pill" type="text" id="username" name="username" required="" placeholder="Enter your username" autofocus>
                                    </div>

                                    <div class="form-group mt-2">
                                        <!-- <label for="password">Password</label> -->
                                        <input class="form-control rounded-pill" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                    </div>

                                    
                                    <div class="form-group mt-3 text-center">
                                        <button class="btn btn-danger rounded-pill btn-block ladda-button" type="submit" style="background-color: #218231;border-color: #218231" data-style="slide-up" id="submit_button"> <i class="mdi mdi-login"></i> Log In </button>
                                    </div>

                                </form>

                                

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            <?php echo date('Y') ?> &copy; Developed by <a href="javascript:void(0)" class="text-muted">Coderhack</a> 
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
            $(document).ready(function(e) {

                function preventBack(){window.history.forward();}

                setTimeout("preventBack()", 0);
                window.onunload=function(){null};

                var path = "index.php";
                history.pushState(null, null, path + window.location.search), window.addEventListener("popstate",
                function(t) {
                    history.pushState(null, null, path + window.location.search)
                });
                
                $("#login_form").submit(function(e) {
                    e.preventDefault();
                    var formdata = $(this).serialize();

                    var l = Ladda.create(document.querySelector('#submit_button'));
                    l.start();
                    $.ajax({
                        url: 'api_calls/login_api/login-api.php',
                        type: 'POST',
                        data: formdata,
                        success: function(res) {
                            console.log(res);
                            if (res === "success") {
                                l.stop();
                                $.toast({
                                    heading: "Success",
                                    text: "Login Successfully",
                                    position: "top-right",
                                    loaderBg: "#5ba035",
                                    icon: "success",
                                    stack: "1"
                                });
                                window.location.href = "main.php";
                            } else if (res === "locked") {
                                l.stop();
                                $('#username').val('');
                                $('#password').val('');
                                $.toast({
                                    heading: "Account Locked",
                                    text: "Your Account Has Been Locked,Contact Admin",
                                    position: "top-right",
                                    loaderBg: "#bf441d",
                                    icon: "error",
                                    stack: "1"
                                });
                            } else if (res === 'error') {
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
                        error: function(res) {

                        }

                    });

                });


            });
        </script>

    </body>
</html>

