<?php  require_once 'db/db.php'; ?>

<?php

if (isset($_GET['sid'])) {
    $selected_sales_id = $_GET['sid'];
    $get_all_sales = mysqli_query($connectionString,"SELECT * FROM `tbl_each_sales` WHERE `sales_id_number` = '$selected_sales_id' LIMIT 1")or die(mysqli_error($connectionString));
    $each_sale = mysqli_fetch_array($get_all_sales);
        $sales_id = $each_sale['sales_id_number'];
        $sales_subtotal = $each_sale['sales_subtotal'];
        $sales_total = $each_sale['sales_total'];
        $tax_amount = $each_sale['tax_amount'];
        $amount_paid = $each_sale['amount_paid'];
        $discount_amount = $each_sale['discount_amount'];
        $sales_seller = $each_sale['sales_seller'];
        $sales_timestamp = date('d-M-Y H:i A',strtotime($each_sale['sales_timestamp']));


        if($sales_seller === '0'){
            $sales_seller = 'Admin';
        }else{
            $get_seller_name = mysqli_query($connectionString,"SELECT * FROM `pharmacists_table` WHERE `pharmacists_id`='$sales_seller' LIMIT 1")or die(mysqli_error($connectionString));
            $users_name = mysqli_fetch_array($get_seller_name);

            $sales_seller = $users_name['pharmacists_firstname'];
        }
} else {
    echo "<script>window.location.href='print_pos.php'</script>";
}

?>

<?php
// Currency
$get_currency = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 7") or die(mysqli_error($connectionString));
$get_currency_item = mysqli_fetch_array($get_currency);
$currency = $get_currency_item['settings_ans'];

// Name
$get_system_name = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 1") or die(mysqli_error($connectionString));
$get_name = mysqli_fetch_array($get_system_name);
$name = $get_name['settings_ans'];

// Contact
$get_system_contact = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 4") or die(mysqli_error($connectionString));
$get_contact = mysqli_fetch_array($get_system_contact);
$contact = $get_contact['settings_ans'];



?>

<style type="text/css">

h3 {
    font-family: Merchant Copy;
    font-weight: bold;
    font-size: 15;
}

span {
    font-family: Merchant Copy;
    font-weight: lighter;
    font-size: 15;
}

date {
    font-family: Merchant Copy;
    font-weight: lighter;
    font-size: 15;
}


thead {
    font-family: Merchant Copy;
    font-weight: bold;
    font-size: 15;
}

tbody {
    font-family: Merchant Copy;
    font-weight: lighter;
    font-size: 15;
}

table {
    width: 100%;
}

</style>



<!-- ============================================================== -->
                    <!-- Start Page Content here -->
<!-- ============================================================== -->

<!-- Printable area end -->


