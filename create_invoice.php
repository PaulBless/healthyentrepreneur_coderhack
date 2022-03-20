<?php  require_once 'db/db.php'; 

if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
    $selected_a_id = $_COOKIE['u_i'];
    $running_check = mysqli_query($connectionString,"SELECT * FROM `users_table` WHERE `users_table_role`= '$selected_a_id' LIMIT 1")or die(mysqli_error($connectionString));
    if(mysqli_num_rows($running_check) > 0){
    }else{
        echo "<script>window.location.href='index.php'</script>";
    }
	}
	?>


<?php

// Currency
$get_currency = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 7") or die(mysqli_error($connectionString));
$get_currency_item = mysqli_fetch_array($get_currency);
$currency = $get_currency_item['settings_ans'];

// System Name
$get_system_name = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 1") or die(mysqli_error($connectionString));
$get_name = mysqli_fetch_array($get_system_name);
$system_name = $get_name['settings_ans'];

// System Address
$get_system_address = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 3") or die(mysqli_error($connectionString));
$get_address = mysqli_fetch_array($get_system_address);
$system_address = $get_address['settings_ans'];

// System E-MAIL
$get_system_email = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 5") or die(mysqli_error($connectionString));
$get_email = mysqli_fetch_array($get_system_email);
$system_email = $get_email['settings_ans'];

// System Contact
$get_system_contact = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 4") or die(mysqli_error($connectionString));
$get_contact = mysqli_fetch_array($get_system_contact);
$system_contact = $get_contact['settings_ans'];

// Invoice Due
$get_system_invoice = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 9") or die(mysqli_error($connectionString));
$get_invoice = mysqli_fetch_array($get_system_invoice);
$system_invoice = $get_invoice['settings_ans'];


$products_array = [];

$get_products = mysqli_query($connectionString,"SELECT * FROM `tbl_products`")or die(mysqli_error($connectionString));

