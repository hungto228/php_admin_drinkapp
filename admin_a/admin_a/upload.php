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
                move_uploaded_file($file_tmp,"img/".$file_name);
            }else{
                print_r($errors);
            }
        }
    }
    ?>