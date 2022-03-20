<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "zelusportals_reho";

$connectionString = mysqli_connect($host,$user,$password,$database);

// Check connection
if (!$connectionString) {
    die("Connection failed: " . mysqli_connect_error());
}


?>