<?php
include("connect.php");
$query="select * from Sanpham where Id_lsp=3";
$data=mysqli_query($con,$query);
$mangtrasua=array();
//tạo mạng
while($row=mysqli_fetch_assoc($data)){
   array_push($mangtrasua, new TraSua(
        $row['Id'],
        $row['Name_sp'],
        $row['Image_sp'],
        $row['Price_sp'],
        $row['Id_lsp'])
);
}
echo json_encode($mangtrasua);
class TraSua{
    function TraSua($id,$name_sp,$image_sp,$price_sp,$id_lsp){
        $this->Id=$id;
        $this->Name_sp=$name_sp;
        $this->Image_sp=$image_sp;
        $this->Price_sp=$price_sp;
        $this->Id_lsp=$id_lsp;
    }
}
       

?>