<?php
$con= mysqli_connect("localhost","root","");
mysqli_select_db($con,"id15856403_admin"); 
mysqli_set_charset($con, 'UTF8'); 
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$con) {
    die("Không kết nối admin :" . mysqli_connect_error());
    exit();
}
?>