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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                        <li class="breadcrumb-item active">Contacts</li>
                                    </ol>
                                </div>
                                      <h4 class="page-title" style="letter-spacing: 2px;">Contacts</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                             <div class="card-box" style="border-top: 3px solid #14324d;">
                                <div class="row justify-content-end">
                                   
                                    <div class="col-lg-4">
                                        <div class="text-lg-right mt-3 mt-lg-0">
                                            
                                            <a href="javascript:void(0)" class="btn btn-danger add-expenditure"><i
                                                    class="fa fa-plus mr-1"></i> Add New</a>
                                        </div>
                                    </div><!-- end col-->
                                </div> <!-- end row -->
                            </div> <!-- end card-box -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                             <div class="card-box" style="border-top: 3px solid #14324d;">
                               <table class="table table-hover ">
                                   <thead class="bg-dark text-white">
                                       <tr>
                                           <th>ID</th>
                                           <th>Reason</th>
                                           <th>Amount</th>
                                           <th>Account</th>
                                           <th>User</th>
                                           <th>Time</th>
                                       </tr>
                                   </thead>

                                   <tbody>
                                      <tr>
                                          <td>#2552</td>
                                          <td>For Prepaid</td>
                                          <td>20</td>
                                          <td>Personal</td>
                                          <td>Me</td>
                                          <td>Today</td>
                                      </tr>
                                   </tbody>
                               </table>
                            </div> <!-- end card-box -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

   <!-- Add Modal -->
   <div id="custom-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-info" style="padding: 10px;">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Expenditure</h4>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <form method="post" id="edit_new_product">
                                                    <input type="hidden" name="product_id" id="product_id">
                                                    <input type="hidden" name="old_quantity" id="old_quantity">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label text-dark">ID</label>
                                                                <input required="required" type="number" min-length="0" class="form-control" name="new_quantity" id="new_quantity" placeholder="Enter quantity" readonly value="<?php  echo mt_rand(1000,9999);  ?>">
                                                            </div>
                                                        </div>
                                                        
                                                    </div> 
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label text-dark">Reason</label>
                                                                <textarea rows="3" required="required" class="form-control" name="new_quantity" id="new_quantity"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>  

                                                    <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label text-dark">Amount</label>
                                                                <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                <div class="input-group-text">$</div>
                                                                </div>
                                                                <input value="" required type="text" class="form-control" name="taxAmount" id="taxAmount" placeholder="Amount Involved">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label text-dark">Account</label>
                                                                <select class="wide" required>
                                                                    <option data-display="Select">Nothing</option>
                                                                    <option value="1">Personal</option>
                                                                    <option value="2">Company</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>  


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save Changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
              
                                    
                                    
                <?php //require_once 'modals/user_record_modal.php';   ?>
                <?php require_once 'footer/admin-footer.php';   ?>

                <script type='text/javascript'>
                $(document).ready(function(){
                    $("#tickets-table").dataTable();
                    $('select').niceSelect();

                    $(".add-expenditure").click(function(e){
                        $('#custom-modal').modal('show');
                    })
                });
                </script>