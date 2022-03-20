<?php

// require_once 'db/db.php';
$today_date = date('Y-m-d');

// $get_currency = mysqli_query($connectionString,"SELECT * FROM tbl_settings WHERE settings_id = 7") or die(mysqli_error($connectionString));
// $get_currency_item = mysqli_fetch_array($get_currency);
// $currency = $get_currency_item['settings_ans'];

// // Get sales number 

// $get_sales_today = mysqli_query($connectionString,"SELECT * FROM `tbl_each_sales` WHERE sales_timestamp LIKE '%$today_date%'")or die(mysqli_error($connectionString));
// $sales_counter = 0;
// $expense_counter = 0;
// $medicine_counter = 0;

// while ($get_sales = mysqli_fetch_array($get_sales_today)) {
//     $sales_subtotal = $get_sales['sales_total'];
//     $sales_counter+= $sales_subtotal;
// }

// // Get Expense number 

// $get_expense_today = mysqli_query($connectionString,"SELECT * FROM `tbl_expenses` WHERE expense_timestamp LIKE '%$today_date%'")or die(mysqli_error($connectionString));
// $expense_counter = 0;

// while ($get_expense = mysqli_fetch_array($get_expense_today)) {
//     $expense_total = $get_expense['expense_amount'];
//     $expense_counter+= $expense_total;
// }

// // Get medicine number

// $get_total_medicine = mysqli_query($connectionString,"SELECT * FROM `tbl_products`")or die(mysqli_error($connectionString));

// while ($get_medicine = mysqli_fetch_array($get_total_medicine)) {
//     $medicine_quantity = $get_medicine['quantity_available_pcs'];
//     $medicine_counter+= $medicine_quantity;
// }


// // Get Users number
// $get_total_users = mysqli_query($connectionString,"SELECT * FROM `pharmacists_table`")or die(mysqli_error($connectionString));
// $user_counter = 0;

// while ($get_users = mysqli_fetch_array($get_total_users)) {
//     $user_counter++;
// }

// //Getting values for chart
// $sales_array = [];
// $expenditure_array = [];

// // January
// $counter_1 = 0;
// $counter_1_1 = 0;
// $current_year = date('Y');
// $all_januaray = $current_year.'-01';

// $get_january = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_januaray%'")or die(mysqli_error($connectionString));
// while ($each_january = mysqli_fetch_array($get_january)) {
//     $get_amount = $each_january['sales_total'];
//     $counter_1+= $get_amount;
// }
// array_push($sales_array,$counter_1);


// $get_january = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_januaray%'")or die(mysqli_error($connectionString));
// while ($each_january = mysqli_fetch_array($get_january)) {
//     $get_amount = $each_january['expense_amount'];
//     $counter_1_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_1_1);

// // February
// $counter_2 = 0;
// $counter_2_1 = 0;
// $current_year = date('Y');
// $all_february = $current_year.'-02';

// $get_february = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_february%'")or die(mysqli_error($connectionString));
// while ($each_february = mysqli_fetch_array($get_february)) {
//     $get_amount = $each_february['sales_total'];
//     $counter_2+= $get_amount;
// }
// array_push($sales_array,$counter_2);


// $get_february = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_february%'")or die(mysqli_error($connectionString));
// while ($each_february = mysqli_fetch_array($get_february)) {
//     $get_amount = $each_february['expense_amount'];
//     $counter_2_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_2_1);

// // March
// $counter_3 = 0;
// $counter_3_1 = 0;
// $current_year = date('Y');
// $all_march = $current_year.'-03';

// $get_march = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_march%'")or die(mysqli_error($connectionString));
// while ($each_march = mysqli_fetch_array($get_march)) {
//     $get_amount = $each_march['sales_total'];
//     $counter_3+= $get_amount;
// }
// array_push($sales_array,$counter_3);

// $get_march = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_march%'")or die(mysqli_error($connectionString));
// while ($each_march = mysqli_fetch_array($get_march)) {
//     $get_amount = $each_march['expense_amount'];
//     $counter_3_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_3_1);

// // April
// $counter_4 = 0;
// $counter_4_1 = 0;
// $current_year = date('Y');
// $all_april = $current_year.'-04';

// $get_april = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_april%'")or die(mysqli_error($connectionString));
// while ($each_april = mysqli_fetch_array($get_april)) {
//     $get_amount = $each_april['sales_total'];
//     $counter_4+= $get_amount;
// }
// array_push($sales_array,$counter_4);


// $get_april = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_april%'")or die(mysqli_error($connectionString));
// while ($each_april = mysqli_fetch_array($get_april)) {
//     $get_amount = $each_april['expense_amount'];
//     $counter_4_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_4_1);

