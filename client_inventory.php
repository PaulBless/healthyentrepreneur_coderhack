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
                                       
                                    </div>
                                          <h4 class="page-title" style="letter-spacing: 2px;">Inventory</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                 <div class="card-box" style="border-top: 3px solid #14324d;">
                                    
                                    <h4 class="header-title mb-4 text-dark">Drug Inventory</h4>

                                    <table class="table table-hover  m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                                        <thead class="bg-dark text-white">
                                        <tr>
                                            <th>Batch No.</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Cost Price</th>
                                            <th>Selling Price</th>
                                            <th>Expiry Date</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php   
                                        
                                        $getProductInfo = mysqli_query($connectionString,"SELECT * FROM tbl_products JOIN categories_tbl on tbl_products.product_category = categories_tbl.category_id ORDER BY tbl_products.tbl_products_id ASC")or die(mysqli_error($connectionString));
                                        while($product_info = mysqli_fetch_array($getProductInfo)){  
                                            
                                            $get_product_id = $product_info['tbl_products_id'];
                                            $get_product_name = $product_info['product_name'];
                                            $get_product_quantity = $product_info['quantity_available'];
                                            $get_batch_no = $product_info['batch_no'];
                                            $get_selling_price = $product_info['selling_price'];
                                            $get_cost_price = $product_info['cost_price'];
                                            $get_categories = $product_info['category_name'];
                                            $get_expiry= $product_info['expiry_date'];   ?>

                                            <tr>
                                            <td><b><?php echo $get_batch_no;   ?></b></td>
                                            <td>
                                            <span class="ml-2"><?php echo $get_product_name;   ?></span>
                                            </td>

                                            <td>
                                            <?php echo $get_categories;   ?>
                                            </td>

                                            <td>
                                            <?php echo $get_cost_price;   ?>
                                            </td>

                                            <td>
                                            <?php echo $get_selling_price;   ?>
                                            </td>

                                            <td>
                                                <span class="badge badge-light-secondary"><?php echo $get_expiry;   ?></span>
                                            </td>

                                           

                                        </tr>


                                      <?php  }
                                        ?>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->    
                        
                    </div> <!-- container -->

                </div> <!-- content -->
              
                <?php require_once 'footer/admin-footer.php';   ?>

                <script type='text/javascript'>
                $(document).ready(function(){
                    $("#tickets-table").dataTable();
                });
                </script>