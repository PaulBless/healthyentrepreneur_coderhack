<?php

if($_POST['username'] == 'admin' && $_POST['password'] == 'admin1') {
    header('location: he.php');
} else if ($_POST['username'] == 'che' && $_POST['password'] == 'che123') {
    header('location: che.php');
} else {
    header('location: index.php');
}