<div class="content-page">
    <div class="content">

        <div class="content-wrapper">
            <section class="content">
                <!-- Alert Message -->
                <div id="printableArea">
                    <table border="0">
                        <tr>
                            <td>
                                <table border="0" width="100%">
                                
                                 <tr>

                                        <td align="center" style="border-bottom:none;">
                                            <img src="assets/images/main-logo.svg" height="60px">
                                        </td>

                                    </tr>
                                    <tr>

                                        <td align="center" style="border-bottom: 1px #404040 solid;">
                                            <h3>
                                                <?php echo $name;  ?></h3>
                                            <span> Tel: <?php echo $contact; ?><br></span>

                                        </td>

                                    </tr>

                                    <tr>
                                        <td align="center">
                                            <nobr>
                                                <date>Date: <?php echo $sales_timestamp;  ?><time>
                                            </nobr>
                                        </td>
                                    </tr>
                                </table>

                                <table width="100%">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <td>Name </td>
                                            <td>Unit P.</td>
                                            <td align="right">Qty </td>
                                            <td align="right">Total</td>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                    $fetch_sales = mysqli_query($connectionString,"SELECT * FROM `tbl_sales_table` WHERE `sales_id_number` = '$selected_sales_id'")or die(mysqi_error($connectionString));
                    while ($each_single_sale = mysqli_fetch_array($fetch_sales)) { 
        
                    $get_product_name = $each_single_sale['product_name'];
                    $get_product_price = $each_single_sale['product_price'];
                    $get_product_total = $each_single_sale['product_total'];
                    $get_product_quantity = $each_single_sale['product_quantity'];

                    $get_product_type = $each_single_sale['quantity_type'];
        
                    
        
                    $fetch_product_details = mysqli_query($connectionString,"SELECT * FROM `tbl_products` WHERE `tbl_products_id` = '$get_product_name'")or die(mysqli_error($connectionString));
                        $get_product_details = mysqli_fetch_array($fetch_product_details);
        
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
                            
                            
                            ?>

                                        <tr>

                                            <td align="left" width="10">
                                                <?php echo $product_name;  ?>
                                            </td>
                                            <td align="left">
                                                <?php echo $get_product_price;  ?>
                                            </td>
                                            <td align="right">
                                                <?php echo $get_product_quantity;  ?>
                                            </td>
                                            <td align="right">
                                                <?php echo $get_product_total;  ?>
                                            </td>


                                        </tr>

                                        <tr>
                                            <td colspan="4" style="border-top:#333 1px solid;">
                                                <nobr></nobr>
                                            </td>
                                        </tr>


                                        <?php  }  ?>

                                    </tbody>

                                    <tr>
                                        <td colspan="4" style="border-top:#333 1px solid;">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="left" colspan="2">
                                            <nobr>Tax Allowed</nobr>
                                        </td>
                                        <td align="right">
                                            <nobr> <?php echo $currency." ".$tax_amount; ?></nobr>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" style="border-top:none;">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="left" colspan="2">
                                            <nobr>Discount Allowed</nobr>
                                        </td>
                                        <td align="right">
                                            <nobr> <?php echo $currency." ".$discount_amount; ?></nobr>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" style="border-top:none">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="left" colspan="2">
                                            <nobr>Sub Total</nobr>
                                        </td>
                                        <td align="right">
                                            <nobr><?php echo $currency." ".$sales_subtotal; ?></nobr>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" style="border-top:none">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="left" colspan="2">
                                            <nobr><strong>Grand Total</strong></nobr>
                                        </td>
                                        <td align="right">
                                            <nobr><strong><?php echo $currency." ".$sales_total; ?></strong></nobr>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" style="border-top:none;">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="left" colspan="2">
                                            <nobr>Amount Paid</nobr>
                                        </td>
                                        <td align="right">
                                            <nobr> <?php echo $currency." ".$amount_paid; ?></nobr>
                                        </td>
                                    </tr>



                                </table>
                                <table width="100%">
                                    <tr>
                                        <td>Receipt No. <?php echo $selected_sales_id; ?></strong></td>
                                        <td>Served By: <?php echo $sales_seller;  ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- <tr style="margin-top:20px">
                            <td>
                               Powered By Zelus Technologies

                            </td>
                        </tr> -->
                    </table>

                    <table border="0">
                        <tr>
                            <td>
                                <table border="0" width="100%">
                                
                                 <tr>

                                        <td align="center" style="border-bottom:none;">
                                            <img src="assets/images/main-logo.svg" height="60px">
                                        </td>

                                    </tr>
                                    <tr>

                                        <td align="center" style="border-bottom: 1px #404040 solid;">
                                            <h3>
                                                <?php echo $name;  ?></h3>
                                            <span> Tel: <?php echo $contact; ?><br></span>

                                        </td>

                                    </tr>

                                    <tr>
                                        <td align="center">
                                            <nobr>
                                                <date>Date: <?php echo $sales_timestamp;  ?><time>
                                            </nobr>
                                        </td>
                                    </tr>
                                </table>

                                <table width="100%">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <td>Name </td>
                                            <td>Unit P.</td>
                                            <td align="right">Qty </td>
                                            <td align="right">Total</td>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                    $fetch_sales = mysqli_query($connectionString,"SELECT * FROM `tbl_sales_table` WHERE `sales_id_number` = '$selected_sales_id'")or die(mysqi_error($connectionString));
                    while ($each_single_sale = mysqli_fetch_array($fetch_sales)) { 
        
                    $get_product_name = $each_single_sale['product_name'];
                    $get_product_price = $each_single_sale['product_price'];
                    $get_product_total = $each_single_sale['product_total'];
                    $get_product_quantity = $each_single_sale['product_quantity'];

                    $get_product_type = $each_single_sale['quantity_type'];
        
                    
        
                    $fetch_product_details = mysqli_query($connectionString,"SELECT * FROM `tbl_products` WHERE `tbl_products_id` = '$get_product_name'")or die(mysqli_error($connectionString));
                        $get_product_details = mysqli_fetch_array($fetch_product_details);
        
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
                            
                            
                            ?>

                                        <tr>

                                            <td align="left" width="10">
                                                <?php echo $product_name;  ?>
                                            </td>
                                            <td align="left">
                                                <?php echo $get_product_price;  ?>
                                            </td>
                                            <td align="right">
                                                <?php echo $get_product_quantity;  ?>
                                            </td>
                                            <td align="right">
                                                <?php echo $get_product_total;  ?>
                                            </td>


                                        </tr>

                                        <tr>
                                            <td colspan="4" style="border-top:#333 1px solid;">
                                                <nobr></nobr>
                                            </td>
                                        </tr>


                                        <?php  }  ?>

                                    </tbody>

                                    <tr>
                                        <td colspan="4" style="border-top:#333 1px solid;">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="left" colspan="2">
                                            <nobr>Tax Allowed</nobr>
                                        </td>
                                        <td align="right">
                                            <nobr> <?php echo $currency." ".$tax_amount; ?></nobr>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" style="border-top:none;">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="left" colspan="2">
                                            <nobr>Discount Allowed</nobr>
                                        </td>
                                        <td align="right">
                                            <nobr> <?php echo $currency." ".$discount_amount; ?></nobr>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" style="border-top:none">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="left" colspan="2">
                                            <nobr>Sub Total</nobr>
                                        </td>
                                        <td align="right">
                                            <nobr><?php echo $currency." ".$sales_subtotal; ?></nobr>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" style="border-top:none">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="left" colspan="2">
                                            <nobr><strong>Grand Total</strong></nobr>
                                        </td>
                                        <td align="right">
                                            <nobr><strong><?php echo $currency." ".$sales_total; ?></strong></nobr>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" style="border-top:none;">
                                            <nobr></nobr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <nobr></nobr>
                                        </td>
                                        <td align="left" colspan="2">
                                            <nobr>Amount Paid</nobr>
                                        </td>
                                        <td align="right">
                                            <nobr> <?php echo $currency." ".$amount_paid; ?></nobr>
                                        </td>
                                    </tr>



                                </table>
                                <table width="100%">
                                    <tr>
                                        <td>Receipt No. <?php echo $selected_sales_id; ?></strong></td>
                                        <td>Served By: <?php echo $sales_seller;  ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- <tr style="margin-top:20px">
                            <td>
                               Powered By Zelus Technologies

                            </td>
                        </tr> -->
                    </table>
                </div>


            </section> <!-- /.content -->
        </div> <!-- /.content-wrapper -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {

            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            document.body.style.marginTop = "-10px";
            setTimeout(function() {
                window.print();
            }, 500);
            document.body.innerHTML = originalContents;

            setTimeout(function() {
                window.close();
            }, 500);
        })
        </script>

    </div> <!-- content -->