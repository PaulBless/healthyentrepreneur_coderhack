<?php

$password = 'zelus';


$hash = password_hash($password,PASSWORD_DEFAULT);

echo $hash;

?>