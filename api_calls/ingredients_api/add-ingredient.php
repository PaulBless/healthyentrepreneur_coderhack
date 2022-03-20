<?php

require_once '../../db/db.php';

        ## Clean form inputs data
        $clean_input_names =($_POST['name']);
        $get_names = $clean_input_names;
        $get_cost_prices_boxes =($_POST['cost_price_boxes']);
        $get_cost_prices_pcs =($_POST['cost_price_pcs']);
        $get_quantities_available_box=($_POST['quantity_avail_box']);
        $get_quantities_available_pcs=($_POST['quantity_avail_pcs']);
        $get_expires =($_POST['expiry_date']) ;

        $current_date = date('Y-m-d H:i');

      $get_length_of_items = sizeof($_POST["name"]);

      for ($i=0; $i < $get_length_of_items ; $i++) { 
          $get_name = ucwords($get_names[$i]) ;
          $get_cost_price_boxes = $get_cost_prices_boxes[$i];
          $get_cost_price_pcs = $get_cost_prices_pcs[$i];
          $get_quantity_available_box= $get_quantities_available_box[$i];
           $get_quantity_available_pcs= $get_quantities_available_pcs[$i];
          $get_expiry = $get_expires[$i];

          $insert_data = mysqli_query($connectionString,"INSERT INTO `tbl_ingredients` (`tbl_ingredient_id`, `ingredient_name`, `last_updated`, `cost_price_box`, `cost_price_pcs`, `expiry_date`, `quantity_available_box`, `quantity_available_pcs`) VALUES (NULL, '$get_name', '$current_date', '$get_cost_price_boxes', '$get_cost_price_pcs', '$get_expiry', '$get_quantity_available_box', '$get_quantity_available_pcs')")or die(mysql_error($connectionString));
      }

  if($insert_data){
      echo 'success';
  }else{
      echo 'failed';
  }
