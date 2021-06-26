<?php
session_start();
include "connect.php";
include "upload.php";


//login
if(isset($_POST['login_btn']))
{
    $emai = $_POST['email'];
    $pass= $_POST['password']; 
    $sql = "SELECT * from admin where Phone='$emai' AND PassWord='$pass'";
    $result=mysqli_query($con,$sql);
    $data=mysqli_fetch_array($result);
    if($data)
    {
        $_SESSION['username']= $emai;
        $_SESSION['image']=$data['Link'];
        header('Location: index.php');
    }else{
        $_SESSION['status']="Again check UserName or Password";
        header('Location: login.php');
    }

}
//insert ADMIN
if(isset($_POST['insert_admin_btn']))
{
    $name = $_POST['txtName'];
    $pass = $_POST['txtPassword']; 
    $cpass= $_POST['txtCpass'];
    $phone= $_POST['txtPhone'];
    if(empty($name) || empty($pass) || empty($phone) || empty($file_name))
    {
        $_SESSION['status']="phai nhap day du thong tin";
        header('Location: register.php');
    }
    else
    {
        
        if($pass==$cpass)
        {
            $sql = "INSERT INTO admin (UserName,PassWord,Link,Phone) 
            VALUES ('$name','$pass','$file_name','$phone')";
            if(mysqli_query($con, $sql))
            {
                $_SESSION['success']=" Insert thanh cong";
                header('Location: register.php');
            }else{
                $_SESSION['status']=" insert that bai";
                header('Location: register.php');
                
            }

        }else{
            $_SESSION['status']="Pass  khong trung khop";
            header('Location: register.php');

        }
    }    
}

//delete ADMIN
if(isset($_POST['delete_admin_btn']))
{
    $phone=$_POST['delete_id'];
    $sql="DELETE FROM admin WHERE Phone='$phone'";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']=" Xoa thanh cong";
        header('Location: index.php?trang=admin');
    }
    else
    {
        $_SESSION['status']=" Xoa that bai";
        header('Location: index.php?trang=admin');
    }
}

//update admin
if(isset($_POST['edit_admin_btn']))
{    
    $id=$_POST['edit_id'];
    $name = $_POST['txtName'];
    $pass = $_POST['txtPassword']; 
    $cpass= $_POST['txtCpass'];
    $phone= $_POST['txtPhone'];
    $link = $_POST['edit_link'];
    if(empty($file_name))
    {
        $file_name=$link;
    }
    $sql = "UPDATE admin set UserName='$name',PassWord='$pass',Link='$file_name',Phone='$phone' where Phone='$id'";

    if (mysqli_query($con, $sql)) {
        $_SESSION['success']=" Update thanh cong";
        header('Location: index.php?trang=admin');
    } else {
        $_SESSION['status']=" Update that bai";
        header('Location: index.php?trang=admin');
    }
    
}

//banner
if(isset($_POST['insert_banner_btn']))
{
    $name = $_POST['txtName'];
    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO banner (ID,Name,Link) 
    VALUES ('','$name','$file_name')";
    if(empty($name) || empty($file_name))
    {
        $_SESSION['status']="phai nhap day du thong tin";
        header('Location: index.php?trang=banner');
    }
    else{
        if(mysqli_query($con, $sql))
        {
            $_SESSION['success']=" Insert thanh cong";
            header('Location: index.php?trang=banner');
        }else{
            $_SESSION['status']=" insert that bai";
            header('Location: index.php?trang=banner');
        }
    }    
     
}

//delete banner
if(isset($_POST['delete_banner_btn']))
{
    $id=$_POST['delete_id'];
    $sql="DELETE FROM banner WHERE ID='$id'";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']=" Xoa thanh cong";
        header('Location: index.php?trang=banner');
    }
    else
    {
        $_SESSION['status']=" Xoa that bai";
        header('Location: index.php?trang=banner');
    }
}

//update banner
if(isset($_POST['edit_banner_btn']))
{    
    $id=$_POST['edit_id'];
    $name = $_POST['txtName'];
    $link = $_POST['edit_link'];
    if(empty($file_name))
    {
        $file_name=$link;
    }
    $sql = "UPDATE banner set Name='$name',Link='$file_name' where ID='$id'";

    if (mysqli_query($con, $sql)) {
        $_SESSION['success']=" UPdate thanh cong";
        header('Location: index.php?trang=banner');
    } else {
        $_SESSION['status']=" Update that bai";
        header('Location: index.php?trang=banner');
    }
    
}


