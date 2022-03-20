<?php  require_once 'db/db.php'; 

if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
    $selected_a_id = $_COOKIE['u_i'];
    $running_check = mysqli_query($connectionString,"SELECT * FROM `users_table` WHERE `users_table_role`= '$selected_a_id' LIMIT 1")or die(mysqli_error($connectionString));
    if(mysqli_num_rows($running_check) > 0){
    }else{
        echo "<script>window.location.href='index.php'</script>";
    }
	}

?>

<?php  require_once 'header/admin-header.php';  ?>

<?php  require_once 'sidebar/admin-sidebar.php';  ?>

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
                              <h4 class="page-title" style="letter-spacing: 2px;">Staff</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                     <div class="card-box" style="border-top: 3px solid #14324d;">
                        <button type="button" class="btn btn-md btn-dark btn-info waves-effect waves-light float-right" id="add-new-user">
                            <i class="fa fa-plus"></i> Add New User
                        </button>  
                        
                        <h4 class="header-title mb-4 text-dark" style="letter-spacing: 1px;">Manage Users</h4>

                        <table class="table table-hover  m-0 table-centered dt-responsive nowrap w-100"
                            id="tickets-table">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Contact</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Last Login</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody id="fetch-users">

                            </tbody>
                        </table>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->


    <?php require_once 'modals/user_record_modal.php';   ?>
    <?php require_once 'footer/admin-footer.php';   ?>

    <script type='text/javascript'>
    $(document).ready(function() {
        readProducts(); /* it will load products when document loads */
        $('select').niceSelect();

        $('#add-new-user').click(function(e) {
            $('#add-modal').modal('show');
        });  
        
      

        $('#add_new_user').submit(function(e) {
            e.preventDefault();
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/users_api/add-users.php',
                type: 'POST',
                data: formdata,
                success: function(res) {
                    $.toast({
                        heading: "Success",
                        text: "User Added Successfully",
                        position: "top-right",
                        loaderBg: "#5ba035",
                        icon: "success",
                        stack: "4"
                    });
                    readProducts();
                    $('#add-modal').modal('hide');
                    $('#users_id').val('');
                    $('#fname').val('');
                    $('#lname').val('');
                    $('#username').val('');
                    $('#password').val('');
                    $('#contact').val('');


                },
                error: function(res) {
                    console.log(res);
                }

            });


        });
        $('.submit-btn').on('click', function(){
            var user_action = $(this).attr('id');
                    $('#action_status').val(user_action);
        })

        $('#edit_new_user').submit(function(e) {
            e.preventDefault();
           
            ;
            
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/users_api/edit-users.php',
                type: 'POST',
                data: formdata,
                success: function(res) {
                    $.toast({
                        heading: "Success",
                        text: "User Editted Successfully",
                        position: "top-right",
                        loaderBg: "#5ba035",
                        icon: "success",
                        stack: "4"
                    });
                    readProducts();
                    $('#edit-modal').modal('hide');
                    $('#users_id').val('');
                    $('#fname').val('');
                    $('#lname').val('');
                    $('#username').val('');
                    $('#password').val('');
                    $('#contact').val('');


                },
                error: function(res) {
                    console.log(res);
                }

            });

        })



        $(document).on('click', '.edit-user-button', function(e) {
            var productId = $(this).data('id');
            $.ajax({
                url: 'api_calls/users_api/user-details.php',
                type: 'POST',
                data: 'productId=' + productId,
                dataType: 'json',
                success: function(res) {
                    $('#users_id').val(res.users_id);
                    $('#fname').val(res.first_name);
                    $('#lname').val(res.last_name);
                    $('#username').val(res.username);
                    $('#contact').val(res.contact);
                    // $("#user_role").prop("selectedIndex", res.priority);
                    $('#user_role option[value=' + res.priority + ']').attr('selected',
                        'selected');
                    $('#user_role').niceSelect('update');
                    $('#user_status option[value=' + res.status + ']').attr('selected',
                        'selected');
                    $('#user_status').niceSelect('update');

                    $('#edit-modal').modal('show');
                },
                error: function(res) {
                    console.log(res);
                }
            });
        });

        $(document).on('click', '.delete-user-button', function(e) {
            e.preventDefault();
            var productId = $(this).data('id');
            SwalDelete(productId);
            e.preventDefault();
        });

    });

    function readProducts() {
        $('#fetch-users').load('api_calls/users_api/fetch-users.php');
    }

    function SwalDelete(productId) {

        swal.fire({
            title: 'Are you sure?',
            text: "It will be deleted permanently!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            url: 'api_calls/users_api/delete-users.php',
                            type: 'POST',
                            data: 'delete=' + productId,
                            dataType: 'json'
                        })
                        .done(function(response) {
                            swal.fire('Deleted!', response.message, response.status);
                            readProducts();
                        })
                        .fail(function() {
                            swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                        });
                });
            },
            allowOutsideClick: false
        });

    }
    </script>