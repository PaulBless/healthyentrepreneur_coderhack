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
   $searchQuery = " and (expense_auto_id like '%".$searchValue."%' or 
   expense_name like '%".$searchValue."%' or 
   expense_amount like'%".$searchValue."%' or 
   account_expense_name like'%".$searchValue."%' or 
   expense_by like'%".$searchValue."%'  or 
   expense_timestamp like'%".$searchValue."%') ";
}

## Total number of records without filtering
$sel = mysqli_query($connectionString,"select count(*) as allcount from tbl_expenses join expense_category on tbl_expenses.expense_category = expense_category.expense_category_id join expense_account on tbl_expenses.expense_account = expense_account.account_id ");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of record with filtering
$sel = mysqli_query($connectionString,"select count(*) as allcount from tbl_expenses join expense_category on tbl_expenses.expense_category = expense_category.expense_category_id join expense_account on tbl_expenses.expense_account = expense_account.account_id  WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "select * from tbl_expenses join expense_category on tbl_expenses.expense_category = expense_category.expense_category_id join expense_account on tbl_expenses.expense_account = expense_account.account_id  WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($connectionString, $empQuery);
$data = array();

    while ($row = mysqli_fetch_assoc($empRecords)) {

        $getExpenseBy = $row['expense_by'];

        if($row['expense_by'] === '0'){
            $get_by = "Admin";
        }else{
            $get_from_pharmacists_table = mysqli_query($connectionString,"SELECT * FROM pharmacists_table WHERE `pharmacists_id` = $getExpenseBy LIMIT 1")or die(mysqli_error($connectionString));
            $get_name = mysqli_fetch_array($get_from_pharmacists_table);

            $name = $get_name['pharmacists_firstname'].' '.$get_name['pharmacists_lastname'];
            $get_by = $name;
        }

        $data[] = array( 
           "expense_auto_id"=>$row['expense_auto_id'],
           "expense_name"=>$row['expense_name'],
           "expense_amount"=>number_format((float)$row['expense_amount'],2,'.',''),
           "account_expense_name"=>$row['account_expense_name'],
           "expense_by"=>$get_by,
           "expense_timestamp"=>date('d-M-Y', strtotime($row['expense_timestamp']))
          
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
                                      