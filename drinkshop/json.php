<?php
$con= mysqli_connect("localhost","root","");
mysqli_select_db($con,"banh_my"); 
mysqli_set_charset($con, 'UTF8'); 
$query="select * from detail_orders";
$data=mysqli_query($con,$query);
class TraSua{
    function TraSua($id,$madonhang,$ma_sp,$namesp,$price,$soluong){
        $this->Id=$id;
        $this->MaDonHang=$madonhang;
        $this->Ma_sp=$ma_sp;
        $this->Name_sp=$namesp;
        $this->Prices_sp=$price;
        $this->SoLuong=$soluong;
    }
}
        $mangtrasua=array();
        //tạo mạng
        while($row=mysqli_fetch_array($data)){
           array_push($mangtrasua, new TraSua(
                $row['Id'],
                $row['MaDonHang'],
                $row['Ma_sp'],
                $row['Name_sp'],
                $row['Prices_sp'],
                $row['SoLuong']
                )
        );
    }
        echo json_encode($mangtrasua);
?>