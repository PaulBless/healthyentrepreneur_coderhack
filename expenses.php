<?php  require_once 'db/db.php'; 

$get_currency = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 7") or die(mysqli_error($connectionString));
$get_currency_item = mysqli_fetch_array($get_currency);
$currency = $get_currency_item['settings_ans'];

?>


<?php 

    if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
        require_once 'header/client-header.php'; 
        require_once 'sidebar/client-sidebar.php';   
        echo "<input type='hidden' id='check' value='0'>";
    }else{
        require_once 'header/admin-header.php'; 
        require_once 'sidebar/admin-sidebar.php';   
        echo "<input type='hidden' id='check' value='1'>";
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
                        <a href="add_expense.php"
                                        class="btn btn-md btn-info btn-dark waves-effect waves-light float-right">
                                        <i class="fa fa-plus"></i> Add New Expense
                                    </a>
                        </div>
                        <h4 class="page-title" style="letter-spacing: 2px;">Expenses List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php 

                if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
                }else{  ?>
                            <div class="row">
                <div class="col-12">
                     <div class="card-box" style="display: none;">
                        <div class="row">

                            <div class="col-lg-12 text-right">
                                <div class="text-lg-right mt-3 mt-lg-0">
                                    <a href="add_expense.php"
                                        class="btn btn-md btn-info btn-dark waves-effect waves-light float-right">
                                        <i class="fa fa-plus"></i> Add New Expense
                                    </a>

                                </div>
                            </div><!-- end col-->
                            </form>
                        </div> <!-- end row -->
                    </div> <!-- end card-box -->
                </div><!-- end col-->
            </div>
            <!-- end row -->
            <?php } ?>


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
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Account</th>
                                    <th>Created By</th>
                                    <th>Date</th>
                                    <?php 

                                        if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
                                        }else{  ?>
                                    <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>


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
        readExpenses();

        $(document).on('click', '.delete-expenditure', function(e) {
            e.preventDefault();
            var expenditureId = $(this).data('id');
            SwalDelete(expenditureId);
            e.preventDefault();
        })



    });

    function readExpenses() {

        const check = $('#check').val();
        if (check == 0) {
            $('#tickets-table').dataTable({
                paging: true,
                searching: true,
                "bDestroy": true,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url': 'api_calls/expenses/fetch-expense-delete.php'
                },
                'columns': [{
                        data: 'expense_auto_id'
                    },
                    {
                        data: 'expense_name'
                    },
                    {
                        data: 'expense_amount'
                    },
                    {
                        data: 'account_expense_name'
                    },
                    {
                        data: 'expense_by'
                    },
                    {
                        data: 'expense_timestamp'
                    }
                ]
            });
        } else {
            $('#tickets-table').dataTable({
                paging: true,
                searching: true,
                "bDestroy": true,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url': 'api_calls/expenses/fetch-expense-delete.php'
                },
                'columns': [{
                        data: 'expense_auto_id'
                    },
                    {
                        data: 'expense_name'
                    },
                    {
                        data: 'expense_amount'
                    },
                    {
                        data: 'account_expense_name'
                    },
                    {
                        data: 'expense_by'
                    },
                    {
                        data: 'expense_timestamp'
                    },
                    {
                        data: 'action'
                    }
                ]
            });
        }
    }

    function SwalDelete(expenditureId) {

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
                            url: 'api_calls/expenses/delete-main-expenditure.php',
                            type: 'POST',
                            data: 'delete=' + expenditureId,
                            dataType: 'json'
                        })
                        .done(function(response) {
                            swal.fire('Deleted!', response.message, response.status);
                            readExpenses();
                        })
                        .fail(function() {
                            swal.fire('Oops...', 'Something went wrong !', 'error');
                        });
                });
            },
            allowOutsideClick: false
        });

    }
    </script>