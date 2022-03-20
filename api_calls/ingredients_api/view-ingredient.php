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
   $searchQuery = " and (ingredient_name like '%".$searchValue."%' or 
   last_updated like'%".$searchValue."%' or 
   cost_price_box like'%".$searchValue."%' or 
   cost_price_pcs like'%".$searchValue."%' or 
   expiry_date like'%".$searchValue."%' or 
   quantity_available_box like'%".$searchValue."%' or 
   quantity_available_box like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($connectionString,"select count(*) as allcount from tbl_ingredients ");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connectionString,"select count(*) as allcount from tbl_ingredients  WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from tbl_ingredients  WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connectionString, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "ingredient_name"=>$row['ingredient_name'],
      "last_updated"=>$row['last_updated'],
      "cost_price_box"=>$row['cost_price_box'],
      "cost_price_pcs"=>$row['cost_price_pcs'],
      "expiry_date"=>$row['expiry_date'],
      "quantity_available_box"=>$row['quantity_available_box'],
      "quantity_available_pcs"=>$row['quantity_available_pcs'],
      "last_updated"=>date('d-M-Y H:i', strtotime($row['last_updated']))  ,
     
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