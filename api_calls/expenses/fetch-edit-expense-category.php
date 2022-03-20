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
   $searchQuery = " and (expense_category_id like '%".$searchValue."%' or 
   expense_name like '%".$searchValue."%' or 
   expense_category_timestamp like'%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($connectionString,"select count(*) as allcount from expense_category ");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connectionString,"select count(*) as allcount from expense_category WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from expense_category WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connectionString, $empQuery);
$data = array();


if($_COOKIE['c_r'] === 'p' && $_COOKIE['u_r']==='p'){
    while ($row = mysqli_fetch_assoc($empRecords)) {
        $data[] = array( 
           "expense_category_id"=>$row['expense_category_id'],
           "expense_name"=>$row['expense_name'],
           "expense_category_timestamp"=>date('d-M-Y', strtotime($row['expense_category_timestamp']))
        );
     }
}else{
    while ($row = mysqli_fetch_assoc($empRecords)) {
       
        $data[] = array( 
            "expense_category_id"=>$row['expense_category_id'],
           "expense_name"=>$row['expense_name'],
           "expense_category_timestamp"=>date('d-M-Y', strtotime($row['expense_category_timestamp'])),
           "action"=>'<div class="btn-group dropdown">
           <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
               data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
           <div class="dropdown-menu dropdown-menu-right">
               <a class="dropdown-item edit-category" href="javascript:void(0)"
                   data-id="'.$row['expense_category_id'].'"><i
                       class="mdi mdi-pencil mr-2 text-primary font-18 vertical-middle"></i>Edit Category</a>
               <a class="dropdown-item delete-category" href="javascript:void(0)"
                   data-id="'.$row['expense_category_id'].'"><i
                       class="mdi mdi-delete mr-2 text-danger font-18 vertical-middle"></i>Remove Category</a>
           </div>
       </div>'
          
        );
     }
}



## Response
$response = array(
  "draw" => intval($draw),
  "iTotalRecords" => $totalRecords,
  "iTotalDisplayRecords" => $totalRecordwithFilter,
  "aaData" => $data
);

echo json_encode($response);
                                      