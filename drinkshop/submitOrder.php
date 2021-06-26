<?php
    include("connect.php");
    $orderstatus = "";
    $price = "";
    $orderDetail = "";
    $comment = "";
    $address="";
    $phone='';
    //Lấy giá trị POST từ form vừa submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["orderstatus"])) {   $orderstatus = $_POST['orderstatus']; }
        if(isset($_POST["price"])) { $price = $_POST['price']; }
        if(isset($_POST["orderDetail"])) { $orderDetail = $_POST['orderDetail']; }
        if(isset($_POST["address"])) { $address = $_POST['address']; }
        if(isset($_POST["comment"])) {  $comment = $_POST['comment']; }
        if(isset($_POST["phone"])) {  $phone = $_POST['phone']; }

        //Code xử lý, insert dữ liệu vào table
        $sql="INSERT INTO `order`(`OrderId`, `OrderDate`, `OrderStatus`, `OrderPrice`, `OrderDetail`, `OrderComment`, `OrderAddress`, `UserPhone`, `PaymentMethod`) 
        VALUES ('',CURRENT_TIMESTAMP(),'',$price,' $orderDetail','$comment ','$address','$phone','')";
        if( $orderstatus=='' && $price=='' && $orderDetail=='' && $address && $comment=='' && $phone)
        {
            echo "Bạn phải nhập đầy đủ thông tin trong form";
        }
        else
        {
            if (mysqli_query($con, $sql)) {
               echo  "true";
            } else {
                echo  "false";
            }
        }
    }
?>