<?php
    include("connect.php");
    if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST["Name"];
    $password=$_POST["Password"];
   // $password=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from users where Name='$email' and Password='$password'";
   
    $query=mysqli_query($con,$sql);
    $check=mysqli_fetch_array($query);
    if(isset($check))
    {
        echo "thanhcong";
    }
    else
    {
        echo"loi";
    }
}

?>