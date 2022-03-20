<?php  require_once 'db/db.php'; 

$categories_array = [];

$get_categories = mysqli_query($connectionString,"SELECT * FROM `categories_tbl`")or die(mysqli_error($connectionString));
                                        
while ($each_category = mysqli_fetch_array($get_categories)) { 
 $category_id = $each_category['category_id'];
 $category_name = $each_category['category_name'];
 
 $categories_array += [$category_id=>$category_name]; 
}


$products_array = [];

$get_products = mysqli_query($connectionString,"SELECT * FROM `tbl_products`")or die(mysqli_error($connectionString));
                                        
while ($each_product = mysqli_fetch_array($get_products)) { 
 $product_id = $each_product['tbl_products_id'];
 $product_name = $each_product['product_name'];
 
 $products_array += [$product_id=>$product_name]; 
}



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
                        <h4 class="page-title">Products</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <form id="products_form" method="post">
                            <table class="table table-hover table-striped m-0 table-centered dt-responsive nowrap w-100 rowfy">
                                <thead>
                                    <tr>
                                        <th width="17%">Product Name</th>
                                        <th width="13%"><div data-toggle="tooltip" data-placement="top" title="Category of Product">Category</th>
                                        <th width="12%"><div data-toggle="tooltip" data-placement="bottom" title="Cost Price (1 Box)">C P (1 Box)</div> </th>
                                        <th width="12%"><div data-toggle="tooltip" data-placement="bottom" title="Cost Price (1 Pic)">C P (1 Pcs)</div></th>
                                        <th width="12%"><div data-toggle="tooltip" data-placement="bottom" title="Selling Price (1 Box)">S P (1 Box)</div></th>
                                        <th width="12%"><div data-toggle="tooltip" data-placement="bottom" title="Selling Price (1 Pcs)">S P (1 Pcs)</div></th>
                                        <th width="11%"><div data-toggle="tooltip" data-placement="bottom" title="Available (Box)">Avail(Box)</div></th>
                                        <th width="11%"><div data-toggle="tooltip" data-placement="bottom" title="Available (Pcs)">Avail (Pcs)</div></th>
                                        <th></th>

                                    </tr>
                                </thead>

                                <tbody id="table_body">

                                    <tr>

                                        <td><input type="text" autocomplete="off"  class="form-control products typeahead" name="name[]"
                                                required>
                                        </td>
                                        <td>

                                            <select class="form-control select-custom" name="category[]">
                                                <option disabled selected>Select Category</option>
                                                <?php foreach ($categories_array as $key => $value) {  ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value;  ?></option>
                                                <?php  }  ?>

                                            </select>

                                        <td><input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="cost_price_boxes[]"
                                                required></td>
                                         <td><input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="cost_price_pcs[]"
                                                required></td>
                                        <td><input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="selling_price_boxes[]"
                                                required>
                                        </td>
                                         <td><input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="selling_price_pcs[]"
                                                required>
                                        </td>
                                        <td><input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="quantity_avail_box[]"
                                                required>
                                        </td>
                                        <td><input type="text" autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="quantity_avail_pcs[]"
                                                required>
                                        </td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success">+</button>
                                        </td>




                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr class="text-center">
                                        <td colspan="8 ">
                                        <button class="btn btn-md btn-info" type="submit">Add Product</button>
                                        
                                        </td>
                                    </tr>
                                </tfoot>

                            </table>
                        </form>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->




    <?php require_once 'footer/admin-footer.php';   ?>

    <script type='text/javascript'>
    $(document).ready(function(e) {

        $('.select-custom').select2();

        $(".datepicker").datepicker({
            orientation: 'bottom'
        });

       /* Type  Ahead Start */
            // constructs the suggestion engine
        var states = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            // `states` is an array of state names defined in "The Basics"
            local: ['<?php echo implode("', '", $products_array) ?> ']
        });

        $('.typeahead').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states',
            source: states
        });

     
     


        /* Type  Ahead End */

        $(document).on('click', '#add', function() {

            var html = '';
            html += '<tr>';
            html +=
                '<td><input type="text" autocomplete="off"  class="form-control typeahead" name="name[]" required ></td>';
            html +=
                '<td> <select class="form-control select-custom" name="category[]"> <option disabled selected>Select Category</option><?php foreach ($categories_array as $key => $value) {  ?><option value="<?php echo $key; ?>"><?php echo $value;  ?></option> <?php  }  ?></select> </td>'
            html +=
                '<td><input type="text"  autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="cost_price_boxes[]" required></td>';
            html +=
                '<td><input type="text" autocomplete="off" onkeypress="return isNumberKey(event)"  class="form-control products" name="cost_price_pcs[]" required></td>';
            html +=
                '<td><input type="text"  autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="selling_price_boxes[]" required ></td>';
             html +=
                '<td><input type="text"  autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="selling_price_pcs[]" required ></td>';
             html +=
                '<td><input type="text"  autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="quantity_avail_box[]" required ></td>';
            html +=
                '<td><input type="text"  autocomplete="off" onkeypress="return isNumberKey(event)" class="form-control products" name="quantity_avail_pcs[]" required ></td>';
            html +=
                '<td><button type="button" name="remove" class="btn btn-danger btn_remove">X</button></td>';
            html += '</tr>';

            $('#table_body').append(html);
            $('.select-custom').select2();
            $('.datepicker').removeClass('hasDatepicker').datepicker({
                orientation: 'bottom'
            });
            initiateBloodHound();
        });

        $(document).on('click', '.btn_remove', function() {
            $(this).closest('tr').remove();
        });





        $(document).on("submit", "#products_form", function(e) {
            e.preventDefault();
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/products_api/add-products.php',
                type: 'POST',
                data: formdata,
                success: function(res) {
                    if (res === "success") {
                        Swal.fire(
                            'Good job!',
                            'All Products Added Successfully',
                            'success'
                        ).then(function() {
                            window.location.href = 'add_product.php'
                        });

                    } else {
                        Swal.fire(
                            'Ooops',
                            'Something Went Wrong',
                            'error'
                        ).then(function() {
                            window.location.href = 'add_product.php'
                        });
                    }
                },
                error: function() {}
            })

            // console.log(formdata);


        })



    })


    function initiateBloodHound(){
        //    var states = new Bloodhound({
        //     datumTokenizer: Bloodhound.tokenizers.whitespace,
        //     queryTokenizer: Bloodhound.tokenizers.whitespace,
        //     // `states` is an array of state names defined in "The Basics"
        //     local: ['<?php echo implode("', '", $products_array) ?> ']
        // });

        // $('.typeahead').typeahead({
        //     hint: true,
        //     highlight: true,
        //     minLength: 1
        // }, {
        //     name: 'states',
        //     source: states
        // });

    }

    </script>