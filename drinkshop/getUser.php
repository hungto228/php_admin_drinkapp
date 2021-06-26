<?php
    include("connect.php");
    $response= array();
	if(isset($_POST['phone'])){
        $phone=$_POST['phone'];
        
	//$password=password_hash($password,PASSWORD_DEFAULT);
	$sql="select * from user where Phone='$phone'";
	$data=mysqli_query($con,$sql);
	if($data)
	{
        while ($data3 = mysqli_fetch_array($data) )
			{
				$response["phone"]=$data3['Phone'];
				$response["avatar"]=$data3['avatarUrl'];
				$response["name"]= $data3['Name'];
				$response["birthdate"]=$data3['Birthdate'];
				$response["address"]=$data3['Address'];
				echo json_encode($response);
			}			
    }else{
        $response["error_msg"]="user does not exists";
        echo json_encode($response);
    }
}
    else{
        $response["error_msg"]="Required param (phone) is missing";
        echo json_encode($response);
    }
      
?>
     