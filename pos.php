<?php  

    // require_once 'db/db.php';

    // $products_array = [];

    // $get_products = mysqli_query($connectionString,"SELECT * FROM `tbl_products`")or die(mysqli_error($connectionString));
                                            
    // while ($each_product = mysqli_fetch_array($get_products)) { 
        // $product_id = $each_product['tbl_products_id'];
        // $product_name = $each_product['product_name'];
        
        // $products_array += [$product_id=>$product_name]; 
    // }


?>


<?php 
    
    require_once 'header/admin-header.php'; 
    require_once 'sidebar/client-sidebar.php';   

    // if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
    //     require_once 'header/client-header.php'; 
    //     require_once 'sidebar/client-sidebar.php';   
    // }else{
    //     require_once 'header/admin-header.php'; 
    //     require_once 'sidebar/client-sidebar.php';   
    // }

?>


<?php

    // $get_currency = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 7") or die(mysqli_error($connectionString));
    // $get_currency_item = mysqli_fetch_array($get_currency);
    // $currency = $get_currency_item['settings_ans'];

?>

<!-- timer/clock script -->
<script language="javascript" type="text/javascript">
    /* Visit http://www.yaldex.com/ for full source code
    and get more free JavaScript, CSS and DHTML scripts! */

    var timerID = null;
    var timerRunning = false;
    
    // stop clock
    function stopclock (){
        if(timerRunning)
        clearTimeout(timerID);
        timerRunning = false;
    }
    
    // show time
    function showtime () {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds()
        var timeValue = "" + ((hours >12) ? hours -12 :hours)
        if (timeValue == "0") timeValue = 12;
        timeValue += ((minutes < 10) ? ":0" : ":") + minutes
        timeValue += ((seconds < 10) ? ":0" : ":") + seconds
        timeValue += (hours >= 12) ? " P.M." : " A.M."
        document.clock.face.value = timeValue;
        timerID = setTimeout("showtime()",1000);
        timerRunning = true;
    }

    // start clock
    function startclock() {
        stopclock();
        showtime();
    }

    window.onload=ajaxloader;
    // window.onload=startclock;
