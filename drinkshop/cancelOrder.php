<?php
    include"connect.php";
    //Lấy giá trị POST từ form vừa submit
        if(isset($_POST["orderId"])) {   $orderId = $_POST['orderId']; }
        if(isset($_POST["userPhone"])) {  $userPhone=$_POST['userPhone']; }
        $result=false;  
        $sql="UPDATE .order set OrderStatus=-1 where OrderId=$orderId and UserPhone=$userPhone";
        $result=mysqli_query($con, $sql);
        if ($result) {
            echo json_encode("Don hang da bi huy");
        } else {
            echo "Error: " ;

    }
    ?>