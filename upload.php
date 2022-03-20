<?php



require_once 'db/db.php'; 


if(isset($_POST["submit"]))
{

             
          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
          
          
                    {
          $product_name = $filesop[0];
          $product_category = $filesop[1];
          
          $sql = "INSERT INTO `tbl_products` (`tbl_products_id`, `batch_no`, `product_name`, `product_category`, `selling_price`, `cost_price`, `expiry_date`, `quantity_available`) VALUES (NULL, '0', '$product_name', '$product_category', '0', '0', '0', '0')";
          $stmt = mysqli_query($connectionString,$sql);
         

         $c = $c + 1;
           }

            if($stmt){
               echo "sucess";
             } 
		 else
		 {
            echo "Sorry! Unable to impo.";
          }

}
?>
<!DOCTYPE html>
<html>
<body>
<form enctype="multipart/form-data" method="post" role="form">
    <div class="form-group">
        <label for="exampleInputFile">File Upload</label>
        <input type="file" name="file" id="file" size="150">
        <p class="help-block">Only Excel/CSV File Import.</p>
    </div>
    <button type="submit" class="btn btn-default" name="submit" value="submit">Upload</button>
</form>
</body>
</html>