</script>

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
                        <?php	
                            $Today = date('y:m:d',mktime());
                            $new = date('l, F d, Y', strtotime($Today));
						?>

                        <!-- show current date time -->
                        <div class="hero-unit-clock">
                            <form name="clock">
                                <label for="date" class="control-label text-purple font-weight-bold ml-4 mr-1">Date: </label> <?php echo $new ?>
                                <label for="time" class="control-label text-purple font-weight-bold ml-3">Time: </label> <input type="button" style="width: 100px;" class="trans border-dark bg-white" name="face" value="" onclick="" readonly>
                            </form>
                        </div>

                        </div>
                            <h4 class="page-title" style="letter-spacing: 2px;"> Point of Sales</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Cart/Products Table -->
            <div class="card mt-3" style="border: 1px solid #14324d;">
                <div class="card-body" >
                    <div class="row">
                    
                    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11 " >
                        <form method="post" id="pos-form" style="width:100%">
                            <table class="table table-bordered table-hover " id="invoiceItem" width="100">
                                <thead class="bg-dark text-white">
                                    
                                    <tr  class="text-center">
                                        <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                        <th width="26%">Item Name</th>
                                        <th width="15%">Quantity Type</th>
                                        <th width="12%">Available</th>
                                        <th width="12%">Quantity</th>
                                        <th width="15%">Price <?php //echo $currency; ?></th>
                                        <th width="18%">Total <?php //echo $currency; ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td><input class="itemRow" type="checkbox"></td>
                                        <td>
                                            <select class="form-control product-name select-custom border-dark" name="productName[]" id="productName_1">
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


                                        <td><input type="number" required="required" name="available[]" id="available_1" readonly class="form-control available" autocomplete="off"></td>

                                        <td><input type="number" min="0" required="required" name="quantity[]" id="quantity_1" class="form-control border-secondary quantity" autocomplete="off"></td>
                                        
                                        <td><input type="text" autocomplete="off" required="required" name="price[]" id="price_1" readonly class="form-control price" autocomplete="off"></td>

                                        <td><input type="text" autocomplete="off" readonly required="required" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                                    </tr>
                                </tbody>

                            </table>
                    </div>

                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <button class="btn btn-success text-uppercase ml-0 mt-1" id="addRows" type="button" style="letter-spacing: 0.5px"> Add More</button>
                        <button class="btn btn-danger delete text-uppercase mb-0 mt-1" id="removeRows" type="button" style="letter-spacing: 0.5px;"> <i class="mdi mdi-delete"></i> Delete</button>
                    </div>
                    
                </div>
                </div>
            </div>

            <input type="hidden" name="user_type" value="admin">
            <input type="hidden" name="sales_id" id="sales_id" value="<?php  echo mt_rand(100000,999999);   ?>">

           <!-- Cart information details --> 
           <div class="card " style="border: 0.4rem solid #14324d;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <!-- input text display -->
                            <div class="row">
                                <!-- tax percentage -->
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                    <label class="text-dark">Tax Rate: &nbsp;</label>
                                    <div class="input-group">
                                            <input type="number" min="0" value="0" max="100" class="form-control text-dark border-secondary" name="taxRate" id="taxRate" placeholder="Tax Rate">
                                                <div class="input-group-append">
                                                <div class="input-group-text">%</div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- tax amount -->
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Tax Amount: &nbsp;</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><?php  //echo $currency; ?></div>
                                            </div>
                                            <input value="" readonly type="text" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
                                        </div>
                                    </div>
                                </div>
                                <!-- discount percentage -->
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="text-dark">Discount Rate: &nbsp;</label>
                                        <div class="input-group">
                                            <input type="number" value="0" min="0" max="100" class="form-control text-dark border-secondary"
                                                name="discountRate" id="discountRate" placeholder="Discount Rate">
                                            <div class="input-group-append">
                                                <div class="input-group-text">%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- discount amount -->
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Discount Amount: &nbsp;</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><?php  //echo $currency; ?></div>
                                            </div>
                                            <input value="" type="text" readonly class="form-control" name="discountAmount"
                                                id="discountAmount" placeholder="Discount Amount">

                                        </div>
                                    </div>
                                </div>
                                 
                            </div> 

                            <!-- input and computed values col -->
                            <div class="row">
                                <!-- sub total -->
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                    <label>Subtotal: &nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><?php  //echo $currency; ?></div>
                                        </div>
                                        <input value="" type="text" readonly class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
                                    </div>
                                    </div>
                                </div>
                                <!--  total amount -->
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Total: &nbsp;</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><?php  //echo $currency; ?></div>
                                            </div>
                                            <input value="" readonly type="text" class="form-control" name="totalAftertax"
                                                id="totalAftertax" placeholder="Total">
                                        </div>
                                    </div>
                                </div>
                              
                                <!-- amount payable -->
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label class="text-dark ">Amount Paid: &nbsp;</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><?php  //echo $currency; ?></div>
                                            </div>
                                            <!-- <input value="" type="float" required="required" class="form-control text-primary font-weight-bold border-secondary" name="amountPaid" id="amountPaid" placeholder="Amount Paid"> -->
                                            <input type="float" autocomplete="off" class="form-control text-center text-success font-weight-bold border-dark" maxlength="10" onkeypress="return isNumberKey(event)" name="amountPaid" id="amountPaid" placeholder="Amount Paid" required="required">                                        
                                        </div>
                                    </div>
                                </div>
                                <!-- balance -->
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                    <label>Balance: &nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><?php  //echo $currency; ?></div>
                                        </div>
                                        <input value="" readonly type="text" class="form-control text-danger font-weight-bold" name="amountDue" id="amountDue" placeholder="Balance">
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>

          
             <!-- Action Buttons < Complete Transactions >  -->
             <div class="card " style="border-bottom: 3px solid #14324d;">
                <div class="card-body ">
                    <div class="form-group float-right">
                            <input type="hidden" class="form-control" id="after-sales">
                        <!-- <input type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">						 -->
                        <button class="btn btn-lg btn-outline-primary btn-submit font-weight-bold text-uppercase mr-2" id="1"><i class="fa fa-save mr-1"></i>Save Only</button>
                        <button class="btn btn-lg btn-success btn-submit font-weight-bold text-uppercase" id="2"><i class="fa fa-print mr-1"></i>Save + Print</button>

                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>

    <!-- end row -->

</div> <!-- container -->

</div> <!-- content -->


<?php require_once 'modals/user_record_modal.php';   ?>
<?php require_once 'modals/foodorder_modal.php';   ?>
<?php require_once 'footer/admin-footer.php';   ?>

<script type='text/javascript'>

