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
                        <h4 class="page-title" style="letter-spacing: 2px;">Add Expense : <span class="text-secondary">Category</span> </h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                     <div class="card-box" style="border: 0.2px solid #98a6ae;">
                        <div class="row">

                            <div class="col-lg-6">
                                <form class="form-inline" id="add-expense-category" method="post">
                                    <div class="form-group">
                                        <label for="categoryName" class="sr-only">Category Name</label>
                                        <input type="text" autocomplete="off" name="setCategoryName" required class="form-control"
                                            id="setCategoryName" placeholder="Category Name">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="text-lg-right mt-3 mt-lg-0">
                                    <button type="submit"
                                        class="btn btn-md btn-dark btn-info waves-effect waves-light float-right">
                                         Add Expense Category
                                    </button>
                                </div>
                            </div><!-- end col-->
                            </form>
                        </div> <!-- end row -->
                    </div> <!-- end card-box -->
                </div><!-- end col-->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                     <div class="card-box" style="border-top: 3px solid #14324d;">

                        <table class="table table-hover  m-0 table-centered dt-responsive nowrap w-100"
                            id="tickets-table">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>Category Name</th>
                                    <th>Date Created</th>
                                </tr>
                            </thead>


                        </table>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Add Modal -->

    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info" style="padding: 10px;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Category</h4>
                </div>
                <div class="modal-body p-4">
                    <form method="post" id="add_new_category">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label text-dark">Category Name</label>
                                    <input type="text" autocomplete="off" class="form-control" name="category_name" id="category_name"
                                        placeholder="Category Name">
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->


    <?php require_once 'modals/user_record_modal.php';   ?>

    <?php require_once 'footer/admin-footer.php';   ?>

    <script type='text/javascript'>
    $(document).ready(function() {
        readCategories();

        $('#add-expense-category').submit(function(e) {
            e.preventDefault();
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/expenses/add-expense-category.php',
                type: 'POST',
                data: formdata,
                success: function(res) {
                    Swal.fire(
                        'Success!',
                        'Category Added Successfully',
                        'success'
                    ).then(function() {
                        readCategories()
                    });
                    $('#add-modal').modal('hide');
                    $('#setCategoryName').val('');

                },
                error: function(res) {
                    console.log(res);
                }

            });


        });

    });

    function readCategories() {
        $('#tickets-table').dataTable({
            paging: true,
            searching: true,
            "bDestroy": true,
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': 'api_calls/expenses/fetch-expense-category.php'
            },
            'columns': [{
                    data: 'expense_category_id'
                },
                {
                    data: 'expense_name'
                },
                {
                    data: 'expense_category_timestamp'
                }
            ]
        });
    }
    </script>