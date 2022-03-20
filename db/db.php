<?php

## Local DB Connection Paramters 
$host = "localhost";
$user = "root";
$password = "";
$database = "healthy_entrepreneurs";


## remote db connection parameters
// $host = "remotemysql.com:3306";
// $user = "urXgsM0hau";
// $password = "b0cnN99BRt";
// $database = "urXgsM0hau";
// $port = "3306";

$connectionString = mysqli_connect($host,$user,$password,$database);

// Check connection
if (!$connectionString) {
    die("Connection failed: " . mysqli_connect_error());
}


?>