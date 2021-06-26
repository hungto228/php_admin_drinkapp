<?php
include("connect.php");
$query="select * from banner";
$data=mysqli_query($con,$query);
class Banner{
    function Banner($id,$name,$link){
        $this->ID=$id;
        $this->Name=$name;
        $this->Link=$link;
    }
}
        $mangbanner=array();
        //tạo mạng
        while($row=mysqli_fetch_array($data)){
           array_push($mangbanner, new Banner(
                $row['ID'],
                $row['Name'],
                $row['Link'])
        );
    }
        echo json_encode($mangbanner);
?>