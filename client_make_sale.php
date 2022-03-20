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
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Upvex</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Extras</a></li>
                                            <li class="breadcrumb-item active">Invoice</li>
                                        </ol>
                                    </div>
                                          <h4 class="page-title" style="letter-spacing: 2px;">Sell Product</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
		
			<div class="card">
				<div class="card-body">
				<div class=" row col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<th width="39%">Item Name</th>
							<th width="22%">Quantity</th>
							<th width="22%">Price</th>								
							<th width="25%">Total</th>
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox"></td>
							<td>
                            <select class="form-control product-name select-custom" name="productName[]" id="productName_1">
                                           <?php   $get_products = mysqli_query($connectionString,"SELECT * FROM `tbl_products`");
                                           
                                           while ($each_product = mysqli_fetch_array($get_products)) {  ?>
                                     <option value="<?php  echo $each_product['tbl_products_id'] ?>"><?php echo $each_product['product_name']  ?></option>
                                          <?php } ?>
                                          
                                           </select>
                            
                           
                            
                            <td><input type="number" required="required" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
							<td><input type="text" required="required" name="price[]" id="price_1" readonly class="form-control price" autocomplete="off"></td>
							<td><input type="text" readonly required="required" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
						</tr>						
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
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
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
                                                            <div class="input-group-text">$</div>
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
								<input value="" type="number" class="form-control" name="discountRate" id="discountRate" placeholder="Discount Rate">
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
                                                            <div class="input-group-text">$</div>
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
                                                            <div class="input-group-text">$</div>
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
                                                            <div class="input-group-text">$</div>
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
                                                            <div class="input-group-text">$</div>
                                                        </div>
								<input value="" type="float" required="required" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
							<label>Amount Due: &nbsp;</label>
							<div class="input-group">
							<div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
								<input value="" readonly type="text" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
							</div>
						</div>	
					</div>
				</div>
										  		
				
			</div>
			<div class="clearfix"></div>		      	
		</div>

		<div class="card">
			<div class="card-body">
			<div class="form-group">
						<!-- <input type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">						 -->
                        <button class="btn btn-outline-success" type="submit"><i class="fa fa-save mr-1"></i>Save Only</button>
                        <button class="btn btn-success" type="submit"><i class="fa fa-print mr-1"></i>Save & Print</button>
                    
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

    $(document).on('change','.product-name',function(){
        var id = $(this).attr('id');
        var productId = $(this).val();

        var idNumber = id.substr(12);  
        $.ajax({
			   		url: 'api_calls/invoice_api/fetch-product-details.php',
			    	type: 'POST',
			       	data: 'productId='+productId,
			       	success:function(res){
                        $('#price_'+idNumber).val(res.selling_price);
                       },
                    error:function(){}
			     })
    })

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
		htmlRows += '<td><select class="form-control product-name select-custom" name="productName[]" id="productName_'+count+'"><?php $get_products = mysqli_query($connectionString,"SELECT * FROM `tbl_products`"); while ($each_product = mysqli_fetch_array($get_products)) {  ?><option value="<?php  echo $each_product['tbl_products_id'] ?>"><?php echo $each_product['product_name']  ?></option> <?php } ?></select></td>';	
		htmlRows += '<td><input type="number" required="required" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';   		
		htmlRows += '<td><input type="text" required="required" readonly name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"></td>';		 
		htmlRows += '<td><input type="text" required="required" readonly name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';          
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