<?php
	include("connect.php");
	if(isset($_POST['phone'])&& isset($_POST['name']) && isset($_POST['birthdate']) && isset($_POST['address'])){
	$phone=$_POST['phone'];
	$name=$_POST['name'];
	$birthday=$_POST['birthdate'];
	$address=$_POST['address'];
	//$password=password_hash($password,PASSWORD_DEFAULT);
	//$password=password_hash($password,PASSWORD_DEFAULT);
	$sql1="select * from user where Phone='$phone'";
	$data1=mysqli_query($con,$sql1);
	if(mysqli_num_rows($data1)>0)
	{
        $response["error_msg"]="sdt da ton tai".$phone;
        echo json_encode($response);
	}else{
		$sql="INSERT INTO user(Phone,avatarUrl,Name,Birthdate,Address) values('$phone','','$name','$birthday','$address')";
		$result=mysqli_query($con,$sql);
		$sql2="select * from user where Phone='$phone'";
		$data2=mysqli_query($con,$sql2);
		if($result)
		{
			while ($data3 = mysqli_fetch_array($data2) )
			{
				$response["phone"]=$data3['Phone'];
				$response["name"]= $data3['Name'];
				$response["birthdate"]=$data3['Birthdate'];
				$response["address"]=$data3['Address'];
				echo json_encode($response);
			}			
		}
		else{
			$response["error_msg"]="khong them dc".$phone;
			echo json_encode($response);

		}
	}
}
?>
