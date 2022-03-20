<?php  require_once 'db/db.php'; ?>

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
                              <h4 class="page-title" style="letter-spacing: 2px;">Print Sales Receipts</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box" style="border-top: 3px solid #14324d;">

                        <h4 class="header-title mb-4 text-dark" style="letter-spacing: 1px;">All Sales Recorded</h4>

                        <table class="table table-hover  m-0 table-centered dt-responsive nowrap w-100"
                            id="tickets-table">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th> ID</th>
                                    <th>Sales ID</th>
                                    <th>Subtotal</th>
                                    <th>Total</th>
                                    <th>Seller</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php  
                                        
                                        $get_all_sales = mysqli_query($connectionString,"SELECT * FROM `tbl_each_sales` ORDER BY each_sales_id DESC")or die(mysqli_error($connectionString));
                                        while ($each_sale = mysqli_fetch_array($get_all_sales)) {
                                            $sales_id = $each_sale['sales_id_number'];
                                            $eachsales_id = $each_sale['each_sales_id'];
                                            $sales_subtotal = $each_sale['sales_subtotal'];
                                            $sales_total = $each_sale['sales_total'];
                                            $sales_seller = $each_sale['sales_seller'];
                                            $sales_timestamp = date('d-M-Y',strtotime($each_sale['sales_timestamp']));

                                            if($sales_seller === '0'){
                                                $get_by = "Admin";
                                            }else{
                                                $get_from_pharmacists_table = mysqli_query($connectionString,"SELECT * FROM pharmacists_table WHERE `pharmacists_id` = $sales_seller LIMIT 1")or die(mysqli_error($connectionString));
                                                $get_name = mysqli_fetch_array($get_from_pharmacists_table);

                                                $name = $get_name['pharmacists_firstname'].' '.$get_name['pharmacists_lastname'];
                                                $get_by = $name;
                                            }


                                            ?>

                                <tr>
                                    <td><?php echo $eachsales_id    ?></td>
                                    <td><?php echo $sales_id;    ?></td>
                                    <td><?php echo $sales_subtotal;   ?></td>
                                    <td><?php echo $sales_total;   ?></td>
                                    <td><?php echo $get_by;   ?></td>
                                    <td><?php echo $sales_timestamp;   ?></td>
                                    <td><a class="btn btn-info btn-md"
                                            href="print-sales.php?sid=<?php echo $sales_id; ?>"><i
                                                class="fa fa-print"></i>&nbsp; Print</a></td>

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

    
    <?php require_once 'modals/user_record_modal.php';   ?>

    <?php require_once 'footer/admin-footer.php';   ?>

    <script type='text/javascript'>
    $(document).ready(function() {


    });
    </script>