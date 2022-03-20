<?php

setcookie("u_n",'', time() + (86400 * 30), '/');
setcookie("u_r", '', time() + (86400 * 30), '/');
setcookie("u_i",'', time() + (86400 * 30), '/');
setcookie("h_i",'', time() + (86400 * 30), '/');
setcookie("u_fname",'', time() + (86400 * 30), '/');

echo "<script>window.location.href='index.php'</script>";

?>