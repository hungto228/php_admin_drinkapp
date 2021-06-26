<?php
    include("connect.php");
    $response= array();
	if(isset($_POST['phone'])){
        $phone=$_POST['phone'];
        
	//$password=password_hash($password,PASSWORD_DEFAULT);
	$sql="select * from user where Phone='$phone'";
	$data=mysqli_query($con,$sql);
	if(mysqli_num_rows($data)>0)
	{
        $response["exists"]=true;
        echo json_encode($response);
        $con->close();
    }else{
        $response["exists"]=false;
        echo json_encode($response);
        $con->close();
    }
}
    else{
        $response["error_msg"]="Required param (phone) is missing";
        echo json_encode($response);
    }
      
?>
       