//menusddddddddddddddddddddddddddddddddddddddw

if(isset($_POST['insert_menu_btn']))
{
    $name = $_POST['txtName'];
    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO menu (ID,Name,Link) 
    VALUES ('','$name','$file_name')";
    if(empty($name) || empty($file_name))
    {
        $_SESSION['status']="phai nhap day du thong tin";
        header('Location: index.php?trang=menu');
    }else{
        if(mysqli_query($con, $sql))
        {
            $_SESSION['success']=" Insert thanh cong";
            header('Location: index.php?trang=menu');
        }else{
            $_SESSION['status']=" insert that bai";
            header('Location: index.php?trang=menu');
        }
    }
    
     
}

//delete banner
if(isset($_POST['delete_menu_btn']))
{
    $id=$_POST['delete_id'];
    $sql="DELETE FROM menu WHERE ID='$id'";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']=" Xoa thanh cong";
        header('Location: index.php?trang=menu');
    }
    else
    {
        $_SESSION['status']=" Xoa that bai";
        header('Location: index.php?trang=menu');
    }
}

//update menu
if(isset($_POST['edit_menu_btn']))
{    
    $id=$_POST['edit_id'];
    $name = $_POST['txtName'];
    $link = $_POST['edit_link'];
    if(empty($file_name))
    {
        $file_name=$link;
    }
 
    $sql = "UPDATE menu set Name='$name',Link='$file_name' where ID='$id'";
    if (mysqli_query($con, $sql)) {
        $_SESSION['success']=" UPdate thanh cong";
        header('Location: index.php?trang=menu');
    } else {
        $_SESSION['status']=" Update that bai";
        header('Location: index.php?trang=menu');
    }  
}

//xaos drink
if(isset($_POST['delete_btn']))
{
    $id=$_POST['delete_id'];
    $sql="DELETE FROM drink WHERE ID='$id'";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']=" Xoa thanh cong";
        header('Location: index.php?trang=drink');
    }
    else
    {
        $_SESSION['status']=" Xoa that bai";
        header('Location: index.php?trang=drink');
    }
}
//update drink
if(isset($_POST['update_btn']))
{ 
    $id=$_POST['edit_id'];
    $name = $_POST['txtName']; 
    $price = $_POST['txtPrice'];
    $link = $_POST['edit_link'];
    if(empty($file_name))
    {
        $file_name=$link;
    }
    $sql = "UPDATE drink set Name='$name',Link='$file_name',Price=$price where ID='$id'";

    if (mysqli_query($con, $sql)) {
        $_SESSION['success']=" UPdate thanh cong";
        header('Location: index.php?trang=drink');
    } else {
        $_SESSION['status']=" Update that bai";
        header('Location: index.php?trang=drink');
    }
    
}
//insert drink
if(isset($_POST['insert_btn']))
{
    $name = $_POST['txtName'];
    $price = $_POST['txtPrice']; 
    $menuName = $_POST['txtMenuName'];
    //Code xử lý, insert dữ liệu vào table
   
    if(empty($name) || empty($price) || empty($file_name))
    {
        $_SESSION['status']="phai nhap day du thong tin";
        header('Location: index.php?trang=drink');
    }else{
        $sql = "INSERT INTO drink (ID,Name,Link,Price,MenuId) 
        VALUES ('','$name','$file_name',$price,'$menuName')";
        if(mysqli_query($con, $sql))
        {
            $_SESSION['success']=" insert thanh cong";
            header('Location: index.php?trang=drink');
        }else{
            echo $name.$file_name.$price;
            $_SESSION['status']=" insert that bai";
            header('Location: index.php?trang=drink');
        }
         
    }
  
}

//order status

