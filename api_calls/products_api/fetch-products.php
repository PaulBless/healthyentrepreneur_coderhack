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
   $searchQuery = " and (product_name like '%".$searchValue."%' or 
   category_name like'%".$searchValue."%' or 
   cost_price_box like'%".$searchValue."%' or 
   cost_price_pcs like'%".$searchValue."%' or 
   selling_price_box like'%".$searchValue."%' or 
   selling_price_pcs like'%".$searchValue."%' or 
   expiry_date like'%".$searchValue."%' or 
   quantity_available_pcs like'%".$searchValue."%' or 
   quantity_available_box like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($connectionString,"select count(*) as allcount from tbl_products JOIN categories_tbl on tbl_products.product_category = categories_tbl.category_id");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connectionString,"select count(*) as allcount from tbl_products JOIN categories_tbl on tbl_products.product_category = categories_tbl.category_id WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from tbl_products JOIN categories_tbl on tbl_products.product_category = categories_tbl.category_id WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connectionString, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   $data[] = array( 
      "product_name"=>$row['product_name'],
      "product_category"=>$row['category_name'],
      "cost_price_box"=>$row['cost_price_box'],
      "cost_price_pcs"=>$row['cost_price_pcs'],
      "selling_price_box"=>$row['selling_price_box'],
      "selling_price_pcs"=>$row['selling_price_pcs'],
      "expiry_date"=>$row['expiry_date'],
      "quantity_available_box"=>$row['quantity_available_box'],
      "quantity_available_pcs"=>$row['quantity_available_pcs'],
      "action"=>'<div class="btn-group dropdown">
        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item edit-product-button" href="javascript:void(0)" data-id="'.$row['tbl_products_id'].'"><i class="mdi mdi-pencil mr-2 text-primary font-18 vertical-middle" ></i>Edit Product</a>
            <a class="dropdown-item delete-product-button" href="javascript:void(0)"  data-id="'.$row['tbl_products_id'].'"><i class="mdi mdi-delete mr-2 text-danger font-18 vertical-middle"></i>Remove Product</a>
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