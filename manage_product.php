<?php  require_once 'db/db.php'; ?>

<?php  require_once 'header/admin-header.php';  ?>

<?php  require_once 'sidebar/admin-sidebar.php';  ?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<style>


</style>

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
                              <h4 class="page-title" style="letter-spacing: 2px;">Manage Products</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                     <div class="card-box" style="border-top: 3px solid #14324d;">

                        <h4 class="header-title mb-4 text-dark" style="letter-spacing: 1px">Products List</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-responsive m-0 table-centered nowrap w-100 table-hover"
                                id="tickets-table">
                                <thead class="bg-dark text-white">
                                    <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Cost Price(Box)</th>
                                    <th>Cost Price(Pcs)</th>
                                    <th>Selling Price(Box)</th>
                                    <th>Selling Price(Pcs)</th>
                                    <th>Expiry Date</th>
                                    <th>Aval.(Box)</th>
                                    <th>Aval.(Pcs)</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>


                            </table>
                        </div>
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
                <div class="modal-header bg-info" style="padding: 10px">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit Product Information</h4>
                </div>
                <div class="modal-body p-4">
                    <form method="post" id="edit_new_product">
                        <input type="hidden" name="product_id" id="product_id">
                        <div class="row">
                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-2" class="control-label text-dark">Name</label>
                                    <input type="text" autocomplete="off" class="form-control" name="product_name" id="product_name"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-5" class="">Product Category</label>
                                    <select id="product_category" name="product_category" class="wide">
                                        <?php $get_categories = mysqli_query($connectionString,"SELECT * FROM `categories_tbl`"); ?>
                                        <option data-display="Select">Nothing</option>
                                        <?php while ($each_category = mysqli_fetch_array($get_categories)) { ?>
                                        <option value="<?php  echo $each_category['category_id'] ?>">
                                            <?php echo $each_category['category_name']; ?></option>
                                        <?php }
                                                             
                                                                ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>

                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-4" class="control-label text-dark">Cost Price<span class="text-danger">(Box)</span></label>
                                    <input type="text" autocomplete="off" class="form-control" name="cost_price_box" id="cost_price_box"
                                        placeholder="">
                                </div>
                            </div>
                       
                       
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-3" class="control-label text-dark">Selling Price<span class="text-danger">(Box)</span></label>
                                    <input type="text" autocomplete="off" class="form-control" name="selling_price_box" id="selling_price_box"
                                        placeholder="">
                                </div>
                            </div>
                        </div>


                        <div class="row">

                         <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-4" class="control-label text-dark">Cost Price<span class="text-danger">(Pcs)</span></label>
                                    <input type="text" autocomplete="off" class="form-control" name="cost_price_pcs" id="cost_price_pcs"
                                        placeholder="">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-3" class="control-label text-dark">Selling Price<span class="text-danger">(Pcs)</span></label>
                                    <input type="text" autocomplete="off" class="form-control" name="selling_price_pcs" id="selling_price_pcs"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-3" class="control-label text-dark">Quantity Available(Box)</label>
                                    <input type="text" autocomplete="off" class="form-control" name="quantity_available_box"
                                        id="quantity_available_box" placeholder="">
                                </div>
                            </div>
                        
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-3" class="control-label text-dark">Quantity Available(Pcs)</label>
                                    <input type="text" autocomplete="off" class="form-control" name="quantity_available_pcs"
                                        id="quantity_available_pcs" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-3" class="control-label text-dark">Expiry</label>
                                    <input type="text" autocomplete="off" class="form-control datepicker" name="expiry" id="expiry"
                                        placeholder="" autocomplete="off">
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
        readProducts(); /* it will load products when document loads */
        $(".datepicker").datepicker({
            orientation: 'bottom',
            autoclose: true,
        });
        $('select').niceSelect();

        $('#edit_new_product').submit(function(e) {
            e.preventDefault();
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/products_api/edit-product.php',
                type: 'POST',
                data: formdata,
                success: function(res) {

                    if (res === "success") {
                        Swal.fire(
                            'Good job!',
                            'All Products Added Successfully',
                            'success'
                        ).then(function() {
                            readProducts()
                        });

                    } else {
                        Swal.fire(
                            'Ooops',
                            'Something Went Wrong',
                            'error'
                        ).then(function() {
                            readProducts()
                        });
                    }



                    $('#edit-modal').modal('hide');
                    $('#product_id').val('');
                    $('#product_name').val('');
                    $('#quantity_available_box').val('');
                    $('#quantity_available_pcs').val('');
                    $('#cost_price_box').val('');
                    $('#cost_price_pcs').val('');
                    $('#selling_price_box').val('');
                    $('#selling_price_pcs').val('');
                    $('#expiry').val('');
                    $('.datepicker').removeClass('hasDatepicker').datepicker({
                        orientation: 'bottom',
                        autoclose: true,
                    })

                },
                error: function(res) {
                    console.log(res);
                }

            });

        })



        $(document).on('click', '.edit-product-button', function(e) {
            var productId = $(this).data('id');
            $.ajax({
                url: 'api_calls/products_api/product-details.php',
                type: 'POST',
                data: 'productId=' + productId,
                dataType: 'json',
                success: function(res) {
                    $('#product_id').val(res.product_id);
                    $('#product_name').val(res.product_name);
                    $('#quantity_available_box').val(res.product_quantity_box);
                    $('#quantity_available_pcs').val(res.product_quantity_pcs);
                    $('#cost_price_box').val(res.cost_price_box);
                    $('#cost_price_pcs').val(res.cost_price_pcs);
                    $('#selling_price_box').val(res.selling_price_box);
                    $('#selling_price_pcs').val(res.selling_price_pcs);
                    $('#expiry').val(res.expiry_date);


                    $('#product_category option[value=' + res.product_category_id + ']')
                        .attr('selected',
                            'selected');

                    $('#product_category').niceSelect('update');

                    $('#edit-modal').modal('show');
                    $('.datepicker').removeClass('hasDatepicker').datepicker({
                        orientation: 'bottom',
                        autoclose: true,
                    })
                },
                error: function(res) {
                    console.log(res);
                }
            });
        });

        $(document).on('click', '.delete-product-button', function(e) {
            e.preventDefault();
            var productId = $(this).data('id');
            SwalDelete(productId);
            e.preventDefault();
        });

    });

    function readProducts() {
        $('#tickets-table').dataTable({
            paging: true,
            searching: true,
            "bDestroy": true,
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': 'api_calls/products_api/fetch-products.php'
            },
            'columns': [
                {
                    data: 'product_name'
                },
                {
                    data: 'product_category'
                },
                {
                    data: 'cost_price_box'
                },
                 {
                    data: 'cost_price_pcs'
                },
                {
                    data: 'selling_price_box'
                },
                {
                    data: 'selling_price_pcs'
                },
                {
                    data: 'expiry_date'
                },
                {
                    data: 'quantity_available_box'
                },
                 {
                    data: 'quantity_available_pcs'
                },
                {
                    data: 'action'
                }

            ]
        });
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
                            url: 'api_calls/products_api/delete-product.php',
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