// // May
// $counter_5 = 0;
// $counter_5_1 = 0;
// $current_year = date('Y');
// $all_may = $current_year.'-05';

// $get_may = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_may%'")or die(mysqli_error($connectionString));
// while ($each_may = mysqli_fetch_array($get_may)) {
//     $get_amount = $each_may['sales_total'];
//     $counter_5+= $get_amount;
// }
// array_push($sales_array,$counter_5);


// $get_may = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_may%'")or die(mysqli_error($connectionString));
// while ($each_may = mysqli_fetch_array($get_may)) {
//     $get_amount = $each_may['expense_amount'];
//     $counter_5_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_5_1);

// // June
// $counter_6 = 0;
// $counter_6_1 = 0;
// $current_year = date('Y');
// $all_june = $current_year.'-06';

// $get_june = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_june%'")or die(mysqli_error($connectionString));
// while ($each_june = mysqli_fetch_array($get_june)) {
//     $get_amount = $each_june['sales_total'];
//     $counter_6+= $get_amount;
// }
// array_push($sales_array,$counter_6);


// $get_june = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_june%'")or die(mysqli_error($connectionString));
// while ($each_june = mysqli_fetch_array($get_june)) {
//     $get_amount = $each_june['expense_amount'];
//     $counter_6_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_6_1);

// // July
// $counter_7 = 0;
// $counter_7_1 = 0;
// $current_year = date('Y');
// $all_july = $current_year.'-07';

// $get_july = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_july%'")or die(mysqli_error($connectionString));
// while ($each_july = mysqli_fetch_array($get_july)) {
//     $get_amount = $each_july['sales_total'];
//     $counter_7+= $get_amount;
// }
// array_push($sales_array,$counter_7);


// $get_july = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_july%'")or die(mysqli_error($connectionString));
// while ($each_july = mysqli_fetch_array($get_july)) {
//     $get_amount = $each_july['expense_amount'];
//     $counter_7_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_7_1);

// // August
// $counter_8 = 0;
// $counter_8_1 = 0;
// $current_year = date('Y');
// $all_august = $current_year.'-08';

// $get_august = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_august%'")or die(mysqli_error($connectionString));
// while ($each_august = mysqli_fetch_array($get_august)) {
//     $get_amount = $each_august['sales_total'];
//     $counter_8+= $get_amount;
// }
// array_push($sales_array,$counter_8);


// $get_august = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_august%'")or die(mysqli_error($connectionString));
// while ($each_august = mysqli_fetch_array($get_august)) {
//     $get_amount = $each_august['expense_amount'];
//     $counter_8_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_8_1);


// // September
// $counter_9 = 0;
// $counter_9_1 = 0;
// $current_year = date('Y');
// $all_september = $current_year.'-09';

// $get_september = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_september%'")or die(mysqli_error($connectionString));
// while ($each_september = mysqli_fetch_array($get_september)) {
//     $get_amount = $each_september['sales_total'];
//     $counter_9+= $get_amount;
// }
// array_push($sales_array,$counter_9);


// $get_september = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_september%'")or die(mysqli_error($connectionString));
// while ($each_september = mysqli_fetch_array($get_september)) {
//     $get_amount = $each_september['expense_amount'];
//     $counter_9_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_9_1);


// // October
// $counter_10 = 0;
// $counter_10_1 = 0;
// $current_year = date('Y');
// $all_october = $current_year.'-10';

// $get_october = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_october%'")or die(mysqli_error($connectionString));
// while ($each_october = mysqli_fetch_array($get_october)) {
//     $get_amount = $each_october['sales_total'];
//     $counter_10+= $get_amount;
// }
// array_push($sales_array,$counter_10);


// $get_october = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_october%'")or die(mysqli_error($connectionString));
// while ($each_october = mysqli_fetch_array($get_october)) {
//     $get_amount = $each_october['expense_amount'];
//     $counter_10_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_10_1);


// // November
// $counter_11 = 0;
// $counter_11_1 = 0;
// $current_year = date('Y');
// $all_november = $current_year.'-11';

// $get_november = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_november%'")or die(mysqli_error($connectionString));
// while ($each_november = mysqli_fetch_array($get_november)) {
//     $get_amount = $each_november['sales_total'];
//     $counter_11+= $get_amount;
// }
// array_push($sales_array,$counter_11);

// $get_november = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_november%'")or die(mysqli_error($connectionString));
// while ($each_november = mysqli_fetch_array($get_november)) {
//     $get_amount = $each_november['expense_amount'];
//     $counter_11_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_11_1);


// // December
// $counter_12 = 0;
// $counter_12_1 = 0;
// $current_year = date('Y');
// $all_december = $current_year.'-12';

