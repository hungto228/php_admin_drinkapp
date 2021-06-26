<?php
include("connect.php");
$id=$_POST['menuid'];
$query="select * from drink where MenuId=$id";
$data=mysqli_query($con,$query);
$mangdrink=array();
//tạo mạng
while($row=mysqli_fetch_assoc($data)){
   array_push($mangdrink, new Drink(
        $row['ID'],
        $row['Name'],
        $row['Link'],
        $row['Price'],
        $row['MenuId'])
);
}
echo json_encode($mangdrink);
class Drink{
    function Drink($id,$name,$link,$price,$menuid){
        $this->ID=$id;
        $this->Name=$name;
        $this->Link=$link;
        $this->Price=$price;
        $this->MenuId=$menuid;
    }
}  

?>