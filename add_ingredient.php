<?php  require_once 'db/db.php'; 



$ingredients_array = [];

$get_ingredients = mysqli_query($connectionString,"SELECT * FROM `tbl_ingredients`")or die(mysqli_error($connectionString));
                                        
while ($each_ingredient = mysqli_fetch_array($get_ingredients)) { 
 $ingredient_id = $each_ingredient['tbl_ingredient_id'];
 $ingredient_name = $each_ingredient['ingredient_name'];
 
 $ingredients_array += [$ingredient_id=>$ingredient_name]; 
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
                        <h4 class="page-title" style="letter-spacing: 2px;">Add Ingredients</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                     <div class="card-box" style="border: 1px solid #14324d;">
                        <form id="ingredients_form" method="post">
                            <table class="table table-hover table-striped table-bordered  m-0 table-centered table-responsive nowrap w-100 rowfy">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th width="30%;"><div data-toggle="tooltip" data-placement="bottom" title="Name of Ingredient" >Ingredient Name</th>
                                        <th><div data-toggle="tooltip" data-placement="bottom" title="Cost Price (1 Box)"> C P (1 Box)</div></th>
                                         <th> <div data-toggle="tooltip" data-placement="bottom" title="Cost Price (1 Pcs)">C P (1 Pcs)</div> </th>
                                         <th><div data-toggle="tooltip" data-placement="bottom" title="Quantity Available (Box)">Avail (Box)</div></th>
                                         <th><div data-toggle="tooltip" data-placement="bottom" title="Quantity Available (Pcs)">Avail (Pcs)</div></th>
                                         <th><div data-toggle="tooltip" data-placement="bottom" title="Ingredient Expiry Date"> Expiry Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody id="table_body">

                                    <tr>

                                        <td width="30%"><input autocomplete="disabled" type="text" class="form-control products typeahead" name="name[]"
                                               placeholder="enter name of ingredient" required>
                                        </td>

                                        <td><input autocomplete="disabled" type="text" class="form-control products" onkeypress="return isNumberKey(event)" name="cost_price_boxes[]"
                                               placeholder="150" required></td>
                                         <td><input autocomplete="disabled" type="text" class="form-control products" onkeypress="return isNumberKey(event)" name="cost_price_pcs[]"
                                               placeholder="15" required></td >
                                        
                                        <td><input autocomplete="disabled" type="text" class="form-control products" onkeypress="return isNumberKey(event)" name="quantity_avail_box[]"
                                               placeholder="24" required >
                                        </td >
                                        <td><input autocomplete="disabled" type="text" class="form-control products" onkeypress="return isNumberKey(event)" name="quantity_avail_pcs[]"
                                               placeholder="240" required>
                                        </td>
                                        <td><input autocomplete="disabled" type="text" class="form-control products" name="expiry_date[]" placeholder="01/01/2020">
                                        </td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success" title="Add More Ingredient">+</button>
                                        </td>

                                    </tr>

                                </tbody>
                                <!-- <tfoot>
                                    <tr class="text-right">
                                        <td colspan="7"><button class="btn btn-md btn-info text-uppercase" type="submit">Add Ingredient</button></td>
                                    </tr>
                                </tfoot> -->

                            </table>
                            <div class="form-group d-flex align-items-center justify-content-center mt-2">
                                <button type="submit" class="btn btn-info btn-md waves-effect waves-light text-center text-uppercase"> Save Ingredient</button>
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
            local: ['<?php echo implode("', '", $ingredients_array) ?> ']
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
                '<td><input autocomplete="disabled" type="text" class="form-control typeahead" name="name[]" placeholder="enter name of ingredient" required ></td>';

            html +=
                '<td><input autocomplete="disabled" type="text" class="form-control products" name="cost_price_boxes[]" placeholder="150" required></td>';
            html +=
                '<td><input autocomplete="disabled" type="text" class="form-control products" name="cost_price_pcs[]" placeholder="15" required></td>';
           
             html +=
                '<td><input autocomplete="disabled" type="text" class="form-control products" name="quantity_avail_box[]" placeholder="24" required ></td>';
            html +=
                '<td><input autocomplete="disabled" type="text" class="form-control products" name="quantity_avail_pcs[]" placeholder="240" required ></td>';
            html +=
                '<td><input autocomplete="disabled" type="text" class="form-control products" name="expiry_date[]" placeholder="01/01/2020"></td>';
            html +=
                '<td><button type="button" name="remove" class="btn btn-danger btn_remove" title="Remove This Ingredient">X</button></td>';
            html += '</tr>';

            $('#table_body').append(html);
            $('.select-custom').select2();
            $('.datepicker').removeClass('hasDatepicker').datepicker({
                orientation: 'bottom'
            });
            // initiateBloodHound();
        });

        $(document).on('click', '.btn_remove', function() {
            $(this).closest('tr').remove();
        });





        $(document).on("submit", "#ingredients_form", function(e) {
            e.preventDefault();
            var formdata = $(this).serialize();

            $.ajax({
                url: 'api_calls/ingredients_api/add-ingredient.php',
                type: 'POST',
                data: formdata,
                success: function(res) {
                    if (res === "success") {
                        Swal.fire(
                            'Good job!',
                            'All Ingredients Added Successfully',
                            'success'
                        ).then(function() {
                            window.location.href = 'add_ingredient.php'
                        });

                    } else {
                        Swal.fire(
                            'Ooops',
                            'Something Went Wrong',
                            'error'
                        ).then(function() {
                            window.location.href = 'add_ingredient.php'
                        });
                    }
                },
                error: function(err) {console.log(err);}
            })

            // console.log(formdata);


        })



    })

    </script>