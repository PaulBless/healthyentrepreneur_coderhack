<?php

require_once '../../db/db.php';

	$response = array();
	
	if ($_POST['id']) {
		
		$pid = intval($_POST['id']);

        $get_currency = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 7") or die(mysqli_error($connectionString));
        $get_currency_item = mysqli_fetch_array($get_currency);
        $currency = $get_currency_item['settings_ans'];

        $total_amount_counter = 0;
        $subtotal_counter = 0;
        $tax_counter = 0;
        $discount_counter = 0;
        $cost_price_counter = 0;
        $selling_price_counter = 0;


        ?>

         <thead class="bg-dark text-white">
                                    <tr >
                                        <th >Name of Item</th>                                        
                                        <th >Unit</th>                                        
                                        <th >Price</th>                                        
                                        <th >Quantity</th>
                                        <th >Total</th>
                                        <th >Time</th>                                        
                                    </tr>
                                </thead>   
                                <tbody >
                                    
                                                        
                               

        

<?php
        $get_each_sale = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE YEAR(sales_timestamp) = YEAR(NOW()) AND MONTH(sales_timestamp) = MONTH(NOW()) AND DAY(sales_timestamp) = DAY(NOW()) AND sales_seller = '$pid'")or die(mysqli_error($connectionString));
        while($eachSale = mysqli_fetch_array($get_each_sale)){
            $get_sales_Id = $eachSale['sales_id_number'];
            $tax_counter += $eachSale['tax_amount'];
            $discount_counter += $eachSale['discount_amount'];
            $subtotal_counter += $eachSale['sales_subtotal'];

            $served_by = $eachSale['sales_seller'];
            $served_time = strtotime($eachSale['sales_timestamp']);

            $time = date('d-M-Y H:i:s',$served_time);

            $fetch_sales = mysqli_query($connectionString,"SELECT * FROM `tbl_sales_table` WHERE `sales_id_number` = '$get_sales_Id'")or die(mysqi_error($connectionString));
            while ($each_single_sale = mysqli_fetch_array($fetch_sales)) { 

            $get_product_name = $each_single_sale['product_name'];
            $get_product_price = $each_single_sale['product_price'];
            $get_product_total = $each_single_sale['product_total'];
            $get_product_quantity = $each_single_sale['product_quantity'];

             $get_product_type = $each_single_sale['quantity_type'];

             $total_amount_counter += $get_product_total;

           

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
                <td><?php echo $time;  ?></td>
                </tr>
            
<?php }} ?>


 </tbody>

 <tfoot>
 
 <tr>
 
 <td colspan="4"><h4>Total</h4></td>
 <td colspan="2"><h4><?php echo $currency.' '.$total_amount_counter;  ?></h4></td>
 
 
 </tr>
 
 </tfoot>
                                        
                                     
                                      
		
	<?php }	?>