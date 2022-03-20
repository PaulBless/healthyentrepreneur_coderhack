<?php  require_once 'db/db.php'; 

 if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
    $selected_a_id = $_COOKIE['u_i'];
    $running_check = mysqli_query($connectionString,"SELECT * FROM `users_table` WHERE `users_table_role`= '$selected_a_id' LIMIT 1")or die(mysqli_error($connectionString));
    if(mysqli_num_rows($running_check) > 0){
    }else{
        echo "<script>window.location.href='index.php'</script>";
    }
    }


    $products_array = [];

$get_products = mysqli_query($connectionString,"SELECT * FROM `tbl_products`")or die(mysqli_error($connectionString));
                                        
while ($each_product = mysqli_fetch_array($get_products)) { 
 $product_id = $each_product['tbl_products_id'];
 $product_name = $each_product['product_name'];
 
 $products_array += [$product_id=>$product_name]; 
}

    ?>

<?php

$get_currency = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 7") or die(mysqli_error($connectionString));
$get_currency_item = mysqli_fetch_array($get_currency);
$currency = $get_currency_item['settings_ans'];

?>



<?php  require_once 'header/admin-header.php';  ?>


<style>
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
    height: 36px !important;
    padding-top: 5px !important;
}
</style>


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
                                          <h4 class="page-title" style="letter-spacing: 2px;">Report : <span class="text-secondary">Purchases Ingredients</span></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-8 col-sm-12">
                                <div class="card">
                                    <div class="card-body" style="border: .5px solid #98a6ae;">
                                    <form method="post">
                                     <div class="row col-12">
                                      
                            <div class="form-group mb-3 col-lg-6 col-md-12 col-sm-12">
                                        <label for="txt_from">From:</label>
                                        <input type="text" id="txt_from" name="txt_from" class="form-control datepicker" data-date-autoclose="true" placeholder="Starts From" autocomplete="off">
                            </div>

                            <div class="form-group mb-3 col-lg-6 col-md-12 col-sm-12">
                                    <label for="txt_to">To:</label>
                                    <input type="text" id="txt_to" name="txt_to" class="form-control datepicker" data-date-autoclose="true" placeholder="Ends At" autocomplete="off">
                            </div>
                            </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-info" name="btn_fetch_report">Submit</button>
                                </div>
                                </form>
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>


