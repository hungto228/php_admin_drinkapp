<?php
include("connect.php");
$phone=$_POST['phone'];
$status=$_POST['status'];
$query="select * from .order where UserPhone=$phone and OrderStatus=$status";
$data=mysqli_query($con,$query);
$mangorder=array();
//tạo mạng
while($row=mysqli_fetch_assoc($data)){
   array_push($mangorder, new Order(
        $row['OrderId'],
        $row['OrderDate'],
        $row['OrderStatus'],
        $row['OrderPrice'],
        $row['OrderDetail'],
        $row['OrderComment'],
        $row['OrderAddress'],
        $row['UserPhone'])
);
}
echo json_encode($mangorder);
class Order{
    function Order($orderId,$orderDate,$orderStatus,$orderPrice,$orderDetail,$orderComment,$orderAddress,$userPhone){
        $this->OrderId=$orderId;
        $this->OrderDate=$orderDate;
        $this->OrderStatus=$orderStatus;
        $this->OrderPrice=$orderPrice;
        $this->OrderDetail=$orderDetail;
        $this->OrderComment=$orderComment;
        $this->OrderAddress=$orderAddress;
        $this->UserPhone=$userPhone;
    }
}  

?>