// $get_december = mysqli_query($connectionString,"SELECT * FROM tbl_each_sales WHERE `sales_timestamp` LIKE '%$all_december%'")or die(mysqli_error($connectionString));
// while ($each_december = mysqli_fetch_array($get_december)) {
//     $get_amount = $each_december['sales_total'];
//     $counter_12+= $get_amount;
// }
// array_push($sales_array,$counter_12);


// $get_december = mysqli_query($connectionString,"SELECT * FROM tbl_expenses WHERE `expense_timestamp` LIKE '%$all_december%'")or die(mysqli_error($connectionString));
// while ($each_december = mysqli_fetch_array($get_december)) {
//     $get_amount = $each_december['expense_amount'];
//     $counter_12_1+= $get_amount;
// }
// array_push($expenditure_array,$counter_12_1);

?>


<?php 

    
require_once 'header/admin-header.php'; 
require_once 'sidebar/admin-sidebar.php';   

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
                                          <h4 class="page-title text-success" style="letter-spacing: 2px;">HE | Admin Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-6 col-md-6 xl-4">
                                 <div class="card-box" style="border-top: 3px solid #14324d;">
 
                                    <h4 class="header-title mt-0 mb-2">Sales Today</h4>

                                    <div class="mt-1">
                                        <div class="float-left" dir="ltr">
                                        <i class="fas fa-plus-circle fa-5x btn-info-color"></i>
                                        </div>
                                        <div class="text-right">
                                            <h2 class="mt-3 pt-1 mb-1"> <?php //echo $currency." ". $sales_counter ?> </h2>
                                            <p class="text-muted mb-0"><em>without expenses</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6 col-md-6 xl-4">
                                 <div class="card-box" style="border-top: 3px solid #14324d;">
                                    
                                    <h4 class="header-title mt-0 mb-3">Expense Today</h4>

                                    <div class="mt-1">
                                        <div class="float-left" dir="ltr">
                                            <i class="fas fa-minus-circle fa-5x btn-danger-color"></i>
                                        </div>
                                        <div class="text-right">
                                            <h2 class="mt-3 pt-1 mb-1"> <?php //echo $currency." ". number_format((float)$expense_counter,2,'.','') ?> </h2>
                                            <p class="text-muted mb-0"><em>with personal account</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6 col-md-6 xl-4">
                                 <div class="card-box" style="border-top: 3px solid #14324d;">
                                    
                                    <h4 class="header-title mt-0 mb-3">Products</h4>

                                    <div class="mt-1">
                                        <div class="float-left" dir="ltr">
                                            <i class="fas fa-medkit fa-5x btn-primary-color"></i>
                                        </div>
                                        <div class="text-right">
                                            <h2 class="mt-3 pt-1 mb-1"> <?php //echo $medicine_counter ?> </h2>
                                            <p class="text-muted mb-0"><em>total products at store</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6 col-md-6 xl-4">
                                 <div class="card-box" style="border-top: 3px solid #14324d;">
                                    
                                    <h4 class="header-title mt-0 mb-3">Staff</h4>

                                    <div class="mt-1">
                                        <div class="float-left" dir="ltr">
                                           <i class="fa fa-users fa-5x btn-secondary-color"></i>
                                        </div>
                                        <div class="text-right">
                                        <h2 class="mt-3 pt-1 mb-1"> <?php //echo $user_counter ?> </h2>
                                            <p class="text-muted mb-0"><em>number of staff</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                      
         <!-- start page title -->
                           
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <?php require_once 'footer/admin-footer.php';   ?>
                
               
<script type="text/javascript">
    var options = {
    chart: {
        height: 380,
        type: "bar",
        toolbar: {
            show: !1
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            endingShape: "rounded",
            columnWidth: "55%"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 2,
        colors: ["transparent"]
    },
    colors: ["#1c8238", "#f0643b"],
    series: [{
        name: "Sales",
        data: [<?php echo implode( ", ", $sales_array ); ?>]
    }, {
        name: "Expenditure",
        data: [<?php echo implode( ", ", $expenditure_array ); ?>]
    }],
    xaxis: {
        categories: ["Jan","Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct","Nov","Dec"]
    },
    legend: {
        offsetY: -10
    },
    yaxis: {
        title: {
            text: "<?php echo $currency; ?>"
        }
    },
    fill: {
        opacity: 1
    },
    grid: {
        row: {
            colors: ["transparent", "transparent"],
            opacity: .2
        },
        borderColor: "#f1f3fa"
    },
    tooltip: {
        y: {
            formatter: function(e) {
                return "<?php echo $currency; ?>" + e + " "
            }
        }
    }
    };

    var chart = new ApexCharts(document.querySelector("#apex-column-1"), options);

    chart.render();

</script>