if(isset($_POST['order_detail_btn']))
{
    $status=$_POST['status_id'];
    switch ($status) {
        case 0:
            $_SESSION['status']="Chưa xử lý";
            header('Location: index.php?trang=orderDetail');
            break;
        case -1:
            $_SESSION['status']="Đã bị hủy";
            header('Location: index.php?trang=orderDetail');
            echo"sdsiodjsid";
            break;
        case 1:
            $_SESSION['status']="Đang xử lý";
            header('Location: index.php?trang=orderDetail');
            break;
        case 2:
            $_SESSION['status']="Đang vận chuyển";
           header('Location: index.php?trang=orderDetail');
            break;
        case 3:
            $_SESSION['status']="Hoàn thành";
           header('Location: index.php?trang=orderDetail');
            break;
        default:
            break;
    }
}
/// xu lý
if(isset($_POST['btn_xuly']))
{ 
    $id=$_POST['id'];
    $status = isset($_POST['xuly']) ? $_POST['xuly'] : false;
    echo $id;
    $sql = "UPDATE `order` SET`OrderStatus`=$status WHERE OrderId=$id";
    if (mysqli_query($con, $sql)) {
        $_SESSION['success']=" UPdate thanh cong";
        header('Location: index.php?trang=order');
    } else {
        $_SESSION['status']=" Update that bai";
        header('Location: index.php?trang=order');
    }  
}
// export excel
if(isset($_POST['export_btn']))
{     
    include 'export/PHPExcel/IOFactory.php';                          
    require("export/PHPExcel.php");
    $id=$_POST['order_id'];
    $objExcel=new PHPExcel;
    $objExcel->setActiveSheetIndex(0);
    $sheet=$objExcel->getActiveSheet()->setTitle("Order");
    $rowCount=5;
    $result1=mysqli_query($con,"SELECT * from .order where OrderId='$id'");
    foreach($result1 as $row1)
    {
        $sheet->setCellValue('B2',$row1['OrderAddress']);
        $sheet->setCellValue('B3',$row1['UserPhone']);
        $sheet->setCellValue('B4',$row1['OrderPrice']."$");

    }
    $sheet->setCellValue('A1','DANH SÁCH ĐƠN HÀNG');
    $sheet->setCellValue('A2','Địa chỉ nhận hàng');
    $sheet->setCellValue('A3','Số điện thoại:');
    $sheet->setCellValue('A4','Tổng tiền:');
    
    $sheet->setCellValue('A'.$rowCount,'Tên');
    $sheet->setCellValue('B'.$rowCount,'Số lượng');
    $sheet->setCellValue('C'.$rowCount,'Size');
    $sheet->setCellValue('D'.$rowCount,'Giá');
    $sheet->setCellValue('E'.$rowCount,'Sugar');
    $sheet->setCellValue('F'.$rowCount,'Topping');
    $sheet->setCellValue('G'.$rowCount,'Ice');
    $sheet->getColumnDimension("A")->setAutoSize(true);
    $sheet->getStyle('A1:D1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID);
    $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
   
    
    $result=mysqli_query($con,"SELECT OrderDetail from .order where OrderId='$id'");                          
    foreach($result as $row)
    {
        $vd=json_encode($row);
        $new = json_decode($vd, true);
        $j= $new["OrderDetail"] ;
        $j = preg_replace('/[[:cntrl:]]/', '', $j);
        $a=json_decode($j,true);
        for($i=0;$i<count((array)$a);$i++)
        {
            $rowCount++;
            $names=$a[$i]['name'];
            $amount=$a[$i]['amount'];
            $link=$a[$i]['link'];
            $size=$a[$i]['size'];
            if($size==0)
            {
                $size="M";
            }else{
                $size="L";
            }
            $price=$a[$i]['price'];
            $sugar=$a[$i]['sugar'];
            $topping=$a[$i]['toppingExtras'];
            $ice=$a[$i]['ice'];
            $sheet->setCellValue('A'.$rowCount,$names);
            $sheet->setCellValue('B'.$rowCount,$amount);
            $sheet->setCellValue('C'.$rowCount,$size);
            $sheet->setCellValue('D'.$rowCount,$price);
            $sheet->setCellValue('E'.$rowCount,$sugar);
            $sheet->setCellValue('F'.$rowCount,$topping);
            $sheet->setCellValue('G'.$rowCount,$ice);
        }
    }
    $styleArray=array(
        'borders'=>array(
            'allborders'=>array(
                'style'=>PHPExcel_Style_Border::BORDER_THIN
            )
        )
            );
    $sheet->getStyle('A5:'.'G'.($rowCount+1))->applyFromArray($styleArray);
    $objWrite=new PHPExcel_Writer_Excel2007($objExcel);
    $filename='exports.xlsx';
    $objPHPExcel = PHPExcel_IOFactory::load("export.xlsx");
    $objWrite->save($filename);
    header('ontent-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');
    //PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007')->save('php://output');
    readfile($filename);
    return;

}
if(isset($_POST['logout_btn']))
{ 

    session_start();
    session_unset();
    session_destroy();
    header("location:login.php");

}

?>
