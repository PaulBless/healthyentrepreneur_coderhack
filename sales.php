<?php  require_once 'db/db.php'; ?>

<?php

$get_currency = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 7") or die(mysqli_error($connectionString));
$get_currency_item = mysqli_fetch_array($get_currency);
$currency = $get_currency_item['settings_ans'];


?>


<?php 

    if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
        require_once 'header/client-header.php'; 
        require_once 'sidebar/client-sidebar.php';   
    }else{
        require_once 'header/admin-header.php'; 
        require_once 'sidebar/admin-sidebar.php';   
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
                                        
                                    </div>
                                          <h4 class="page-title" style="letter-spacing: 2px;">
Sales</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                 <div class="card-box" style="border-top: 3px solid #14324d;">
                                    <h4 class="header-title mb-4 text-dark">Sales For Today</h4>
                                    <table class="table table-hover  m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead class="bg-dark text-white">
                                       <tr>
                                            <th>Name</th>                                        
                                            <th>Unit</th>                                        
                                            <th>Price</th>                                        
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Served By</th>
                                            <th>Time</th>
                                        </tr>
                                        </thead>

        
                                        <tbody>
        <?php

        $subtotal_counter = 0;
        $tax_counter = 0;
        $discount_counter = 0;
        $cost_price_counter = 0;
        $selling_price_counter = 0;

        // Get Expense number 

        $get_expense_today = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE YEAR(expense_timestamp) = YEAR(NOW()) AND MONTH(expense_timestamp) = MONTH(NOW()) AND DAY(expense_timestamp) = DAY(NOW())")or die(mysqli_error($connectionString));
        $expense_counter = 0;

        while ($get_expense = mysqli_fetch_array($get_expense_today)) {
            $expense_total = $get_expense['expense_amount'];
            $expense_counter+= $expense_total;
        }

        $get_each_sale = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE YEAR(sales_timestamp) = YEAR(NOW()) AND MONTH(sales_timestamp) = MONTH(NOW()) AND DAY(sales_timestamp) = DAY(NOW())")or die(mysqli_error($connectionString));
        while($eachSale = mysqli_fetch_array($get_each_sale)){
            $get_sales_Id = $eachSale['sales_id_number'];
            $tax_counter += $eachSale['tax_amount'];
            $discount_counter += $eachSale['discount_amount'];
            $subtotal_counter += $eachSale['sales_subtotal'];

            $served_by = $eachSale['sales_seller'];
            $served_time = strtotime($eachSale['sales_timestamp']);

            $time = date('d-M-Y H:i:s',$served_time);

            $fetch_sales = mysqli_query($connectionString,"SELECT * FROM `tbl_sales_table` WHERE `sales_id_number` = '$get_sales_Id'")or die(mysqli_error($connectionString));
            while ($each_single_sale = mysqli_fetch_array($fetch_sales)) { 

            $get_product_name = $each_single_sale['product_name'];
            $get_product_price = $each_single_sale['product_price'];
            $get_product_total = $each_single_sale['product_total'];
            $get_product_quantity = $each_single_sale['product_quantity'];

             $get_product_type = $each_single_sale['quantity_type'];

           

            $get_product_details = mysqli_query($connectionString,"SELECT * FROM `tbl_products` WHERE `tbl_products_id` = '$get_product_name'")or die(mysqli_error($connectionString));
                $get_product_details = mysqli_fetch_array($get_product_details);

                if($get_product_type  == 1){
                    // meaning item sold pcs
                    $product_name = $get_product_details['product_name'];
                $product_cost_price = $get_product_details['cost_price_pcs'];
                $item_unit = 'PCS';
                }else{
                    // meaning item sold is box
                     $product_name = $get_product_details['product_name'];
                $product_cost_price = $get_product_details['cost_price_box'];
                $item_unit = "BOX";
                }

                $finding_cost_price = $product_cost_price*$get_product_quantity;
                $finding_selling_price = $get_product_price*$get_product_quantity;

                $cost_price_counter+= $finding_cost_price;
                $selling_price_counter += $finding_selling_price;

                if($served_by === '0'){
                    $get_by = "Admin";
                }else{
                    $get_from_pharmacists_table = mysqli_query($connectionString,"SELECT * FROM pharmacists_table WHERE `pharmacists_id` = $served_by LIMIT 1")or die(mysqli_error($connectionString));
                    $get_name = mysqli_fetch_array($get_from_pharmacists_table);

                    $name = $get_name['pharmacists_firstname'].' '.$get_name['pharmacists_lastname'];
                    $get_by = $name;
                }

                ?>

                <tr>
                <td><?php echo $product_name;  ?></td>
                <td><?php echo $item_unit;  ?></td>
                <td><?php echo $get_product_price;  ?></td>
                <td><?php echo $get_product_quantity;  ?></td>
                <td><?php echo $get_product_total;  ?></td>
                <td><?php echo $get_by;  ?></td>
                <td><?php echo $time;  ?></td>
                </tr>
            
<?php }} ?>

                                        
                                        </tbody>
                                        <tfoot>
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


                                        </tfoot>
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
               

    </script>