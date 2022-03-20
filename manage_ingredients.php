<?php  require_once 'db/db.php'; ?>

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
                              <h4 class="page-title font-weight-bold" style="letter-spacing: 2px;">Manage Ingredients</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                     <div class="card-box" style="border-top: 3px solid #14324d;">

                        <h4 class="header-title mb-4 text-dark" style="letter-spacing: 1px;">List of Ingredients</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-responsive m-0 table-centered nowrap w-100"
                                id="tickets-table">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>Name</th>
                                        <th>Cost Price (Box)</th>
                                        <th>Cost Price (Pcs)</th>
                                        <th>Avail. (Box)</th>
                                        <th>Avail. (Pcs)</th>
                                        <th>Expiry Date</th>
                                        <th>Last Updated</th>
                                        <th></th>
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

    <?php require_once 'modals/user_record_modal.php';   ?>
    <?php require_once 'modals/ingredients_modal.php';   ?>
    <?php require_once 'footer/admin-footer.php';   ?>

    <script type='text/javascript'>
    $(document).ready(function() {
        readIngredients(); /* it will load ingredients when document loads */
        $(".datepicker").datepicker({
            orientation: 'bottom',
            autoclose: true,
        });
        $('select').niceSelect();


        $(document).on('click', '.edit-ingredient-button', function(e) {
            var ingredientId = $(this).data('id');
            $.ajax({
            url: 'api_calls/ingredients_api/ingredient-details.php',
            type: 'POST',
            data: 'ingredientId=' + ingredientId,
            dataType: 'json',
            success: function(res) {
                $('#ingredient_id').val(res.ingredient_id);
                $('#ingredient_name').val(res.name);
                $('#quantity_available_box').val(res.product_quantity_box);
                $('#quantity_available_pcs').val(res.product_quantity_pcs);
                $('#cost_price_box').val(res.cost_price_box);
                $('#cost_price_pcs').val(res.cost_price_pcs);
                $('#expiry').val(res.expiry_date);


                $('#edit-ingredient-modal').modal('show');
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




        $('#edit_new_ingredient').submit(function(e) {
            e.preventDefault();
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/ingredients_api/edit-ingredient.php',
                type: 'POST',
                data: formdata,
                success: function(res) {
                    res = $.trim(res);
                    if (res == "success") {
                        Swal.fire(
                            'Good job!',
                            'Ingredient Updated Successfully',
                            'success'
                        ).then(function() {
                            readIngredients()
                             $('#edit-ingredient-modal').modal('hide');
                        });

                    } else {
                        Swal.fire(
                            'Ooops',
                            'Something Went Wrong',
                            'error'
                        ).then(function() {
                            readIngredients()
                        });
                    }



                    $('#ingredient_id').val('');
                    $('#ingredient_name').val('');
                    $('#quantity_available_box').val('');
                    $('#quantity_available_pcs').val('');
                    $('#cost_price_box').val('');
                    $('#cost_price_pcs').val('');
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

        });



        $(document).on('click', '.delete-ingredient-button', function(e) {
            e.preventDefault();
            var ingredientId = $(this).data('id');
            SwalDelete(ingredientId);
            e.preventDefault();
        });




    });

    function readIngredients() {
        $('#tickets-table').dataTable({
            paging: true,
            searching: true,
            "bDestroy": true,
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': 'api_calls/ingredients_api/fetch-ingredient.php'
            },
            'columns': [
                    {
                        data: 'ingredient_name'
                    },
                    {
                        data: 'cost_price_box'
                    },
                    {
                        data: 'cost_price_pcs'
                    },
                    {
                        data: 'quantity_available_box'
                    },
                    {
                        data: 'quantity_available_pcs'
                    },
                    {
                        data: 'last_updated'
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



        function SwalDelete(ingredientId) {

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
                            url: 'api_calls/ingredients_api/delete-ingredient.php',
                            type: 'POST',
                            data: 'delete=' + ingredientId,
                            dataType: 'json'
                        })
                        .done(function(response) {
                            swal.fire('Deleted!', response.message, response.status);
                            readIngredients();
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