<?php 

session_start();

session_destroy();

echo "<script>window.open('portal.php','_self')</script>";

?>