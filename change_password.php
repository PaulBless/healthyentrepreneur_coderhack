<?php  require_once 'db/db.php'; ?>

<?php  require_once 'header/admin-header.php';  ?>

<?php  require_once 'sidebar/admin-sidebar.php';  ?>

<?php 

$get_system_name = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 1") or die(mysqli_error($connectionString));
$get_name = mysqli_fetch_array($get_system_name);
$system_name = $get_name['settings_ans'];

$get_system_title = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 2") or die(mysqli_error($connectionString));
$get_title = mysqli_fetch_array($get_system_title);
$system_title = $get_title['settings_ans'];

$get_address = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 3") or die(mysqli_error($connectionString));
$get_address_item = mysqli_fetch_array($get_address);
$address = $get_address_item['settings_ans'];

$get_contact = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 4") or die(mysqli_error($connectionString));
$get_contact_item = mysqli_fetch_array($get_contact);
$contact = $get_contact_item['settings_ans'];

$get_email = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 5") or die(mysqli_error($connectionString));
$get_email_item = mysqli_fetch_array($get_email);
$email = $get_email_item['settings_ans'];

$get_quantity_alert = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 6") or die(mysqli_error($connectionString));
$get_quantity_alert_item = mysqli_fetch_array($get_quantity_alert);
$quantity_alert = $get_quantity_alert_item['settings_ans'];

$get_currency = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 7") or die(mysqli_error($connectionString));
$get_currency_item = mysqli_fetch_array($get_currency);
$currency = $get_currency_item['settings_ans'];

$get_expire_alert = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 8") or die(mysqli_error($connectionString));
$get_expire_alert_item = mysqli_fetch_array($get_expire_alert);
$expire_alert = $get_expire_alert_item['settings_ans'];

$get_invoice_due = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 9") or die(mysqli_error($connectionString));
$get_invoice_due_item = mysqli_fetch_array($get_invoice_due);
$invoice_due = $get_invoice_due_item['settings_ans'];




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
                                    <h4 class="page-title">Profile</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                        <div class="col-12">
                             <div class="card-box" style="border-top: 3px solid #14324d;">
                                <form method="post" id="settings-form">
                                <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group mb-3">
                                                        <label for="txt_name">Name</label>
                                                        <input type="text" autocomplete="off" id="txt_system_name" name="txt_system_name" value="<?php echo $system_name; ?>" class="form-control" required>
                                                    </div>   
                                             </div> <!-- end col -->

                                             <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="txt_system_title">System Title</label>
                                                <input type="text" autocomplete="off" id="txt_system_title" value="<?php echo $system_title; ?>" name="txt_system_title" class="form-control" required>
                                            </div>    
                                     </div> <!-- end col -->

                                   
                                  
                              
                            </div> <!-- end card-box -->

                            <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group mb-3">
                                                        <label for="txt_address">Address</label>
                                                        <textarea required id="txt_address" name="txt_address" class="form-control" rows="5"><?php echo $address;?></textarea>
                                                    </div>  
                                             </div> <!-- end col -->
                            </div> <!-- end card-box -->

                            <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group mb-3">
                                                        <label for="txt_contact">Phone</label>
                                                        <input type="text" autocomplete="off" id="txt_contact" value="<?php echo $contact; ?>" name="txt_contact" required id="simpleinput" class="form-control">
                                                    </div>   
                                             </div> <!-- end col -->

                                             <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="txt_pharmacy_email">Pharmacy E-Mail</label>
                                                <input type="email" id="txt_pharmacy_email" value="<?php echo $email; ?>" name="txt_pharmacy_email" class="form-control" required>
                                            </div>    
                                     </div> <!-- end col -->
 
                            </div> <!-- end card-box -->

                            <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group mb-3">
                                                        <label for="txt_min_quantity_alert">Minimum Quantity For Stock Alert</label>
                                                        <input type="text" autocomplete="off" id="txt_min_quantity_alert" value="<?php echo $quantity_alert; ?>" name="txt_min_quantity_alert" class="form-control" required>
                                                    </div>   
                                             </div> <!-- end col -->

                                             <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="sel_currency">Currency</label>
                                                <select id="sel_currency" name="sel_currency" class="selectpicker" data-style="btn-outline-success" required>
                                                    <option value="GH¢" <?php  if($currency === 'GH¢'){ echo 'selected';}else{}?>>GH¢</option>
                                                    <option value="$" <?php  if($currency === '$'){ echo 'selected';}else{}?>>$</option>
                                                </select>
                                            </div>    
                                     </div> <!-- end col -->
 
                            </div> <!-- end card-box -->

                            <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group mb-3">
                                                        <label for="sel_expire_alert_limit">Expire Alert Limit (Months)</label>
                                                        <select id="sel_expire_alert_limit" name="sel_expire_alert_limit" class="selectpicker" data-style="btn-outline-success" required>
                                                    <option value="1" <?php  if($expire_alert === '1'){ echo 'selected';}else{}?>>1 month</option>
                                                    <option value="2" <?php  if($expire_alert === '2'){ echo 'selected';}else{}?>>2 months</option>
                                                    <option value="3" <?php  if($expire_alert === '3'){ echo 'selected';}else{}?>>3 months</option>
                                                    <option value="4" <?php  if($expire_alert === '4'){ echo 'selected';}else{}?>>4 months</option>
                                                </select>
                                                    </div>   
                                             </div> <!-- end col -->

                                             <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group mb-3">
                                                <label for="sel_invoice_due">Invoice Due Date</label>
                                                <select class="selectpicker" data-style="btn-outline-success" required id="sel_invoice_due" name="sel_invoice_due">
                                                    <option value="7" <?php  if($invoice_due === '7'){ echo 'selected';}else{}?>>1 week</option>
                                                    <option value="14" <?php  if($invoice_due === '14'){ echo 'selected';}else{}?>>2 weeks</option>
                                                    <option value="21" <?php  if($invoice_due === '21'){ echo 'selected';}else{}?>>3 weeks</option>
                                                    <option value="28" <?php  if($invoice_due === '28'){ echo 'selected';}else{}?>>1 Month</option>
                                                </select>
                                            </div>    
                                     </div> <!-- end col -->
 
                            </div> <!-- end card-box -->

                        <div>
                            <button class="btn btn-info btn-lg" type="submit">Save</button>
                            <button class="btn btn-danger btn-lg">Cancel</button>
                        </div>

                        </form>
                        </div><!-- end col-->
                    </div>
                    <!-- end row -->
                  
    
                    </div> <!-- container -->

                </div> <!-- content -->
                
                <?php require_once 'modals/user_record_modal.php';   ?>
                <?php require_once 'footer/admin-footer.php';   ?>

                <script type='text/javascript'>
                $(document).ready(function(){      

                $('#settings-form').submit(function(e){
                    e.preventDefault();
                    var formdata = $(this).serialize();

                    $.ajax({
                        url:'api_calls/settings_api/update_settings.php',
                        type: 'POST',
			       	    data: formdata,
                        success:function(res){
                            Swal.fire(
                        'Success!',
                        'Settings Updated Successfully',
                        'success'
                        )},
                        error:function(res){
                            Swal.fire(
                        'Error!',
                        'Ooops Something went wrong',
                        'error'
                        );
                            console.log(res);
                        }

                    });


                });
                    
            });
            
          
    </script>