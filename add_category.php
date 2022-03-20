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
                        <h4 class="page-title" style="letter-spacing: 2px;">Categories</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                     <div class="card-box" style="border: 0.1px solid #98a6ad;">
                        <div class="row">

                            <div class="col-lg-6">
                                <form class="form-inline" id="add-new-category" method="post">
                                    <div class="form-group">
                                        <label for="categoryName" class="sr-only">Category Name</label>
                                        <input type="text" autocomplete="off" name="setCategoryName" required class="form-control mr-3"
                                            id="setCategoryName" onkeypress="" placeholder="Enter Category Name" autofocus>
                                    </div>
                                     <button type="submit"
                                        class="btn btn-md btn-dark btn-info waves-effect waves-light ml-0">
                                        <i class="fa fa-plus"></i> Add New Category
                                    </button>
                            </div>

                            <!-- <div class="col-lg-6">
                                <div class="text-lg-right mt-3 mt-lg-0">
                                    <button type="submit"
                                        class="btn btn-md btn-dark btn-info waves-effect waves-light ml-3">
                                        <i class="fa fa-plus"></i> Add New Category
                                    </button>

                                </div>
                            </div> -->
                            <!-- end col-->
                            </form>
                        </div> <!-- end row -->
                    </div> <!-- end card-box -->
                </div><!-- end col-->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                     <div class="card-box" style="border-top: 3px solid #14324d;">
                    
                     <h4 class="header-title mb-4 text-dark" style="letter-spacing: 1px;">Category List</h4>

                        <table class="table table-hover  m-0 table-centered dt-responsive nowrap w-100"
                            id="tickets-table">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th> ID</th>
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

    <!-- Edit Modal -->
    <div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info" style="padding: 10px;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body p-4">
                    <form method="post" id="edit_new_category">
                        <input type="hidden" name="category_id" id="category_id">

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


    <!-- Add Modal -->

    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info" style="padding: 10px">
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



    <?php require_once 'footer/admin-footer.php';   ?>

    <script type='text/javascript'>
    $(document).ready(function() {
        
        //fetch categories list
        readCategories();

        $('#add-new-category').submit(function(e) {
            e.preventDefault();
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/category_api/add-category.php',
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
                'url': 'api_calls/category_api/fetch-category-list.php'
            },
            'columns': [{
                    data: 'category_id'
                },
                {
                    data: 'category_name'
                },
                {
                    data: 'category_timestamp'
                }

            ]
        });

    }
    </script>