while ($each_product = mysqli_fetch_array($get_products)) { 
 $product_id = $each_product['tbl_products_id'];
 $product_name = $each_product['product_name'];
 
 $products_array += [$product_id=>$product_name]; 
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
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Upvex</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Extras</a></li>
                                            <li class="breadcrumb-item active">Invoice</li>
                                        </ol>
                                    </div>
                                          <h4 class="page-title" style="letter-spacing: 2px;">Invoice</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
    <div class="card">
    <div class="card-body">
   
      <form id="invoice-form" method="post" class="invoice-form" role="form"> 
		<div class="load-animate animated fadeInUp">
			<input id="currency" type="hidden" value="$">
			<div class="row justify-content-between">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3>Invoice ID</h3>
                    <div class="form-group">
						<input type="text" class="form-control" name="invoice_id" id="invoice_id" readonly placeholder="Invoice Id" value="<?php echo mt_rand(10000,99999);  ?>" autocomplete="off">
					</div>
					<?php echo $system_name; ?><br>	
					<?php echo $system_address; ?><br>	
					<?php echo $system_email; ?><br>
					<?php echo $system_contact; ?><br>	
				</div>      		
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3>To,</h3>
                   
					<div class="form-group">
						<input type="text" required="required" class="form-control" name="companyName" id="companyName" placeholder="Company Name" autocomplete="off">
					</div>
                   
					<div class="form-group">
						<textarea required="requried" class="form-control" rows="3" name="address" id="address" placeholder="Company Address"></textarea>
					</div>

					
				</div>
			</div>
</div>
</div>
</div>


        

			
			<div class="card">
				<div class="card-body">
				<div class=" row col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">
					<thead class="bg-dark text-white">
					<tr>
                                        <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                        <th width="22%">Item Name</th>
                                         <th width="12%">Quantity Type</th>
                                        <th width="12%">Aval.</th>
                                        <th width="22%">Quantity</th>
                                        <th width="22%">Price</th>
                                        <th width="23%">Total</th>
                                    </tr>	
					</thead>	

					<tbody>
					<tr>
                                        <td><input class="itemRow" type="checkbox"></td>
                                        <td>
                                            <select class="form-control product-name select-custom" name="productName[]"
                                                id="productName_1">
                                                <option disabled selected>Select Product</option>
                                                <?php foreach ($products_array as $key => $value) {  ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value;  ?></option>
                                                <?php  }  ?>
                                            </select>

										</td>
										<td>
											<select class="form-control quantity_type" name="quantity_type[]" id="quantity_type_1">
												<option value='1'>Pcs</option>
												<option value='2'>Box</option>
											</select>
										</td>


                                        <td><input type="number" required="required" name="available[]" id="available_1"
                                                readonly class="form-control available" autocomplete="off"></td>


                                        <td><input type="number" min="0" required="required" name="quantity[]"
                                                id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                                        <td><input type="text" required="required" name="price[]" id="price_1" readonly
                                                class="form-control price" autocomplete="off">

                                              

                                                </td>


                                        <td><input type="text" readonly required="required" name="total[]" id="total_1"
                                                class="form-control total" autocomplete="off"></td>
                                    </tr>
					
						</tbody>
					 					
												
					</table>
				</div>
			
			<div class="row text-left">
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
					<button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
					<button class="btn btn-success" id="addRows" type="button">+ Add More</button>
				</div>
			</div>
			</div>
			</div>

			<div class="card">
				<div class="card-body">
										   
			<div class="row col-12">
				<div class="col-md-6 col-sm-12 col-xs-12">	
					<div class="form-group">
							<label>Tax Rate: &nbsp;</label>
							<div class="input-group">
								<input type="number" min="0" value="0" max="100" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								<div class="input-group-append">
                                                            <div class="input-group-text">%</div>
                                                        </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
							<label>Tax Amount: &nbsp;</label>
							<div class="input-group">
							<div class="input-group-prepend">
                                                            <div class="input-group-text"><?php  echo $currency; ?></div>
                                                        </div>
								<input value="" readonly type="text" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
							</div>
						</div>
					</div>
										   </div>
					
				
				<div class="row col-12">
				<div class="col-md-6 col-sm-12 col-xs-12">	
				<div class="form-group">
							<label>Discount Rate: &nbsp;</label>
							<div class="input-group">
								<input type="number" value="0" min="0" max="100" class="form-control" name="discountRate" id="discountRate" placeholder="Discount Rate">
								<div class="input-group-append">
                                                            <div class="input-group-text">%</div>
                                                        </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
							<label>Discount Amount: &nbsp;</label>
							<div class="input-group">
							<div class="input-group-prepend">
                                                            <div class="input-group-text"><?php  echo $currency; ?></div>
                                                        </div>
								<input value="" type="text" readonly class="form-control" name="discountAmount" id="discountAmount" placeholder="Discount Amount">
								
							</div>
						</div>		
					</div>
				</div>

				<div class="row col-12">
				<div class="col-md-6 col-sm-12 col-xs-12">	
				<div class="form-group">
							<label>Subtotal: &nbsp;</label>
							<div class="input-group">
							<div class="input-group-prepend">
                                                            <div class="input-group-text"><?php  echo $currency; ?></div>
                                                        </div>
								<input value="" type="text" readonly class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
							<label>Total: &nbsp;</label>
							<div class="input-group">
							<div class="input-group-prepend">
                                                            <div class="input-group-text"><?php  echo $currency; ?></div>
                                                        </div>
								<input value="" readonly type="text" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						</div>		
					</div>
				</div>

				<div class="row col-12">
				<div class="col-md-6 col-sm-12 col-xs-12">	
				<div class="form-group">
							<label>Amount Paid: &nbsp;</label>
							<div class="input-group">
							<div class="input-group-prepend">
                                                            <div class="input-group-text"><?php  echo $currency; ?></div>
                                                        </div>
								<input value="" type="float" required="required" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
							<label>Balance: &nbsp;</label>
							<div class="input-group">
							<div class="input-group-prepend">
                                                            <div class="input-group-text"><?php  echo $currency; ?></div>
                                                        </div>
								<input value="" readonly type="text" class="form-control" name="amountDue" id="amountDue" placeholder="Balance">
							</div>
						</div>	
					</div>
				</div>
							<input type='hidden' id="after-sales">			  		
				
			</div>
			<div class="clearfix"></div>		      	
		</div>

		<div class="card">
			<div class="card-body">
			<div class="form-group">
						<!-- <input type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">						 -->
						<button class="btn btn-outline-success btn-submit" id="1" ><i class="fa fa-save mr-1"></i>Save Only</button>
                        <button class="btn btn-success btn-submit" id="2"><i class="fa fa-print mr-1"></i>Save & Print</button>
                    
                    </div>
			</div>
		</div>
	</form>	

    </div>
    </div>

		<!-- end row -->     
                        
                    </div> <!-- container -->

                </div> <!-- content -->


                <?php require_once 'footer/admin-footer.php';   ?>

<script type='text/javascript'>

              $(document).ready(function(){



    var items_array = {};
    var quantity_array = {};


$('.select-custom').select2();
$('.datepicker').datepicker({orientation:'bottom',autoclose: true})
$(document).on('click', '#checkAll', function() {          	
$(".itemRow").prop("checked", this.checked);
});	


    $(document).on('submit','#invoice-form',function(e){
        e.preventDefault();
        var formdata = $(this).serialize();
        $.ajax({
			   		url: 'api_calls/invoice_api/add-invoice.php',
			    	type: 'POST',
			       	data: formdata,
			       	success:function(res){
                       if(res === 'success'){
						if($('#after-sales').val()==='1'){
								window.location.href='manage_invoice.php'
							}else{
								var new_location = "view_invoice.php?view="+$('#invoice_id').val();
								window.location.href=new_location;
							}
                        Swal.fire(
                        'Good job!',
                        'Invoice Created Successfully',
                        'success')
                       }else if(res === 'less'){
                        Swal.fire(
                        'Error',
                        'Amount Entered Is Less Than Total Amount',
                        'error')
                       }else if(res=== 'more'){
                        Swal.fire(
                        'Error',
                        'Amount Entered Is Greater Than Total Amount',
                        'error')
                       }
                       },
                    error:function(){}
			     })

    })

	$(document).on('click','.btn-submit',function(e){
		$('#after-sales').val($(this).attr('id'));
		$('#invoice-form').submit();
	})



	$(document).on('change','.product-name',function(){
        var id = $(this).attr('id');
        var productId = $(this).val();

        var idNumber = id.substr(12);  
        $.ajax({
			   		url: 'api_calls/sales_api/fetch-product-details.php',
			    	type: 'POST',
			       	data: 'productId='+productId,
			       	success:function(res){
                        $('#price_' + idNumber).val(res.selling_price_pcs);
                $('#available_' + idNumber).val(res.product_quantity_pcs);
						
						 items_array['pcs_'+idNumber] = res.selling_price_pcs;
                items_array['box_'+idNumber] = res.selling_price_box;
                items_array['product_id_'+idNumber] = productId;

                quantity_array['pcs_'+idNumber] = res.product_quantity_pcs;
                quantity_array['box_'+idNumber] = res.product_quantity_box;
                quantity_array['product_id_'+idNumber] = productId;

                 $('#quantity_type_'+idNumber).prop('selectedIndex',0);
                       },
                    error:function(){}
			     })
	})
	
	        $(document).on('change', '.quantity_type', function() {
        var id = $(this).attr('id');
        var value = $(this).val();
        var idNumber = id.substr(14);

        var box_made = 'box_'+idNumber;
        var pcs_made = 'pcs_'+idNumber;

        console.log(idNumber);
        console.log(value);

        if(value == '1'){
            //pcs
            
            get_pcs_price = items_array[pcs_made];
            get_pcs_quantity = quantity_array[pcs_made];
             $('#price_' + idNumber).val(get_pcs_price);
             $('#available_' + idNumber).val(get_pcs_quantity);
               

        }else{
            //Boxes
               get_box_price = items_array[box_made];
               get_pcs_quantity = quantity_array[box_made];
             $('#price_' + idNumber).val(get_box_price);
             $('#available_' + idNumber).val(get_pcs_quantity);
               
        }

        

        // alert(id);
        // alert(value);
       
    });
    

	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});  
	var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		count++;
		 var htmlRows = '';
        htmlRows += '<tr>';
        htmlRows += '<td><input class="itemRow" type="checkbox"></td>';
        htmlRows +=
            '<td><select class="form-control product-name select-custom" name="productName[]" id="productName_' +
            count +
            '"><option disabled selected>Select Product</option><?php foreach ($products_array as $key => $value) {  ?> <option value="<?php echo $key; ?>"><?php echo $value;  ?></option><?php  }  ?></select></td>';

         htmlRows +=
            '<td><select class="form-control quantity_type" name="quantity_type[]" id="quantity_type_' +
            count +
            '"><option value="1">Pcs</option><option value="2">Box</option></option></select></td>';

        htmlRows +=
            '<td><input type="number" readonly required="required" name="available[]" id="available_' +
            count + '" readonly class="form-control available" autocomplete="off"></td>';
        htmlRows +=
            '<td><input type="number" min="0" required="required" name="quantity[]" id="quantity_' +
            count + '" class="form-control quantity" autocomplete="off"></td>';
        htmlRows += '<td><input type="text" required="required" name="price[]" id="price_'+count+'" readonly class="form-control price" autocomplete="off"></td>';
        htmlRows += '<td><input type="text" required="required" readonly name="total[]" id="total_' +
            count + '" class="form-control total" autocomplete="off"></td>';
        htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
        $('.select-custom').select2();
	}); 
	$(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
		});
		$('#checkAll').prop('checked', false);
		calculateTotal();
	});		
	$(document).on('blur', "[id^=quantity_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "#taxRate", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#discountRate", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#amountPaid", function(){
		var amountPaid = $(this).val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val((totalAftertax.toFixed(2)));
		} else {
			$('#amountDue').val((totalAftertax.toFixed(2)));
		}	
	});	
})
	
function calculateTotal(){
	var totalAmount = 0; 
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total_'+id).val(parseFloat(total).toFixed(2));
		totalAmount += total;			
	});
	$('#subTotal').val(parseFloat(totalAmount).toFixed(2));	
	var taxRate = $("#taxRate").val();
	var discountRate = $("#discountRate").val();
	var subTotal = $('#subTotal').val();	
	if(subTotal) {
		var taxAmount = subTotal*taxRate/100;
		var discountAmount = subTotal*discountRate/100;
		$('#taxAmount').val(taxAmount.toFixed(2));
		$('#discountAmount').val(discountAmount.toFixed(2));
		subTotal = parseFloat(subTotal)+parseFloat(taxAmount)-parseFloat(discountAmount);
		$('#totalAftertax').val(subTotal.toFixed(2));		
		var amountPaid = $('#amountPaid').val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax.toFixed(2));
		} else {		
			$('#amountDue').val(subTotal.toFixed(2));
		}
	}
}


</script>