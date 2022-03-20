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
                        <button class="btn btn-md btn-info  btn-dark waves-effect waves-light float-right add-expense">
                             <i class="fa fa-plus"></i> Add New Expense
                         </button>
                        </div>
                        <h4 class="page-title" style="letter-spacing: 2px;">Add Expense</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                     <div class="card-box" style="display: none;">
                        <div class="row">

                            <div class="col-lg-12 text-right">
                                <div class="text-lg-right mt-3 mt-lg-0">
                                    <button
                                        class="btn btn-md btn-info  btn-dark waves-effect waves-light float-right add-expense">
                                        <i class="fa fa-plus"></i> Add New Expense
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
                                    <th>Expense ID</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Account</th>
                                    <th>Created By</th>
                                    <th>Date</th>
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
                <div class="modal-header bg-info" style="padding: 10px">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Expenditure</h4>
                </div>
                <div class="modal-body p-4">
                    <form method="post" id="add-expense">

                        <?php 
                            if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){ ?>
                        <input type="hidden" name="role" value="<?php echo $_COOKIE['u_i'];  ?>">
                        <?php  }else{ ?>
                        <input type="hidden" name="role" value="0">
                        <?php   } ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label text-dark">Expense ID</label>
                                    <input required="required" type="number" min-length="0" class="form-control"
                                        name="expense_id" id="expense_id" placeholder="Expense ID" readonly
                                        value="<?php  echo mt_rand(100000,999999);  ?>">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-2" class="control-label text-dark">Category</label>
                                    <select class="selectpicker" data-style="btn-outline-success" required
                                        name="expense_category" id="expense_category">
                                        <option data-display="Select">Nothing</option>
                                        <?php $get_expense_category = mysqli_query($connectionString,"
                                                                    SELECT * FROM `expense_category`")or die(mysqli_error($connectionString));
                                                                    
                                                                    while ($each_category = mysqli_fetch_array($get_expense_category)) {
                                                                        $category_id = $each_category['expense_category_id'];
                                                                        $category_name = $each_category['expense_name'];
                                                                    ?>
                                        <option value="<?php echo $category_id;  ?>"><?php echo $category_name;   ?>
                                        </option>

                                        <?php } ?>

                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label text-dark">Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><?php echo $currency   ?></div>
                                        </div>
                                        <input value="" required type="text" class="form-control" name="expenseAmount"
                                            id="expenseAmount" placeholder="Amount Involved" onkeypress="return isNumberKey(event)" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label text-dark">Account</label>
                                    <select class="selectpicker" data-style="btn-outline-success" name="expense_account"
                                        id="expense_account" required>
                                        <option data-display="Select">Nothing</option>
                                        <?php $get_expense_account = mysqli_query($connectionString,"
                                                                    SELECT * FROM `expense_account`")or die(mysqli_error($connectionString));
                                                                    
                                                                    while ($each_account = mysqli_fetch_array($get_expense_account)) {
                                                                        $account_id = $each_account['account_id'];
                                                                        $account_name = $each_account['account_expense_name'];
                                                                    ?>
                                        <option value="<?php echo $account_id;  ?>"><?php echo $account_name;   ?>
                                        </option>

                                        <?php } ?>
                                    </select>
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
        readExpenses();

        $('.add-expense').click(function(e) {
            e.preventDefault();
            $('#add-modal').modal('show');
        })

        $('#add-expense').submit(function(e) {
            e.preventDefault();
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/expenses/add-expense.php',
                type: 'POST',
                data: formdata,
                success: function(res) {
                    if (res === 'error') {
                        Swal.fire(
                            'Error!',
                            'Please select The Appropriate Account Or Category',
                            'error'
                        ).then(function() {
                            readExpenses()
                        });
                    } else {
                        Swal.fire(
                            'Success!',
                            'Expenditure Added Successfully',
                            'success'
                        ).then(function() {
                            readExpenses()
                        });
                    }

                    $('#add-modal').modal('hide');
                    $('#add-expense').trigger('reset');

                },
                error: function(res) {
                    console.log(res);
                }

            });


        });

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
                    'url': 'api_calls/expenses/fetch-expense.php'
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
                    'url': 'api_calls/expenses/fetch-expense.php'
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
        }
    }
    </script>