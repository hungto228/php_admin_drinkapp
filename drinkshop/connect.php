<?php
$con= mysqli_connect("localhost","root","");
mysqli_select_db($con,"id15856403_admin"); 
mysqli_set_charset($con, 'UTF8'); 
if (!$con) {
    die("Không kết nối user :" . mysqli_connect_error());
    exit();
}
?>