<?php if(isset($_POST['btn_fetch_report'])){



    $get_from = $_POST['txt_from'];
    $yesterday = date('Y-m-d', strtotime($get_from . " - 1 day"));
    $get_to = $_POST['txt_to'];
    $tommorrow = date('Y-m-d', strtotime($get_to . " +1 day"));

    $start_date =  date('Y-m-d h:i',strtotime($yesterday));
    $end_date = date('Y-m-d h:i',strtotime($tommorrow));

    
    ?>
                        <div class="row">
                            <div class="col-12">
                                 <div class="card-box" style="border-top: 3px solid #14324d;">
                                    <h4 class="header-title mb-4 text-dark">Kitchen Ingredients Report</h4>
                                    <table class="table table-hover  m-0 table-centered dt-responsive nowrap w-100 main-table">
                                        <thead class="bg-dark text-white">
                                        <tr>
                                            <th>Ingredient</th>
                                            <th>Quantity(Box)</th>
                                            <th>Quantity(Pcs)</th>
                                            <th>Cost Price(Box)</th>
                                            <th>Cost Price(Pcs)</th>
                                            <th>Expiry Date</th>
                                            <th>Date Purchased</th>
                                        </tr>
                                        </thead>

        
                                        <tbody>
        <?php

        $current_day = date('Y-m-d h:i');
        // $subtotal_counter = 0;
        // $tax_counter = 0;
        // $discount_counter = 0;
        // $cost_price_counter = 0;
        // $selling_price_counter = 0;

        // Get Expense number 

        // $get_expense_today = mysqli_query($connectionString,"SELECT * FROM `tbl_expenses` WHERE expense_timestamp >= '$start_date' AND expense_timestamp <= '$end_date'")or die(mysqli_error($connectionString));
        // $expense_counter = 0;

        // while ($get_expense = mysqli_fetch_array($get_expense_today)) {
        //     $expense_total = $get_expense['expense_amount'];
        //     $expense_counter+= $expense_total;
        // }

        $get_each_purchase = mysqli_query($connectionString,"SELECT * from tbl_purchase_ingredients join tbl_ingredients on tbl_purchase_ingredients.ingredient_id = tbl_ingredients.tbl_ingredient_id WHERE `purchase_timestmap` > '$start_date' AND purchase_timestmap < '$end_date'")or die(mysqli_error($connectionString));
        while($each_purchase = mysqli_fetch_array($get_each_purchase)){
          
            $product_name = $each_purchase['ingredient_name'];
            $product_quantity_box = $each_purchase['quantity_box'];
            $product_quantity_pcs = $each_purchase['quantity_pcs'];
            $product_cost_price_box = $each_purchase['cost_price_box'];
            $product_cost_price_pcs = $each_purchase['cost_price_pcs'];
            $product_expiry = $each_purchase['expiry_date'];
            $product_timestamp = date('d-M-Y h:i',strtotime($each_purchase['purchase_timestmap']));


                ?>

                <tr>
                <td><?php echo $product_name;  ?></td>
                <td><?php echo $product_quantity_box;  ?></td>
                <td><?php echo $product_quantity_pcs;  ?></td>
                <td><?php echo $product_cost_price_box;  ?></td>
                <td><?php echo $product_cost_price_pcs;  ?></td>
                <td><?php echo $product_expiry;  ?></td>
                <td><?php echo $product_timestamp;  ?></td>
                </tr>
            
<?php }} ?>

            <input readonly value="<?php echo date('d-M-Y', strtotime($get_from));  ?>" type="hidden" id="starts_from">

                <input readonly value="<?php echo date('d-M-Y', strtotime($get_to));  ?>" type="hidden" id="ends_at">                            
                                        </tbody>
                                        <!-- <tfoot>
                                        <tr style="background-color: #ace2ac !important;">
                                            <td colspan="6"><h4>Sub Total</h4></td>
                                            <td colspan="1"><h3><span class="badge btn-info"><?php echo $currency." ".$subtotal_counter; ?></span></h3></td>
                                        </tr>
                                        
                                        <tr style="background-color: #99bef5">
                                            <td colspan="6"><h4>Total Discount</h4></td>
                                            <td colspan="1"><h3><span class="badge btn-primary"><?php  echo $currency." ".$discount_counter ?></span></h3></td>
                                        </tr>

                                        <tr style="background-color: #728090">
                                            <td colspan="6"><h4>Total Tax</h4></td>
                                            <td colspan="1"><h3><span class="badge btn-secondary"><?php  echo $currency." ".$tax_counter ?></span></h3></td>
                                        </tr>

                                        <tr style="background-color: #e6baad">
                                            <td colspan="6"><h4>Total Expenditure</h4></td>
                                            <td colspan="1"><h3><span class="badge btn-danger"><?php  echo $currency." ".$expense_counter ?></span></h3></td>
                                        </tr>


                                        <tr style="background-color: #728090">
                                            <td colspan="6"><h4>Overall Cost Price</h4></td>
                                            <td colspan="1"><h3><span class="badge btn-secondary"><?php  echo $currency." ".$cost_price_counter ?></span></h3></td>
                                        </tr>

                                        <tr style="background-color: #e6baad">
                                            <td colspan="6"><h4>Gross Sales (<em>Minus overall discount and expenditure</em>)</h4></td>
                                            <td colspan="1"><h3><span class="badge btn-danger"><?php $gross_sales = ($subtotal_counter+$tax_counter)-($discount_counter+$expense_counter); echo $currency." ".$gross_sales; ?></span></h3></td>
                                        </tr>

                                        <tr style="background-color: #ace2ac !important;">
                                            <td colspan="6"><h3>Profit</h3></td>
                                            <td colspan="1"><h3><span class="badge btn-info"><?php $profit = ($gross_sales) - ($cost_price_counter); echo $currency." ".$profit; ?></span></h3></td>
                                        </tr>


                                        </tfoot> -->
                                    </table>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->   
                        
                    
                    <?php  ?>
                        
                    
                        
                    </div> <!-- container -->

                </div> <!-- content -->
                
               

                <?php require_once 'modals/user_record_modal.php';   ?>
                <?php require_once 'footer/admin-footer.php';   ?>

                  <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
          


 <script type='text/javascript'>
    $(document).ready(function(e){
        $(".datepicker").datepicker({orientation:'bottom'});
         $('.select-custom').select2();

        var start_at  = $('#starts_from').val();
            var ends_at  = $('#ends_at').val();
            var exportTitle = 'Purchases Report on Ingredients From : '+start_at+' to '+ends_at;

            $('.main-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        title: exportTitle 
                    },
                    {
                        extend: 'pdf',
                        title: exportTitle 
                    },
                    {
                        extend: 'copy',
                        title: exportTitle 
                    },
                    {
                        extend: 'csv',
                        title: exportTitle 
                    },
                    {
                        extend: 'print',
                        title: exportTitle 
                    }
                ]
            });
        
       

    })

    </script>