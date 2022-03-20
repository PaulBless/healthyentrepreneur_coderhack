<?php require_once '../../db/db.php';


## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (customer_name like '%".$searchValue."%' or 
   customer_phone like'%".$searchValue."%' or 
   customer_district like'%".$searchValue."%' or 
   customer_address like'%".$searchValue."%' or 
   customer_timestamp like'%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($connectionString,"select count(*) as allcount from tbl_customers");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connectionString,"select count(*) as allcount from tbl_customers WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from tbl_customers WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connectionString, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "customer_name"=>$row['customer_name'],
      "customer_phone"=>$row['customer_phone'],
      "customer_district"=>$row['customer_district'],
      "customer_address"=>$row['customer_address'],
      "customer_timestamp"=>$row['customer_timestamp'],
      "action"=>'<div class="btn-group dropdown">
        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item edit-customer-button" href="javascript:void(0)" data-id="'.$row['customer_id'].'"><i class="mdi mdi-pencil mr-2 text-primary font-18 vertical-middle" ></i>Edit Customer</a>
            <a class="dropdown-item delete-customer-button" href="javascript:void(0)"  data-id="'.$row['customer_id'].'"><i class="mdi mdi-delete mr-2 text-danger font-18 vertical-middle"></i>Delete Customer</a>
        </div>
        </div>'
     
   );
}

## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);