$(document).ready(function() {

    var items_array = {};
    var quantity_array = {};


    $('.alternatives').hide();

    $('.select-custom').select2({
        sorter: data => data.sort((a, b) => a.text.localeCompare(b.text))

    });

    $('.datepicker').datepicker({
        orientation: 'bottom',
        autoclose: true
    })

    $(document).on('click', '#checkAll', function() {
        $(".itemRow").prop("checked", this.checked);
    });

    // order food click function
    $('#order_food').on('click',function(){
        $('#food-menu').modal('show');
    })

    $(document).on('submit', '#pos-form', function(e) {
        e.preventDefault();
        var formdata = $(this).serialize();
        $.ajax({
            url: 'api_calls/sales_api/record-sales-original.php',
            type: 'POST',
            data: formdata,
            success: function(res) {
                if (res === 'success') {
                    if ($('#after-sales').val() === '1') {
                        window.location.href = 'pos.php'
                    } else {
                        var new_location = "print-sales.php?sid=" + $('#sales_id').val();
                        window.location.href = new_location;
                    }
                } else if (res === 'less') {
                    Swal.fire(
                        'Error',
                        'Amount Entered Is Less Than Total Amount',
                        'error')
                } else if (res === 'more') {
                    Swal.fire(
                        'Error',
                        'Amount Entered Is Greater Than Total Amount',
                        'error')
                } else if (res === 'less_product') {
                    Swal.fire(
                        'Error',
                        'Quantity Entered Must Be Less Than Available Medicine Qty',
                        'error')
                } else if (res === 'select') {
                    Swal.fire(
                        'Error',
                        'Please Select At Least One Medicine And Enter Amount Paid',
                        'error')
                }
            },
            error: function() {}
        })

    })

    $(document).on('click', '.btn-submit', function(e) {
        e.preventDefault();
        $('#after-sales').val($(this).attr('id'));
        $('#pos-form').submit();
    })

    $(document).on('change', '.product-name', function() {
        var id = $(this).attr('id');
        var productId = $(this).val();

        var idNumber = id.substr(12);
        $.ajax({
            url: 'api_calls/sales_api/fetch-product-details.php',
            type: 'POST',
            data: 'productId=' + productId,
            success: function(res) {
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
            error: function() {}
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
    $(document).on('click', '#removeRows', function() {
        $(".itemRow:checked").each(function() {
            $(this).closest('tr').remove();
        });
        $('#checkAll').prop('checked', false);
        calculateTotal();
    });
    $(document).on('blur', "[id^=quantity_]", function() {
        calculateTotal();
    });
    $(document).on('blur', "[id^=price_]", function() {
        calculateTotal();
    });
    $(document).on('blur', "#taxRate", function() {
        calculateTotal();
    });
    $(document).on('blur', "#discountRate", function() {
        calculateTotal();
    });
    $(document).on('blur', "#amountPaid", function() {
        var amountPaid = $(this).val();
        var totalAftertax = $('#totalAftertax').val();
        if (amountPaid && totalAftertax) {
            totalAftertax = totalAftertax - amountPaid;
            $('#amountDue').val((totalAftertax.toFixed(2)));
        } else {
            $('#amountDue').val((totalAftertax.toFixed(2)));
        }
    });
})

function calculateTotal() {
    var totalAmount = 0;
    $("[id^='price_']").each(function() {
        var id = $(this).attr('id');
        id = id.replace("price_", '');
        var price = $('#price_' + id).val();
        var quantity = $('#quantity_' + id).val();
        if (!quantity) {
            quantity = 1;
        }
        var total = price * quantity;
        $('#total_' + id).val(parseFloat(total).toFixed(2));
        totalAmount += total;
    });
    $('#subTotal').val(parseFloat(totalAmount).toFixed(2));
    var taxRate = $("#taxRate").val();
    var discountRate = $("#discountRate").val();
    var subTotal = $('#subTotal').val();
    if (subTotal) {
        var taxAmount = subTotal * taxRate / 100;
        var discountAmount = subTotal * discountRate / 100;
        $('#taxAmount').val(taxAmount.toFixed(2));
        $('#discountAmount').val(discountAmount.toFixed(2));
        subTotal = parseFloat(subTotal) + parseFloat(taxAmount) - parseFloat(discountAmount);
        $('#totalAftertax').val(subTotal.toFixed(2));
        var amountPaid = $('#amountPaid').val();
        var totalAftertax = $('#totalAftertax').val();
        if (amountPaid && totalAftertax) {
            totalAftertax = totalAftertax - amountPaid;
            $('#amountDue').val(totalAftertax.toFixed(2));
        } else {
            $('#amountDue').val(subTotal.toFixed(2));
        }
    }
}
</script>