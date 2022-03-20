<?php

        require_once '../../db/db.php';

        $expense_category = rtrim(htmlspecialchars($_POST['expense_category'])) ;

        $get_expense_id = $_POST['expense_id'];
        $get_expense_category = $expense_category;
        $get_expenseAmount = $_POST['expenseAmount'];
        $get_expense_account = $_POST['expense_account'];
        $get_expense_role = $_POST['role'];

        if ($get_expense_category === "Nothing" || $get_expense_account === "Nothing") {
            echo "error";
        } else{
            $addExpenses = mysqli_query($connectionString,"INSERT INTO `tbl_expenses` (`expense_id`, 
        `expense_auto_id`, 
        `expense_category`, 
        `expense_amount`, 
        `expense_account`, 
        `expense_by`, 
        `expense_timestamp`) VALUES (NULL, 
        '$get_expense_id', 
        '$get_expense_category', 
        '$get_expenseAmount', 
        '$get_expense_account', 
        '$get_expense_role', 
        CURRENT_TIMESTAMP)") or die(mysqli_error($connectionString));
        if($addExpenses){
            echo "success";
        }
        }
        
       

       