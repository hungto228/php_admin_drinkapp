<?php
include("connect.php");
$query="select * from menu";
$data=mysqli_query($con,$query);
class MeNu{
    function MeNu($id,$name,$link){
        $this->ID=$id;
        $this->Name=$name;
        $this->Link=$link;
    }
}
        $mangmenu=array();
        //tạo mạng
        while($row=mysqli_fetch_array($data)){
           array_push($mangmenu, new MeNu(
                $row['ID'],
                $row['Name'],
                $row['Link'])
        );
    }
        echo json_encode($mangmenu);
?>