<?php  require_once 'db/db.php';

$ingredients_array = [];

$get_ingredients = mysqli_query($connectionString,"SELECT * FROM `tbl_ingredients`")or die(mysqli_error($connectionString));
                                        
while ($each_ingredient = mysqli_fetch_array($get_ingredients)) { 
 $ingredient_id = $each_ingredient['tbl_ingredient_id'];
 $ingredient_name = $each_ingredient['ingredient_name'];
 
 $ingredients_array += [$ingredient_id=>$ingredient_name]; 
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
                        <h4 class="page-title">Add Purchase: <span class="text-secondary">Ingredients</span></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                     <div class="card-box" style="border-top: 3px solid #14324d;">
                        <form id="purchase_ingredients_form" method="post">
                            <input type="hidden" name="purchase_id" value="<?php echo mt_rand(10000,99999);  ?>">
                            <table class="table table-hover  m-0 table-centered dt-responsive nowrap w-100 rowfy">
                                <thead class="bg-dark text-white text-center">
                                    <tr>
                                        <th width="25%"><div data-toggle="tooltip" data-placement="bottom" title="Ingredient Name">Name of Ingredient</th>
                                        <th width="15%"><div data-toggle="tooltip" data-placement="bottom" title="Total Quantity (Box)">Quantity (Box)</div></th>
                                        <th width="15%"><div data-toggle="tooltip" data-placement="bottom" title="Total Quantity (Pcs)">Quantity (Pcs)</div></th>
                                        <th width="13%"><div data-toggle="tooltip" data-placement="bottom" title="Cost Price for (Box)">C P (Box)</div></th>
                                        <th width="13%"><div data-toggle="tooltip" data-placement="bottom" title="Cost Price for (Pcs)">C P (Pcs)</div></th>
                                        <th width="15%">Expiry Date</th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody id="table_body">

                                    <tr>
                                        <td>
                                            <select class="form-control products custom-select" name="name[]">
                                                <option disabled selected>Select Ingredient</option>
                                                <?php foreach ($ingredients_array as $key => $value) {  ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value;  ?></option>
                                                <?php  }  ?>
                                            </select>
                                        </td>

                                        <td><input type="text" autocomplete="off" class="form-control products" name="quantity_box[]" onkeypress="return isNumberKey(event)" placeholder="12"></td>
                                        <td><input type="text" autocomplete="off" class="form-control products" name="quantity_pcs[] " onkeypress="return isNumberKey(event)" placeholder="180"></td>
                                        <td><input type="text" autocomplete="off" class="form-control products" name="cost_box[]" onkeypress="return isNumberKey(event)" placeholder="1350"></td>
                                        <td><input type="text" autocomplete="off" class="form-control products" name="cost_pcs[]" onkeypress="return isNumberKey(event)" placeholder="90"></td>
                                        <td><input type="text" autocomplete="off" class="form-control products datepicker" data-date-autoclose="true" name="expiry[]" placeholder="01/01/2020"></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success">+</button>
                                        </td>




                                    </tr>

                                </tbody>
                                <!-- <tfoot>
                                    <tr class="text-right">
                                        <td colspan="6"><button class="btn btn-md btn-info text-uppercase" type="submit">Add
                                                Product</button></td>
                                    </tr>
                                </tfoot> -->

                            </table>

                            <div class="form-group d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-md btn-info waves-effect waves-light text-uppercase">Save Ingredient Purchase</button>
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->



    <?php require_once 'modals/user_record_modal.php';   ?>
    <?php require_once 'footer/admin-footer.php';   ?>

    <script type='text/javascript'>
    $(document).ready(function(e) {

        $(".datepicker").datepicker({
            orientation: 'bottom'
        });
        $('.custom-select').select2({
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        })

        $(document).on('click', '#add', function() {
          
            var html = '';
            html += '<tr>';
            html +=
                '<td><select class="form-control products custom-select" name="name[]"><option disabled selected>Select Ingredient</option><?php foreach ($ingredients_array as $key => $value) {  ?> <option value="<?php echo $key; ?>"><?php echo $value;  ?></option><?php  }  ?></select></td>';
           
            html += '<td><input type="text" autocomplete="off" class="form-control products" name="quantity_box[]" placeholder="12" onkeypress="return isNumberKey(event)"></td>';
            html += '<td><input type="text" autocomplete="off" class="form-control products" name="quantity_pcs[]" placeholder="180" onkeypress="return isNumberKey(event)"></td>';
            html += '<td><input type="text" autocomplete="off" class="form-control products" name="cost_box[]" placeholder="1350" onkeypress="return isNumberKey(event)"></td>';
            html += '<td><input type="text" autocomplete="off" class="form-control products" name="cost_pcs[]" placeholder="90" onkeypress="return isNumberKey(event)"></td>';
            html +=
                '<td><input type="text" autocomplete="off" class="form-control products datepicker" data-date-autoclose="true" name="expiry[]" placeholder="01/01/2020"></td>';
            html +=
                '<td><button type="button" name="remove" class="btn btn-danger btn_remove">X</button></td>';
            html += '</tr>';

            $('#table_body').append(html);
            $('.datepicker').removeClass('hasDatepicker').datepicker({
                orientation: 'bottom'
            })

             $('.custom-select').select2({
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        })

        });

        $(document).on('click', '.btn_remove', function() {
            $(this).closest('tr').remove();
        });





        $(document).on("submit", "#purchase_ingredients_form", function(e) {
            e.preventDefault();
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/purchases_api/add-purchase-ingredient.php',
                type: 'POST',
                data: formdata,
                success: function(res) {
                    if (res === "success") {
                        Swal.fire(
                            'Good job!',
                            'Purchase Recorded Successfully',
                            'success'
                        ).then(function() {
                            window.location.href = 'add_purchase_ingredient.php'
                        });

                    } else {
                        Swal.fire(
                            'Ooops',
                            'Something Went Wrong',
                            'error'
                        ).then(function() {
                            window.location.href = 'add_purchase_ingredient.php'
                        });
                    }
                },
                error: function() {}
            })

            // console.log(formdata);


        })



    })
    </script>