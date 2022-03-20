<?php  require_once 'db/db.php'; ?>


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
                            <a href="add_purchase_ingredient.php" class="btn btn-md btn-info btn-dark waves-effect waves-light float-right">
                                <i class="fa fa-plus"></i> Add New Purchase
                            </a>
                        </div>
                              <h4 class="page-title" style="letter-spacing: 2px;">Ingredients Purchases</h4>
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
                                    <a href="add_purchase_ingredient.php"
                                        class="btn btn-md btn-info btn-dark waves-effect waves-light float-right">
                                        <i class="fa fa-plus"></i> Add New Purchase
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
                                    <th>Ingredient</th>
                                    <th>Quantity(Box)</th>
                                    <th>Quantity(Pcs)</th>
                                    <th>Cost Price(Box)</th>
                                    <th>Cost Price(Pcs)</th>
                                    <th>Expiry Date</th>
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
        readPurchases();


        $(document).on('click', '.delete-purchase-button', function(e) {
            e.preventDefault();
            var purchaseId = $(this).attr('id');
            SwalDelete(purchaseId);
            e.preventDefault();
        });

    });

    function readPurchases() {

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
                    'url': 'api_calls/purchases_api/fetch-purchases-ingredients.php'
                },
                'columns': [{
                        data: 'ingredient_name'
                    },
                    {
                        data: 'quantity_box'
                    },
                    {
                        data: 'quantity_pcs'
                    },
                    {
                        data: 'cost_price_box'
                    },
                    {
                        data: 'cost_price_pcs'
                    },
                    {
                        data: 'expiry_date'
                    },
                    {
                        data: 'action'
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
                    'url': 'api_calls/purchases_api/fetch-purchases-ingredients.php'
                },
                'columns': [{
                        data: 'ingredient_name'
                    },
                    {
                        data: 'quantity_box'
                    },
                    {
                        data: 'quantity_pcs'
                    },
                    {
                        data: 'cost_price_box'
                    },
                    {
                        data: 'cost_price_pcs'
                    },
                    {
                        data: 'expiry_date'
                    },
                    {
                        data: 'action'
                    }
                ]
            });
        }

    }

    function SwalDelete(purchaseId) {

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
                            url: 'api_calls/purchases_api/delete-purchase-ingredient.php',
                            type: 'POST',
                            data: 'delete=' + purchaseId,
                            dataType: 'json'
                        })
                        .done(function(response) {
                            swal.fire('Deleted!', response.message, response.status);
                            readPurchases();
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