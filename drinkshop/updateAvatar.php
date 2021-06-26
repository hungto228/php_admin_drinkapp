<?php
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        
        $expensions= array("jpeg","jpg","png");
        if($file_name=='')
        {
            $alert="chưa chọn file";
        }
        else
        {  
            if($file_size > 2097152) {
                $errors[]='Kích thước file không được lớn hơn 2MB';
            }
            
            if(empty($errors)==true) {
                move_uploaded_file($file_tmp,"images/".$file_name);
                
            }else{
                print_r($errors);
            }
        }
    }
        
        
?>
    <?php
        include "connect.php";
    //Lấy giá trị POST từ form vừa submit
           
            if(isset($_POST["phone"])) {   $p = $_POST['phone']; }
            //Code xử lý, update dữ liệu vào table
            $sql = "UPDATE user SET avatarUrl='$file_name' where Phone='$p'";
            if (mysqli_query($con, $sql)) {
                echo "Uploaded";
            } else {
                echo "Error: " ;
        
        }
        ?>