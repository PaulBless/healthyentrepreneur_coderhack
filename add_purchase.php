<?php  require_once 'db/db.php';

$products_array = [];
$suppliers_array = [];

$get_products = mysqli_query($connectionString,"SELECT * FROM `tbl_products`")or die(mysqli_error($connectionString));
                                        
while ($each_product = mysqli_fetch_array($get_products)) { 
 $product_id = $each_product['tbl_products_id'];
 $product_name = $each_product['product_name'];
 
 $products_array += [$product_id=>$product_name]; 
}




$get_suppliers = mysqli_query($connectionString,"SELECT * FROM `tbl_suppliers`")or die(mysqli_error($connectionString));
                                        
while ($each_supplier = mysqli_fetch_array($get_suppliers)) { 
 $supplier_id = $each_supplier['supplier_id'];
 $supplier_name = $each_supplier['supplier_name'];
 
 $suppliers_array += [$supplier_id=>$supplier_name]; 
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
                        <h4 class="page-title">Add Purchase: <span class="text-secondary">Products</span></h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                     <div class="card-box" style="border-top: 3px solid #14324d;">
                        <form id="products_form" method="post">
                            <input type="hidden" name="purchase_id" value="<?php echo mt_rand(10000,99999);  ?>">
                            <table class="table table-hover  m-0 table-centered dt-responsive nowrap w-100 rowfy">
                                <thead class="bg-dark text-white text-center">
                                    <tr>
                                         <th width="25%"><div data-toggle="tooltip" data-placement="bottom" title="Product/Item Name">Name of Product</th>
                                        <th width="15%"><div data-toggle="tooltip" data-placement="bottom" title="Quantity of Boxes">Quantity (Box)</th>
                                        <th width="15%"><div data-toggle="tooltip" data-placement="bottom" title="Quantity of Pieces">Quantity (Pcs)</th>
                                        <th width="13%"><div data-toggle="tooltip" data-placement="bottom" title="Cost Price of Boxes">Cost Price (Box)</th>
                                        <th width="13%"><div data-toggle="tooltip" data-placement="bottom" title="Cost Price of Pieces">Cost Price (Pcs)</th>
                                        <th width="15%"><div data-toggle="tooltip" data-placement="bottom" title="Product Expiry Date">Expiry Date</th>
                                        <th></th>


                                    </tr>
                                </thead>

                                <tbody id="table_body">

                                  <tr>
                                        <td>
                                            <select class="form-control products custom-select" name="name[]">
                                                <option disabled selected>Select Product</option>
                                                <?php foreach ($products_array as $key => $value) {  ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value;  ?></option>
                                                <?php  }  ?>
                                            </select>
                                        </td>

                                        <td><input type="text" autocomplete="off" class="form-control products" onkeypress="return isNumberKey(event)" name="quantity_box[]" placeholder="12"></td>
                                        <td><input type="text" autocomplete="off" class="form-control products" onkeypress="return isNumberKey(event)" name="quantity_pcs[]" placeholder="320"></td>
                                        <td><input type="text" autocomplete="off" class="form-control products" onkeypress="return isNumberKey(event)" name="cost_box[]" placeholder="865"></td>
                                        <td><input type="text" autocomplete="off" class="form-control products" onkeypress="return isNumberKey(event)" name="cost_pcs[]" placeholder="45"></td>
                                        <td><input type="text" autocomplete="off" class="form-control products datepicker" data-date-autoclose="true" name="expiry[]" placeholder="01/01/2020"></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success" autocomplete="off">+</button>
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
                            <div class="form-group d-flex align-items-center justify-content-center">
                                <button type="submit" class="btn btn-md btn-info text-uppercase waves-effect waves-light">save product purchase</button>
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
                '<td><select class="form-control products custom-select" name="name[]"><option disabled selected>Select Product</option><?php foreach ($products_array as $key => $value) {  ?> <option value="<?php echo $key; ?>"><?php echo $value;  ?></option><?php  }  ?></select></td>';
           
            html += '<td><input type="text" autocomplete="off" class="form-control products" name="quantity_box[]" onkeypress="return isNumberKey(event)" placeholder="12"></td>';
            html += '<td><input type="text" autocomplete="off" class="form-control products" name="quantity_pcs[]" onkeypress="return isNumberKey(event)" placeholder="320"></td>';
            html += '<td><input type="text" autocomplete="off" class="form-control products" name="cost_box[]" onkeypress="return isNumberKey(event)" placeholder="865"></td>';
            html += '<td><input type="text" autocomplete="off" class="form-control products" name="cost_pcs[]" onkeypress="return isNumberKey(event)" placeholder="45"></td>';
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





        $(document).on("submit", "#products_form", function(e) {
            e.preventDefault();
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/purchases_api/add-purchase.php',
                type: 'POST',
                data: formdata,
                success: function(res) {
                    if (res === "success") {
                        Swal.fire(
                            'Good job!',
                            'Purchase Recorded Successfully',
                            'success'
                        ).then(function() {
                            window.location.href = 'add_purchase.php'
                        });

                    } else {
                        Swal.fire(
                            'Ooops',
                            'Something Went Wrong',
                            'error'
                        ).then(function() {
                            window.location.href = 'add_purchase.php'
                        });
                    }
                },
                error: function() {}
            })

            // console.log(formdata);


        })



    })
    </script>