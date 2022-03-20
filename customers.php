<?php

require_once 'db/db.php';
$today_date = date('Y-m-d');

require_once 'header/admin-header.php'; 
require_once 'sidebar/client-sidebar.php';

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
                                       <button type="button" data-target="#add-modal" data-toggle="modal" class="btn btn-primary btn-md btn-rounded float-right">Add Customer</button>
                                    </div>
                                    <h4 class="page-title text-danger" style="letter-spacing: 2px;">Customers</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                                          
                    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" width="100%" id="types-table">

                      <thead class="bg-dark text-white font-weight-bold">
                        <tr >
                          <th> No</th>
                          <th> Customer Name</th>
                          <th> Phone # </th>
                          <th> District/County </th>
                          <th> Address </th>
                          <th> Date Created</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                </div>
            <!-- end row -->

                      
                           
    <!-- Add Modal -->
    <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info" style="padding: 10px;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Customer Record</h4>
                </div>
                <div class="modal-body p-4">
                    <form method="post" id="supplier-form">
                      <input type="hidden" name="supplier_id" id="supplier_id" data-id="add"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label text-dark">Customer Name</label>
                                    <input type="text" autocomplete="off" required class="form-control" name="name" id="name" placeholder="Joe Smith" >
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label text-dark">Phone Number</label>
                                    <input type="text" autocomplete="off" required class="form-control" name="contact" id="contact" placeholder="7824934821" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label text-dark">District/Sub County</label>
                                    <input type="text" autocomplete="off" required class="form-control" name="district" id="district" placeholder="Mukono" >
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label text-dark">Address</label>
                                    <input type="text" autocomplete="off" required class="form-control" name="address" id="address" placeholder="Bukomansimbi" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light mr-2">Add Customer</button>
                        <button type="button" class="btn btn-danger btn-rounded waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->


                    </div> <!-- container -->

                </div> <!-- content -->

    
                <?php require_once 'footer/admin-footer.php';   ?>
                
               
<script>
      // fetches business types record list
      function getLists() {
        $('#types-table').dataTable({
          paging: true,
          searching: true,
          "bDestroy": true,
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
          'url': 'api_calls/customers/fetch.php'
            },
          'columns': [
              {
                data: 'customer_id'
              },
              {
                data: 'customer_name'
              },
              {
                data: 'customer_phone'
              },  
              {
                data: 'customer_district'
              },  
              {
                data: 'customer_address'
              },
              {
                data: 'customer_timestamp'
              },
              {
                data: 'action'
              }
            ]
        });
      }
      // delete record function
      function processDelete(dataId) {
        swal.fire({
          title: 'Delete Customer!!',
          text: "Permanently delete this customer, Are you Sure?",
          type: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Delete!',
          showLoaderOnConfirm: true,
            
          preConfirm: function() {
            return new Promise(function(resolve) {
              $.ajax({
                url: '../apis/business_types/delete.php',
                type: 'POST',
                  data: 'delete='+dataId,
                  dataType: 'json'
              })
              .done(function(response){
                swal.fire('Deleted!', response.message, response.status).then(function(){  
                    geLists();
                  });
              })
              .fail(function(){
                swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
              });
            });
            },
          allowOutsideClick: false			  
        });	
      }
    </script>